<?php
require_once(dirname(__DIR__) . '/Handdler/connection.php');
$newSession->removeAuthId();
header("Location:index.php");
exit();
