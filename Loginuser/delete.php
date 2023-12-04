<?php
session_start();
require_once(dirname(__DIR__) . '/Handdler/connection.php');

$id = (int)$_GET['id'];

if ($id == false) {
    $newSession->setError('Data not deleted');
    header('Location:userListing.php');
    exit;
}
$GetDataClass->deleteUser($id);

$newSession->setMessage('Data has deleted');
header('Location: logout.php');
exit;
