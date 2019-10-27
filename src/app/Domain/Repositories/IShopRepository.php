<?php
declare (strict_types = 1);
namespace App\Domain\Repositories;
use App\Domain\Entities\Shop;

interface IShopRepository
{
    /**
     * @param int $shopId 店舗ID
     * @return Shop|null
     */
    public function find(int $shopId): ?Shop;
}
