<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory;

interface MazeFactoryInterface
{
    public function createRoom(int $id): RoomInterface;

    public function createDoor(RoomInterface $insideRoom, RoomInterface $outsideRoom): DoorInterface;

    public function createWall(): WallInterface;

    public function createMaze(): MazeInterface;
}
