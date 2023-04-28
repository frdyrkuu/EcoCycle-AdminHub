<?php

session_start();

if(!isset($_SESSION['admin-name']) || empty($_SESSION['admin-name'])){
    header('Location: admin-login-form.php');
}