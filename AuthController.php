<?php
class AuthController {
    private $model;
    public function __construct($model) {
        $this->model = $model;
    }

    public function login($username, $password) {
        $user = $this->model->authenticate($username, $password);
        if ($user) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role']
            ];
            header('Location: index.php');
            exit;
        } else {
            return "Invalid credentials.";
        }
    }

    public function logout() {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
?>
