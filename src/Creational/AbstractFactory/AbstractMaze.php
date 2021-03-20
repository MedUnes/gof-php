<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory;

use function count;

class AbstractMaze implements MazeInterface
{
    /*** @var RoomInterface[] */
    protected array $rooms;

    public function addRoom(RoomInterface $room): void
    {
        $this->rooms[$room->getId()] = $room;
    }

    public function getRoom(int $id): RoomInterface
    {
        return $this->rooms[$id];
    }

    public function getRoomCount(): int
    {
        return count($this->rooms);
    }
}
