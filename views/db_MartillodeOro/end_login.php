<?php
    include_once 'session_active.php';
    $userSession = new UserSession();
    $userSession->closeSession();
    header("location: ../../Index.php");
?>