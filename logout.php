<?php
session_start();
require '../config/database.php';
require '../app/models/UserModel.php';
require '../app/controllers/AuthController.php';

$model = new UserModel($db);
$auth = new AuthController($model);
$auth->logout();
