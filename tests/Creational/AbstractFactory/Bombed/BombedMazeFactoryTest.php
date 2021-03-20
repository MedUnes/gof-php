<?php

declare(strict_types=1);

namespace Medunes\Test\Gof\Creational\Creational\AbstractFactory\Bombed;

use Medunes\Gof\Creational\AbstractFactory\Bombed\BombedDoor;
use Medunes\Gof\Creational\AbstractFactory\Bombed\BombedMaze;
use Medunes\Gof\Creational\AbstractFactory\Bombed\BombedMazeFactory;
use Medunes\Gof\Creational\AbstractFactory\Bombed\BombedRoom;
use Medunes\Gof\Creational\AbstractFactory\Bombed\BombedWall;
use Medunes\Gof\Creational\AbstractFactory\RoomInterface;
use PHPUnit\Framework\TestCase;

/**
 * @coversNothing
 */
class BombedMazeFactoryTest extends TestCase
{
    public function provideBombedMazeData(): array
    {
        $bombedMazeFactory = new BombedMazeFactory();
        $standardMaze = $bombedMazeFactory->createMaze();

        $startRoom = $bombedMazeFactory->createRoom(0);
        $eastRoom = $bombedMazeFactory->createRoom(1);
        $northRoom = $bombedMazeFactory->createRoom(2);
        $northEastRoom = $bombedMazeFactory->createRoom(3);

        $startRoom->setSide(RoomInterface::DIRECTION_NORTH, $bombedMazeFactory->createDoor($startRoom, $northRoom));
        $startRoom->setSide(RoomInterface::DIRECTION_SOUTH, $bombedMazeFactory->createWall());
        $startRoom->setSide(RoomInterface::DIRECTION_EAST, $bombedMazeFactory->createDoor($startRoom, $eastRoom));
        $startRoom->setSide(RoomInterface::DIRECTION_WEST, $bombedMazeFactory->createWall());

        $eastRoom->setSide(RoomInterface::DIRECTION_NORTH, $bombedMazeFactory->createWall());
        $eastRoom->setSide(RoomInterface::DIRECTION_SOUTH, $bombedMazeFactory->createWall());
        $eastRoom->setSide(RoomInterface::DIRECTION_WEST, $bombedMazeFactory->createDoor($eastRoom, $startRoom));
        $eastRoom->setSide(RoomInterface::DIRECTION_EAST, $bombedMazeFactory->createWall());

        $northRoom->setSide(RoomInterface::DIRECTION_NORTH, $bombedMazeFactory->createWall());
        $northRoom->setSide(RoomInterface::DIRECTION_SOUTH, $bombedMazeFactory->createDoor($northRoom, $startRoom));
        $northRoom->setSide(RoomInterface::DIRECTION_WEST, $bombedMazeFactory->createWall());
        $northRoom->setSide(RoomInterface::DIRECTION_EAST, $bombedMazeFactory->createDoor($northRoom, $northEastRoom));

        $northEastRoom->setSide(RoomInterface::DIRECTION_NORTH, $bombedMazeFactory->createWall());
        $northEastRoom->setSide(RoomInterface::DIRECTION_SOUTH, $bombedMazeFactory->createWall());
        $northEastRoom->setSide(RoomInterface::DIRECTION_WEST, $bombedMazeFactory->createWall());
        $northEastRoom->setSide(RoomInterface::DIRECTION_EAST, $bombedMazeFactory->createWall());

        $standardMaze->addRoom($startRoom);
        $standardMaze->addRoom($eastRoom);
        $standardMaze->addRoom($northRoom);
        $standardMaze->addRoom($northEastRoom);

        return [
            [$standardMaze],
        ];
    }

    /**
     * @dataProvider provideBombedMazeData
     */
    public function testBombedMaze(BombedMaze $bombedMaze): void
    {
        for ($id = 0; $id < $bombedMaze->getRoomCount(); ++$id) {
            static::assertSame($bombedMaze->getRoom($id)->getId(), $id);
            $northSide = $bombedMaze->getRoom($id)->getSide(RoomInterface::DIRECTION_NORTH);
            static::assertContains(\get_class($northSide), [BombedDoor::class, BombedWall::class]);
        }
    }
}
