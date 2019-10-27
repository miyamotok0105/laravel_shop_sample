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

    /**
     * @return Collection
     */
    // public function getGroupIds(): Collection
    // {
    //     return $this->groupIds;
    // }
    /**
     * @param array|Collection $groupIds 検査対象のグループID
     * @return bool すべて所持していればtrue
     */
    // public function hasGroups($groupIds): bool
    // {
    //     $groupIdsGiven = collect($groupIds);
    //     $groupIdsDiff = $groupIdsGiven->diff($this->groupIds);
    //     return $groupIdsDiff->count() === 0;
    // }
}