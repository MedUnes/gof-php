<?php

declare(strict_types=1);

namespace Medunes\Test\Gof\Creational\Creational\AbstractFactory\Enchanted;

use Medunes\Gof\Creational\AbstractFactory\Enchanted\EnchantedDoor;
use Medunes\Gof\Creational\AbstractFactory\Enchanted\EnchantedMaze;
use Medunes\Gof\Creational\AbstractFactory\Enchanted\EnchantedMazeFactory;
use Medunes\Gof\Creational\AbstractFactory\Enchanted\EnchantedWall;
use Medunes\Gof\Creational\AbstractFactory\RoomInterface;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class EnchantedMazeFactoryTest extends TestCase
{
    public function provideEnchantedMazeData(): array
    {
        $enchantedMazeFactory = new EnchantedMazeFactory('testSpell');
        $standardMaze = $enchantedMazeFactory->createMaze();

        $startRoom = $enchantedMazeFactory->createRoom(0);
        $eastRoom = $enchantedMazeFactory->createRoom(1);
        $northRoom = $enchantedMazeFactory->createRoom(2);
        $northEastRoom = $enchantedMazeFactory->createRoom(3);

        $startRoom->setSide(RoomInterface::DIRECTION_NORTH, $enchantedMazeFactory->createDoor($startRoom, $northRoom));
        $startRoom->setSide(RoomInterface::DIRECTION_SOUTH, $enchantedMazeFactory->createWall());
        $startRoom->setSide(RoomInterface::DIRECTION_EAST, $enchantedMazeFactory->createDoor($startRoom, $eastRoom));
        $startRoom->setSide(RoomInterface::DIRECTION_WEST, $enchantedMazeFactory->createWall());

        $eastRoom->setSide(RoomInterface::DIRECTION_NORTH, $enchantedMazeFactory->createWall());
        $eastRoom->setSide(RoomInterface::DIRECTION_SOUTH, $enchantedMazeFactory->createWall());
        $eastRoom->setSide(RoomInterface::DIRECTION_WEST, $enchantedMazeFactory->createDoor($eastRoom, $startRoom));
        $eastRoom->setSide(RoomInterface::DIRECTION_EAST, $enchantedMazeFactory->createWall());

        $northRoom->setSide(RoomInterface::DIRECTION_NORTH, $enchantedMazeFactory->createWall());
        $northRoom->setSide(RoomInterface::DIRECTION_SOUTH, $enchantedMazeFactory->createDoor($northRoom, $startRoom));
        $northRoom->setSide(RoomInterface::DIRECTION_WEST, $enchantedMazeFactory->createWall());
        $northRoom->setSide(RoomInterface::DIRECTION_EAST, $enchantedMazeFactory->createDoor($northRoom, $northEastRoom));

        $northEastRoom->setSide(RoomInterface::DIRECTION_NORTH, $enchantedMazeFactory->createWall());
        $northEastRoom->setSide(RoomInterface::DIRECTION_SOUTH, $enchantedMazeFactory->createWall());
        $northEastRoom->setSide(RoomInterface::DIRECTION_WEST, $enchantedMazeFactory->createWall());
        $northEastRoom->setSide(RoomInterface::DIRECTION_EAST, $enchantedMazeFactory->createWall());

        $standardMaze->addRoom($startRoom);
        $standardMaze->addRoom($eastRoom);
        $standardMaze->addRoom($northRoom);
        $standardMaze->addRoom($northEastRoom);

        return [
            [$standardMaze, 'testSpell'],
        ];
    }

    /**
     * @dataProvider provideEnchantedMazeData
     */
    public function testStandardMaze(EnchantedMaze $enchantedMaze, string $spell): void
    {
        for ($id = 0; $id < $enchantedMaze->getRoomCount(); ++$id) {
            static::assertSame($enchantedMaze->getRoom($id)->getId(), $id);
            static::assertSame((string)$enchantedMaze->getRoom($id)->getSpell(), $spell);
            $northSide = $enchantedMaze->getRoom($id)->getSide(RoomInterface::DIRECTION_NORTH);
            static::assertContains(\get_class($northSide), [EnchantedDoor::class, EnchantedWall::class]);
        }
    }
}

