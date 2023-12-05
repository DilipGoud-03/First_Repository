<?php
session_start();
require_once(dirname(__DIR__) . '/Handdler/connection.php');

$id = (int)$_GET['id'];

if ($id == false) {
    $newSession->setError('User Information not deleted');
    header('Location:userListing.php');
    exit;
}
$GetDataClass->deleteUser($id);

$newSession->setMessage('User Information has been deleted');
header('Location: logout.php');
exit;
