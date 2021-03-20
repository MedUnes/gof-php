<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory\Standard;

use Medunes\Gof\Creational\AbstractFactory\DoorInterface;
use Medunes\Gof\Creational\AbstractFactory\MazeFactoryInterface;
use Medunes\Gof\Creational\AbstractFactory\MazeInterface;
use Medunes\Gof\Creational\AbstractFactory\RoomInterface;
use Medunes\Gof\Creational\AbstractFactory\WallInterface;

class StandardMazeFactory implements MazeFactoryInterface
{
    public function createRoom(int $id): RoomInterface
    {
        return new StandardRoom($id);
    }

    public function createDoor(RoomInterface $insideRoom, RoomInterface $outsideRoom): DoorInterface
    {
        return new StandardDoor($insideRoom, $outsideRoom);
    }

    public function createWall(): WallInterface
    {
        return new StandardWall();
    }

    public function createMaze(): MazeInterface
    {
        return new StandardMaze();
    }
}
