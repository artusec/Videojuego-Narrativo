<?php
require_once __DIR__ . '/DB_data.php';
require_once __DIR__ . '/User.php';
$app = User::insert_user("artuyero", "arturo@gmail.com", "contraseña");
echo "Hecho";
