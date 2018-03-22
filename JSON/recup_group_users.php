<?php

include_once "../model/bdd.php";
include_once "../model/groupe.php";
header('Content-Type: application/json');

echo json_encode(user_by_groupes($_GET['id']));
