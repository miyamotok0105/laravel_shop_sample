<?php
declare (strict_types = 1);

namespace App\Infrastructure\Repositories;


use Illuminate\Support\Collection;
use App\Domain\Repositories\IShopRepository;
use App\Domain\Entities\Shop;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShopRepositoryRDB implements IShopRepository
{
    /**
     * @param int $shopId 店舗ID
     * @return Shop|null 店舗オブジェクト
     */
    function find(int $shopId): ?Shop
    {
        $row = DB::table('shops')
            ->select('id', 'name')
            ->where('shops.id', '=', $shopId)
            ->get();

        if ($row->count() === 0) {
            return null;
        }

        $name = (string)$row[0]->name;
        return new Shop($shopId, $name);
    }

    public function findByName(string $name): Collection
    {
        $rows = DB::table('shops')
            ->select('id', 'name')
            ->where('shops.name', 'like', '%' . $name . '%')
            ->get();

        if ($rows->count() === 0) {
            return null;
        }
        return $rows
            ->map(
                function (\stdClass $row) {
                    $shopId = $row->id;
                    $name = $row->name;
                    return new Shop($shopId, $name);
                }
            );
    }

}