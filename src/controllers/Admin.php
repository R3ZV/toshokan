<?php

require_once('src/models/Activation.php');

class AdminController {
    public static function activations(): string {
        if ($_SESSION['logged'] !== true || $_SESSION['user_role'] !== 'admin') {
            header("Location: /404");
            die();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return self::activationsGet();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? null;
            self::activationsPost($action);
        } else {
            header("Location: /404");
            die();
        }

        header("Location: /admin/activations");
        die();
    }

    public static function activationsGet(): string {
        require_once "src/views/admin/activations.php";
        $activations = Activation::getAll();

        return showActivations($activations);
    }

    public static function activationsPost($id, $action) {
        if ($action === 'approve') {
            Activation::approveReq($id);
        } elseif ($action === 'deny') {
            Activation::denyReq($id);
        }
    }
}
?>
