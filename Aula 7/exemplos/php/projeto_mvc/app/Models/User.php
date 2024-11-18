<?php

namespace App\Models;

use App\core\Database;
use PDO;

class User
{
    public static function all()
    {
        $db = Database::getConnection();
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('INSERT INTO users (name, email) VALUES (?, ?)');
        $stmt->execute([$data['name'], $data['email']]);
    }

    public static function update($id, $data)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');
        $stmt->execute([$data['name'], $data['email'], $id]);
    }

    public static function delete($id)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$id]);
    }
}
