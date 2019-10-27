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
        \Log::info($name);
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

        \Log::info("===gettype====");
        \Log::info(gettype($rows));

        return $rows
            ->map(
                function (\stdClass $row) {
                    \Log::info("===gettype row====");
                    \Log::info(gettype($row));
                    \Log::info($row->id);
                    \Log::info($row->name);
                    $shopId = $row->id;
                    $name = $row->name;
                    return new Shop($shopId, $name);
                }
            );
    }

    /**
     * クエリ結果からCollection<Group>を構築
     * @param $queryResult groupsテーブルの取得結果
     * @param $queryResultKeywords keywordsテーブルの取得結果
     * @return Collection Groupオブジェクトのコレクション
     */
    // private function queryResultToGroups(
    //     Collection $queryResult,
    //     Collection $queryResultKeywords
    // ): Collection {
    //     // キーワードをグループ化
    //     // id -> [keyword]
    //     $idToKeywords = $queryResultKeywords
    //         ->groupBy('id')
    //         ->map(
    //             function (Collection $rows) {
    //                 return $rows->pluck('keyword');
    //             }
    //         );
    //     return $queryResult
    //         ->map(
    //             function (\stdClass $row) use ($idToKeywords) {
    //                 $id = $row->id;
    //                 // キーワードは無いこともある
    //                 $keywords = $idToKeywords[$id] ?? [];
    //                 return new Group(
    //                     $id,
    //                     $row->shop_id,
    //                     $row->name,
    //                     $this->replyDataMapper->getReplyFromData((array)$row),
    //                     $keywords
    //                 );
    //             }
    //         );
    // }

}