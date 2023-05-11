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
}
