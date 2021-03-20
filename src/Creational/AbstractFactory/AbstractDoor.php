<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory;

class AbstractDoor implements DoorInterface
{
    protected RoomInterface $insideRoom;
    protected RoomInterface $outsideRoom;

    public function getInsideRoom(): RoomInterface
    {
        return $this->insideRoom;
    }

    public function getOutsideRoom(): RoomInterface
    {
        return $this->outsideRoom;
    }
}
