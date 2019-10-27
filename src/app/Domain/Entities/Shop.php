<?php
declare (strict_types = 1);

namespace App\Domain\Entities;
use Illuminate\Support\Collection;

class Shop
{
    /** @var int */
    private $id;
    /** @var string */
    private $name;


    public function __construct(
        int $id,
        string $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}