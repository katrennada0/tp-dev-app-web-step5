<?php
class BmiController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function calculateBmi($name, $weight, $height) {
        if ($weight <= 0 || $height <= 0) {
            return ['error' => 'Invalid values provided.'];
        }

        $bmi = round($weight / pow($height / 100, 2), 2);

        if ($bmi < 18.5) {
            $status = "Underweight";
            $alert = "alert-warning";
        } elseif ($bmi < 25) {
            $status = "Normal weight";
            $alert = "alert-success";
        } elseif ($bmi < 30) {
            $status = "Overweight";
            $alert = "alert-warning";
        } else {
            $status = "Obese";
            $alert = "alert-danger";
        }

        $this->model->saveBmiRecord($name, $weight, $height, $bmi, $status);

        return [
            'name' => $name,
            'bmi' => $bmi,
            'status' => $status,
            'alert' => $alert
        ];
    }
}
