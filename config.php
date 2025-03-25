<?php
// تعديل بيانات الاتصال بقاعدة البيانات حسب بيئتك
$host = 'sql211.infinityfree.com';
$db   = 'if0_38582566_adham66';
$user = 'if0_38582566';
$pass = 'Ju57sXCEDinUOTn';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                $pdo = new PDO($dsn, $user, $pass, $options);
                } catch (\PDOException $e) {
                    throw new \PDOException($e->getMessage(), (int)$e->getCode());
                    }
                    ?>