<?php

require_once('audiorecorder.php');

$client = new audiorecorder();

if(isset($_GET['save'])) {
    $client->save($_FILES['voicefile']['tmp_name']);
}

?>


