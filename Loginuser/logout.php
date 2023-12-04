<?php
require_once(dirname(__DIR__) . '/Handdler/connection.php');
$newSession->removeUserId();
header("Location:index.php");
exit();
