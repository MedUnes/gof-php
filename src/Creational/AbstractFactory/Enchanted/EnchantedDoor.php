<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory\Enchanted;

use Medunes\Gof\Creational\AbstractFactory\AbstractDoor;
use Medunes\Gof\Creational\AbstractFactory\RoomInterface;

class EnchantedDoor extends AbstractDoor
{
    public function __construct(RoomInterface $insideRoom, RoomInterface $outsideRoom)
    {
        $this->insideRoom = $insideRoom;
        $this->outsideRoom = $outsideRoom;
    }
}
