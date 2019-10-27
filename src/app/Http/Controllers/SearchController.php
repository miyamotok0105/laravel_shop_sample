<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Repositories\IShopRepository;

class SearchController extends Controller
{
    private $shopRepository;

    public function __construct(
        IShopRepository $shopRepository
    ) {
        $this->shopRepository = $shopRepository;
    }

    public function index(Request $request)
    {
        //キーワードを取得
        $keyword = $request->input('keyword');
        $shops = null;

        if(empty($keyword) == false)
        {
            // $shop = $this->shopRepository->find($keyword);
            $shops = $this->shopRepository->findByName($keyword);

        }
        \Log::info("==$shops==");
        

        //検索フォームへ
        return view('search.shopIndex',[
            'shops' => $shops,
            'keyword' => $keyword,
            ]);
    }
}


    // @if($shop != null)
    //   <div>{{ $shop->getId() }}</div>
    //   <div>{{ $shop->getName() }}</div>
    // @endif

// <!--
//     <div class="container">
//         @if(count($recipes) > 0)
//           <div class="row">
//             @foreach($recipes as $recipe)
//             <div class="col-md-3">
//               {{ $recipe->name }}
//             </div>
//             @endforeach
//            </div>
//         @endif
// 　　　　　　　　　　　　　　　　//ページネーション機能
//         <div class="paginate">
//             {{ $recipes->render('pagination::bootstrap-4') }}
//         </div>
//      </div>
//       -->

