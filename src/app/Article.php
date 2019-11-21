<?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;

// class Article extends Model
// {
//     protected $casts = [
//         'tags' => 'json',
//     ];
// }


namespace App;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Searchable;

    protected $casts = [
        'tags' => 'json',
    ];
}
