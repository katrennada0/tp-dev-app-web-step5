<?php
session_start();
require '../config/database.php';
require '../app/models/UserModel.php';
require '../app/controllers/AuthController.php';

$model = new UserModel($db);
$auth = new AuthController($model);
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = $auth->login($_POST['username'], $_POST['password']);
}

require '../app/views/login.php';
