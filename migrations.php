<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/bootstrap.php';

$db = App::resolve('db');

$schemas = [
    "users" => [
        "id INT(11) PRIMARY KEY AUTO_INCREMENT",
        "name VARCHAR(190) NOT NULL",
        "email VARCHAR(190) UNIQUE NOT NULL",
        "password VARCHAR(60) NOT NULL",
        "created_at timestamp DEFAULT NOW()",
        "updated_at timestamp DEFAULT NOW()",
    ],
    "posts" => [
        "id INT(11) PRIMARY KEY AUTO_INCREMENT",
        "title VARCHAR(190) NOT NULL",
        "content TEXT NOT NULL",
        "author_id INT(11) NOT NULL",
        "created_at timestamp DEFAULT NOW()",
        "updated_at timestamp DEFAULT NOW()",
        "FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE"
    ],
];

foreach ($schemas as $table => $schema) {
    echo "Creating table $table...\n";
    $sql = "CREATE TABLE $table (" . implode(', ', $schema) . ")";
    $db->execute($sql);
    echo "Created table $table successfull!!!\n\n";
}

echo "\n\nMigrations Completed Sucessfully!!!\n";
