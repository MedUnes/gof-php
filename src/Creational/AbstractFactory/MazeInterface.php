<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory;

interface MazeInterface
{
    public function addRoom(RoomInterface $room): void;
    public function getRoom(int $id): RoomInterface;
    public function getRoomCount(): int;
}
