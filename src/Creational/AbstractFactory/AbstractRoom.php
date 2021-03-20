<?php

declare(strict_types=1);

namespace Medunes\Gof\Creational\AbstractFactory;

use InvalidArgumentException;

class AbstractRoom implements RoomInterface
{
    protected int $id;

    /*** @var string[] */
    protected array $sides;

    /**
     * {@inheritdoc}
     */
    public function setSide(string $direction, $side): void
    {
        $this->validateDirection($direction);

        $this->sides[$direction] = $side;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getSide(string $direction)
    {
        $this->validateDirection($direction);

        return $this->sides[$direction];
    }

    private function validateDirection(string $direction): void
    {
        if (!\in_array($direction, self::DIRECTIONS, true)) {
            throw new InvalidArgumentException(sprintf(
                'Unknown side. (Accepted are %s)', implode(',', self::DIRECTIONS)
            ));
        }
    }
}
