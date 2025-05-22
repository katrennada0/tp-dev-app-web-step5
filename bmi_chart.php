<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require '../config/database.php';
require '../app/models/BmiModel.php';

$model = new BmiModel($db);
$data = $model->getUserBmiHistory($_SESSION['user']['id']);

require '../app/views/bmi_chart.php';
