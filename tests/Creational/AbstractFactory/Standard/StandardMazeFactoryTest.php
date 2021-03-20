<?php

declare(strict_types=1);

namespace Medunes\Test\Gof\Creational\Creational\AbstractFactory\Standard;

use Medunes\Gof\Creational\AbstractFactory\RoomInterface;
use Medunes\Gof\Creational\AbstractFactory\Standard\StandardDoor;
use Medunes\Gof\Creational\AbstractFactory\Standard\StandardMaze;
use Medunes\Gof\Creational\AbstractFactory\Standard\StandardMazeFactory;
use Medunes\Gof\Creational\AbstractFactory\Standard\StandardWall;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class StandardMazeFactoryTest extends TestCase
{
    public function provideStandardMazeData(): array
    {
        $standardMazeFactory = new StandardMazeFactory();
        $standardMaze = $standardMazeFactory->createMaze();

        $startRoom = $standardMazeFactory->createRoom(0);
        $eastRoom = $standardMazeFactory->createRoom(1);
        $northRoom = $standardMazeFactory->createRoom(2);
        $northEastRoom = $standardMazeFactory->createRoom(3);

        $startRoom->setSide(RoomInterface::DIRECTION_NORTH, $standardMazeFactory->createDoor($startRoom, $northRoom));
        $startRoom->setSide(RoomInterface::DIRECTION_SOUTH, $standardMazeFactory->createWall());
        $startRoom->setSide(RoomInterface::DIRECTION_EAST, $standardMazeFactory->createDoor($startRoom, $eastRoom));
        $startRoom->setSide(RoomInterface::DIRECTION_WEST, $standardMazeFactory->createWall());

        $eastRoom->setSide(RoomInterface::DIRECTION_NORTH, $standardMazeFactory->createWall());
        $eastRoom->setSide(RoomInterface::DIRECTION_SOUTH, $standardMazeFactory->createWall());
        $eastRoom->setSide(RoomInterface::DIRECTION_WEST, $standardMazeFactory->createDoor($eastRoom, $startRoom));
        $eastRoom->setSide(RoomInterface::DIRECTION_EAST, $standardMazeFactory->createWall());

        $northRoom->setSide(RoomInterface::DIRECTION_NORTH, $standardMazeFactory->createWall());
        $northRoom->setSide(RoomInterface::DIRECTION_SOUTH, $standardMazeFactory->createDoor($northRoom, $startRoom));
        $northRoom->setSide(RoomInterface::DIRECTION_WEST, $standardMazeFactory->createWall());
        $northRoom->setSide(RoomInterface::DIRECTION_EAST, $standardMazeFactory->createDoor($northRoom, $northEastRoom));

        $northEastRoom->setSide(RoomInterface::DIRECTION_NORTH, $standardMazeFactory->createWall());
        $northEastRoom->setSide(RoomInterface::DIRECTION_SOUTH, $standardMazeFactory->createWall());
        $northEastRoom->setSide(RoomInterface::DIRECTION_WEST, $standardMazeFactory->createWall());
        $northEastRoom->setSide(RoomInterface::DIRECTION_EAST, $standardMazeFactory->createWall());

        $standardMaze->addRoom($startRoom);
        $standardMaze->addRoom($eastRoom);
        $standardMaze->addRoom($northRoom);
        $standardMaze->addRoom($northEastRoom);

        return [
            [$standardMaze],
        ];
    }

    /**
     * @dataProvider provideStandardMazeData
     */
    public function testStandardMaze(StandardMaze $standardMaze): void
    {
        for ($id = 0; $id < $standardMaze->getRoomCount(); ++$id) {
            static::assertSame($standardMaze->getRoom($id)->getId(), $id);
            $northSide = $standardMaze->getRoom($id)->getSide(RoomInterface::DIRECTION_NORTH);
            static::assertContains(\get_class($northSide), [StandardDoor::class, StandardWall::class]);
        }
    }
}
