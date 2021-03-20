<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory\Bombed;

use Medunes\Gof\Creational\AbstractFactory\DoorInterface;
use Medunes\Gof\Creational\AbstractFactory\MazeFactoryInterface;
use Medunes\Gof\Creational\AbstractFactory\MazeInterface;
use Medunes\Gof\Creational\AbstractFactory\RoomInterface;
use Medunes\Gof\Creational\AbstractFactory\WallInterface;

class BombedMazeFactory implements MazeFactoryInterface
{
    public function createRoom(int $id): RoomInterface
    {
        return new BombedRoom($id);
    }

    public function createDoor(RoomInterface $insideRoom, RoomInterface $outsideRoom): DoorInterface
    {
        return new BombedDoor($insideRoom, $outsideRoom);
    }

    public function createWall(): WallInterface
    {
        return new BombedWall();
    }

    public function createMaze(): MazeInterface
    {
        return new BombedMaze();
    }
}
