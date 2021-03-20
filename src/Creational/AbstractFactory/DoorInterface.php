<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory;

interface DoorInterface
{
    public function getInsideRoom(): RoomInterface;

    public function getOutsideRoom(): RoomInterface;
}
