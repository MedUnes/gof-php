<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory\Bombed;

use Medunes\Gof\Creational\AbstractFactory\AbstractRoom;

class BombedRoom extends AbstractRoom
{
    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
