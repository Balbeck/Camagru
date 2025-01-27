<?php
require_once 'models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function signup($method) {
        if ($method !== 'POST') {
            $this->sendResponse(405, ['message' => 'Method Not Allowed']);
            return;
        }

        $data = json_decode(file_get_contents("php://input"));
        
        if (!isset($data->username) || !isset($data->email) || !isset($data->password)) {
            $this->sendResponse(400, ['message' => 'Missing required fields']);
            return;
        }

        $result = $this->userModel->create($data->username, $data->email, $data->password);

        if ($result) {
            $this->sendResponse(201, ['message' => 'User created successfully']);
        } else {
            $this->sendResponse(500, ['message' => 'Failed to create user']);
        }
    }

    public function signin($method) {
        if ($method !== 'POST') {
            $this->sendResponse(405, ['message' => 'Method Not Allowed']);
            return;
        }

        $data = json_decode(file_get_contents("php://input"));
        
        if (!isset($data->email) || !isset($data->password)) {
            $this->sendResponse(400, ['message' => 'Missing required fields']);
            return;
        }

        $user = $this->userModel->getByEmail($data->email);

        if ($user && password_verify($data->password, $user['password'])) {
            // Ici, vous pouvez générer un token JWT si vous voulez implémenter une authentification basée sur les tokens
            $this->sendResponse(200, ['message' => 'Login successful', 'user' => ['id' => $user['id'], 'username' => $user['username'], 'email' => $user['email']]]);
        } else {
            $this->sendResponse(401, ['message' => 'Invalid credentials']);
        }
    }

    public function forgotPassword($method) {
        if ($method !== 'POST') {
            $this->sendResponse(405, ['message' => 'Method Not Allowed']);
            return;
        }

        $data = json_decode(file_get_contents("php://input"));
        
        if (!isset($data->email)) {
            $this->sendResponse(400, ['message' => 'Missing email']);
            return;
        }

        $user = $this->userModel->getByEmail($data->email);

        if ($user) {
            // Ici, vous devriez implémenter la logique pour envoyer un email de réinitialisation de mot de passe
            // Pour cet exemple, nous allons simplement simuler que l'email a été envoyé
            $this->sendResponse(200, ['message' => 'Password reset instructions sent to your email']);
        } else {
            $this->sendResponse(404, ['message' => 'User not found']);
        }
    }

    private function sendResponse($statusCode, $data) {
        http_response_code($statusCode);
        echo json_encode($data);
    }
}
