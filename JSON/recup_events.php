<?php

include_once "../model/bdd.php";
header('Content-Type: application/json');

if (isset($_POST["checked"])) {
    $datas = $_POST["checked"];
}

$data = [];
if (isset($datas)) {
  foreach ($datas as $id) {
      $id = intval($id);
<<<<<<< HEAD
      global $c;
      $sql = "SELECT * FROM evenement WHERE agenda = $id";
      $result = mysqli_query($c, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        $row['dateDebut'][10] = "T";
            $row['dateFin'][10] = "T";

            $desc = $row['description'];
            unset($row['description']);
            if ($desc == '') {
              $desc = 'Aucune description';
            }
            $row['description'] = $desc;

=======
    	global $c;
    	$sql = "SELECT * FROM evenement WHERE agenda = $id";
    	$result = mysqli_query($c, $sql);
    	while ($row = mysqli_fetch_assoc($result)) {
    		$row['dateDebut'][10] = "T";
            $row['dateFin'][10] = "T";

>>>>>>> raphael
            $row['title'] = $row['nom'];
            unset($row['nom']);

            $row['start'] = $row['dateDebut'];
            unset($row['dateDebut']);

            $row['end'] = $row['dateFin'];
            unset($row['dateFin']);
            $data[] = $row;
<<<<<<< HEAD
      }
    }
}
echo json_encode($data);
=======
    	}
    }
}
echo json_encode($data);
>>>>>>> raphael
