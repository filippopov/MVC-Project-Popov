<?php
namespace SoftUni\Models;

use SoftUni\Core\Database;

class User
{
    const MONEY = 0;


    public function register($username, $password)
    {
        $db = Database::getInstance('app');

        if ($this->exists($username)) {
            throw new \Exception("User already registered");
        }

        $result = $db->prepare("
            INSERT INTO users (username, password, money)
            VALUES (?, ?, ?);
        ");
        $result->execute(
            [

                $username,
                password_hash($password, PASSWORD_DEFAULT),
                self::MONEY

            ]
        );

        if ($result->rowCount() > 0) {

            return true;
        }

        throw new \Exception('Cannot register user');
    }

    public function exists($username)
    {
        $db = Database::getInstance('app');

        $result = $db->prepare("SELECT id FROM users WHERE username = ?");
        $result->execute([ $username ]);

        return $result->rowCount() > 0;
    }

    public function login($username, $password)
    {
        $db = Database::getInstance('app');

        $result = $db->prepare("
            SELECT
                id, username, password, money
            FROM
                users
            WHERE username = ?
        ");

        $result->execute([$username]);

        if ($result->rowCount() <= 0) {
            throw new \Exception('Invalid username');
        }

        $userRow = $result->fetch();

        if (password_verify($password, $userRow['password'])) {
            return $userRow['id'];
        }

        throw new \Exception('Invalid credentials');
    }

    public function getInfo($id)
    {
        $db = Database::getInstance('app');

        $result = $db->prepare("
            SELECT
                id, username, password, money
            FROM
                users
            WHERE id = ?
        ");

        $result->execute([$id]);

        return $result->fetch();
    }

    public function edit($user, $pass, $id)
    {
        $db = Database::getInstance('app');

        $result = $db->prepare("UPDATE users SET password = ?, username = ? WHERE id = ?");
        $result->execute([
            $pass,
            $user,
            $id
        ]);

        return $result->rowCount() > 0;
    }
}