<?php
    include_once "db.php";
    unset($_SESSION['user']);
    unset($_SESSION['key']);
    header("location:../login.php");