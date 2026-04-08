<?php
namespace App;

use PDO;
use PDOException;

class Database {
    public static function getConnection() {
        try {
            $path = __DIR__ . '/../database.sqlite';
            $db = new PDO("sqlite:$path");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $db->exec("CREATE TABLE IF NOT EXISTS ordens_servico (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                cliente TEXT NOT NULL,
                equipamento TEXT NOT NULL,
                defeito TEXT NOT NULL,
                status TEXT DEFAULT 'Pendente',
                data_entrada DATETIME DEFAULT CURRENT_TIMESTAMP
            )");
            
            return $db;
        } catch (PDOException $e) {
            die("Erro ao conectar: " . $e->getMessage());
        }
    }
}