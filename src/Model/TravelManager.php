<?php

namespace App\Model;

use PDO;

class TravelManager extends AbstractManager
{
    public const TABLE = 'destination';

    /**
     * Select destination in DB
     */
    public function selectTravel(): array
    {
        $query = '
        SELECT * 
        FROM '  . self::TABLE . '
        ORDER BY RAND()
        LIMIT 1
        ';

        return $this->pdo->query($query)->fetch();
    }

    public function selectPlace(int $id): array
    {
        $statement = $this->pdo->prepare('
        SELECT 
        user.username, destination.country, destination.city, destination.image, destination.lat, destination.long
        FROM ' . self::TABLE . '
        JOIN user ON user.travel_id = destination.id
        WHERE user.travel_id=:userid');

        $statement->bindValue(':userid', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
