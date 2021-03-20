<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory\Standard;

use Medunes\Gof\Creational\AbstractFactory\AbstractRoom;

class StandardRoom extends AbstractRoom
{
    public function __construct(int $id)
    {
        $this->id = $id;
    }
}
