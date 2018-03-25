<?php
//pour recuperer le login de l'utilisateur connecte
session_start();
include_once "../model/bdd.php";
header('Content-Type: application/json');

function superpositionAgendaPerso($start, $end, $user) {
  global $c;
  //test avec l'agenda perso
  $sql = "SELECT e.*, a.titre FROM evenement e
                    JOIN utilisateur u ON e.agenda = u.id_agenda
                    JOIN agenda a ON u.id_agenda = a.idAgenda
                    WHERE u.login = '".$user."'";

  $result = mysqli_query($c, $sql);

  $event_perso = [];
  while($row = mysqli_fetch_assoc($result)) {
    $eventStart = substr($row['dateDebut'], 0, -3);
    $eventEnd = substr($row['dateFin'], 0, -3);
    if  (
            ($start > $eventStart AND $end < $eventEnd)
        OR  ($start < $eventStart AND $end > $eventStart)
        OR  ($start < $eventEnd AND $end > $eventEnd)
        OR  ($start < $eventStart AND $end > $eventEnd)
      ) {
        $event_perso[] = $row;
      }
  }

  //ecriture des evenements perso
  return $event_perso;
}

function superpositionAgendaAdmin($start, $end, $user) {
  global $c;
  //agenda de groupes (admin)
  $sql = "SELECT e.*, g.nom AS nomGroupe FROM evenement e
                    JOIN groupe g ON e.agenda = g.id_agenda
                    JOIN utilisateur_groupe ug ON g.nom = ug.groupe
                    WHERE ug.utilisateur = '".$user."' AND g.administrateur = '".$user."'";

  $result = mysqli_query($c, $sql);

  $event_groupes_admin = [];
  while($row = mysqli_fetch_assoc($result)) {
    $eventStart = substr($row['dateDebut'], 0, -3);
    $eventEnd = substr($row['dateFin'], 0, -3);
    if  (
            ($start > $eventStart AND $end < $eventEnd)
        OR  ($start < $eventStart AND $end > $eventStart)
        OR  ($start < $eventEnd AND $end > $eventEnd)
        OR  ($start < $eventStart AND $end > $eventEnd)
      ) {
        $event_groupes_admin[] = $row;
      }
  }

  //ecriture des evenements perso
  return $event_groupes_admin;
}

function superpositionAgendaNoAdmin($start, $end, $user) {
  global $c;
  //agenda de groupes (noadmin)
  $sql = "SELECT e.*, g.nom AS nomGroupe FROM evenement e
                    JOIN groupe g ON e.agenda = g.id_agenda
                    JOIN utilisateur_groupe ug ON g.nom = ug.groupe
                    WHERE ug.utilisateur = '".$user."' AND g.administrateur != '".$user."'";

  $result = mysqli_query($c, $sql);

  $event_groupes = [];
  while($row = mysqli_fetch_assoc($result)) {
    $eventStart = substr($row['dateDebut'], 0, -3);
    $eventEnd = substr($row['dateFin'], 0, -3);
    if  (
            ($start > $eventStart AND $end < $eventEnd)
        OR  ($start < $eventStart AND $end > $eventStart)
        OR  ($start < $eventEnd AND $end > $eventEnd)
        OR  ($start < $eventStart AND $end > $eventEnd)
      ) {
        $event_groupes[] = $row;
      }
  }

  //ecriture des evenements perso
  return $event_groupes;
}

function superpositionUtilisateur($start, $end, $user) {

  //requetes MySQL et ecriture JSON

  return [superpositionAgendaPerso($start, $end, $user), superpositionAgendaAdmin($start, $end, $user), superpositionAgendaNoAdmin($start, $end, $user)];

}

function superpositionUtilisateurGroupe($start, $end, $user) {

  $perso = [$user];
  $perso[] = count(superpositionAgendaPerso($start, $end, $user));
  $perso[] = [superpositionAgendaAdmin($start, $end, $user), superpositionAgendaNoAdmin($start, $end, $user)];

  return $perso;

}

//recuperation des POST de la requete ajax (superposition.js)
if (isset($_POST["agenda"]) && isset($_POST["start"]) && isset($_POST["end"]) && isset($_SESSION["log"])) {
    $agenda = $_POST["agenda"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $user = $_SESSION["log"];

    $tres = [];
    $tres[] = superpositionUtilisateur($start, $end, $user);

    //test si c'est un agenda de groupe dans lequel l'evenement veut etre ajoute
    $sql = "SELECT id_agenda FROM groupe WHERE id_agenda='$agenda'";

    $result = mysqli_query($c, $sql);

    $ajout_dans_groupe = false;
    while($row = mysqli_fetch_assoc($result)) {
      $ajout_dans_groupe = true;
    }

    //si c'est le cas...
    if ($ajout_dans_groupe) {
      $sql ="SELECT ug.utilisateur FROM utilisateur_groupe ug JOIN groupe g ON ug.groupe = g.nom WHERE g.id_agenda = '$agenda' AND ug.utilisateur != g.administrateur";

      $result = mysqli_query($c, $sql);
        while($row = mysqli_fetch_assoc($result)) {
          $tres[] = superpositionUtilisateurGroupe($start, $end, $row['utilisateur']);
        }
    }

    echo json_encode($tres);
}

?>
