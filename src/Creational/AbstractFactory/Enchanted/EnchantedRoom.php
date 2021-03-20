<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory\Enchanted;

use Medunes\Gof\Creational\AbstractFactory\AbstractRoom;

class EnchantedRoom extends AbstractRoom
{
    private Spell $spell;

    public function __construct(int $id, Spell $spell)
    {
        $this->id = $id;
        $this->spell = $spell;
    }

    public function getSpell(): Spell
    {
        return $this->spell;
    }
}
