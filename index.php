<?php
require 'database/Connection.php';
require 'models/User.php';
require 'repositories/UserRepositoryInterface.php';
require 'repositories/UserRepository.php';
require 'services/UserService.php';

    $db = Connection::getInstance();
    $userRepository = new UserRepository($db);
    $userService = new UserService($userRepository);

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $userService->createUser($name, $email);
    }
