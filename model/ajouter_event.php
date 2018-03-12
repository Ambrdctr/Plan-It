<?php
  $type = $event['type'];
  $desc = $event['desc'];
  $debutTime = $event['debutTime'];
  $finTime = $event['finTime'];
  $lieu = $event['lieu'];
  $agenda = $event['agenda'];

  if (isset($event['prio'])) {
    $prio = 1;
  } else {
    $prio = 0;
  }

  if (isset($event['public'])) {
    $public = 1;
  } else {
    $public = 0;
  }

  global $c;
  $sql = "INSERT INTO evenement (nom, description, dateDebut, dateFin, lieu, prioritaire, public, agenda)
      values ('".$type."','".$desc."','".$debutTime."','".$finTime."','".$lieu."',".$prio.",".$public.",'".$agenda."')";
  mysqli_query($c, $sql);
  return true;
?>
