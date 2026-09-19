<?php
// Điền thông tin MySQL của bạn ở đây (lấy trong vPanel của InfinityFree, mục MySQL Databases).
// Host thường có dạng sqlxxx.infinityfree.com, tên DB/user thường có tiền tố epiz_xxxxxxx_
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');

function get_pdo() {
    static $pdo = null;
    if ($pdo !== null) return $pdo;

    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $pdo->exec("CREATE TABLE IF NOT EXISTS words (
        id INT AUTO_INCREMENT PRIMARY KEY,
        term VARCHAR(191) NOT NULL,
        phonetic VARCHAR(191) DEFAULT '',
        pos VARCHAR(10) DEFAULT 'v',
        synonym VARCHAR(191) DEFAULT '',
        meaning VARCHAR(500) NOT NULL,
        example TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    $pdo->exec("CREATE TABLE IF NOT EXISTS trash (
        id INT AUTO_INCREMENT PRIMARY KEY,
        original_id INT NOT NULL,
        term VARCHAR(191) NOT NULL,
        phonetic VARCHAR(191) DEFAULT '',
        pos VARCHAR(10) DEFAULT 'v',
        synonym VARCHAR(191) DEFAULT '',
        meaning VARCHAR(500) NOT NULL,
        example TEXT,
        deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    return $pdo;
}
