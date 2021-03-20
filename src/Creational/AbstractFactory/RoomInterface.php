<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory;

interface RoomInterface
{
    public const DIRECTION_NORTH = 'north';
    public const DIRECTION_SOUTH = 'south';
    public const DIRECTION_EAST = 'east';
    public const DIRECTION_WEST = 'west';

    public const DIRECTIONS = [
        self::DIRECTION_NORTH,
        self::DIRECTION_SOUTH,
        self::DIRECTION_EAST,
        self::DIRECTION_WEST,
    ];

    /**
     * @param WallInterface|DoorInterface $side
     */
    public function setSide(string $direction, $side): void;

    public function getId(): int;

    /**
     * @return WallInterface|DoorInterface
     */
    public function getSide(string $direction);
}
