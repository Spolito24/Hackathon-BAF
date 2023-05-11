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

    public function updateUserTravel($userId, $travelId)
{
    $query = '
    UPDATE ' . self::TABLE . '
    SET travel_id = :travelId
    WHERE id = :userId
    ';

    $statement = $this->pdo->prepare($query);
    $statement->bindValue(':userId', $userId, \PDO::PARAM_INT);
    $statement->bindValue(':travelId', $travelId, \PDO::PARAM_INT);
    $statement->execute();
}

public function getUserWithTravel($userId)
{
    $query = '
    SELECT user.*, destination.*
    FROM ' . self::TABLE . ' AS user
    LEFT JOIN destination
    ON user.travel_id = destination.id
    WHERE user.id = :userId
    ';

    $statement = $this->pdo->prepare($query);
    $statement->bindValue(':userId', $userId, \PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetch();
}

}