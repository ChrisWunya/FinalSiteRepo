<?php
// Include Database
include "db.php";

// Start A Session
session_start();



// set a session of 'username'
$_SESSION['userName'] = null;
$_SESSION['firstName'] = null;
$_SESSION['lastName'] = null;
$_SESSION['userRole'] = null;

header("Location: ../index.php");