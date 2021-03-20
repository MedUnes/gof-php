<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory\Enchanted;

class Spell
{
    private string $spell;

    public function __construct(string $spell)
    {
        $this->spell = $spell;
    }

    public function __toString(): string
    {
        return $this->spell;
    }
}
