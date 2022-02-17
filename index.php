<?php

require_once(__DIR__ . '/controller/User.php');

session_start();

if (isset($_SESSION['user'])) {
    $id_session = $_SESSION['user']['id'];
    $_SESSION['user_item'] = new User($id_session);
}

var_dump($_SESSION);

?>