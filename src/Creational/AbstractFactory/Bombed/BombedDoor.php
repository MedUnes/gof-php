<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory\Bombed;

use Medunes\Gof\Creational\AbstractFactory\AbstractDoor;
use Medunes\Gof\Creational\AbstractFactory\RoomInterface;

class BombedDoor extends AbstractDoor
{
    public function __construct(RoomInterface $insideRoom, RoomInterface $outsideRoom)
    {
        $this->insideRoom = $insideRoom;
        $this->outsideRoom = $outsideRoom;
    }
}
