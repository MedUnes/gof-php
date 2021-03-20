<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory\Standard;

use Medunes\Gof\Creational\AbstractFactory\AbstractDoor;
use Medunes\Gof\Creational\AbstractFactory\RoomInterface;

class StandardDoor extends AbstractDoor
{
    public function __construct(RoomInterface $insideRoom, RoomInterface $outsideRoom)
    {
        $this->insideRoom = $insideRoom;
        $this->outsideRoom = $outsideRoom;
    }
}
