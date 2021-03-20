<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory\Enchanted;

use Medunes\Gof\Creational\AbstractFactory\DoorInterface;
use Medunes\Gof\Creational\AbstractFactory\MazeFactoryInterface;
use Medunes\Gof\Creational\AbstractFactory\MazeInterface;
use Medunes\Gof\Creational\AbstractFactory\RoomInterface;
use Medunes\Gof\Creational\AbstractFactory\WallInterface;

class EnchantedMazeFactory implements MazeFactoryInterface
{
    private const SPELL = 'TADA';
    private string $spell;

    public function __construct(string $spell = self::SPELL)
    {
        $this->spell = $spell;
    }

    public function createRoom(int $id): RoomInterface
    {
        return new EnchantedRoom($id, new Spell($this->spell));
    }

    public function createDoor(RoomInterface $insideRoom, RoomInterface $outsideRoom): DoorInterface
    {
        return new EnchantedDoor($insideRoom, $outsideRoom);
    }

    public function createWall(): WallInterface
    {
        return new EnchantedWall();
    }

    public function createMaze(): MazeInterface
    {
        return new EnchantedMaze();
    }
}
