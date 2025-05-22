<?php
require_once '../config/database.php';
require_once '../app/models/BmiModel.php';
require_once '../app/controllers/BmiController.php';

$model = new BmiModel($db);
$controller = new BmiController($model);
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

include '../app/views/bmi_form.php';
