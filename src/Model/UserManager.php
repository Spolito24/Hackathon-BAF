<?php

namespace App\Model;

class UserManager extends AbstractManager
{
    public const TABLE = 'user';

    public function selectUserByName(string $username): array|false
    {
        $statement = $this->pdo->prepare("SELECT * FROM "  . self::TABLE . " WHERE username = :username");
        $statement->bindValue(':username', $username, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetch();
    }

    public function selectUserPictures(string $userId): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM photo WHERE user_id = :userId");
        $statement->bindValue(':userId', $userId, \PDO::PARAM_STR);
        $statement->execute();

        return $statement->fetchAll();
    }
}