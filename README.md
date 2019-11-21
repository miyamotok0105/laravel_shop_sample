
# 環境

```
laravel v5.5.48
```

vue+blade



composer install

bash etc/init-project.sh
php artisan key:generate
php artisan jwt:secret
php artisan migrate
php artisan db:seed


Laravel初期的な設定をする。    
https://blog.capilano-fw.com/?p=289#i-2



```
composer create-project "laravel/laravel=5.5.*" src
```



```php:config/database.php

```


```:.env
APP_NAME サイト名
APP_URL　サイトのURL
DB_DATABASE　データベース名
DB_USERNAME　DBユーザ名
DB_PASSWORD　DBパスワード
```

create database `laravel_shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;



```
mysql -uroot -p
password
mysql -u default -p
secret

# Linux
systemctl start mysql
# Mac
mysql.server start

DESCRIBE `replies`;
```


app.php

'timezone' => 'Asia/Tokyo',
'locale' => 'ja',
'fallback_locale' => 'ja',


sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache


php artisan make:auth
php artisan migrate
php artisan make:seed UsersTableSeeder

php artisan migrate:fresh --seed


```
# 定額制のサブスクリプション系はcashierを使う
composer require "laravel/cashier":"~7.0"
# 単発払いの場合
composer require stripe/stripe-php
```



# 簡易購入

formを追加


```:welcome.blade.php
<form action="{{ asset('pay') }}" method="POST">
    {{ csrf_field() }}
 <script
     src="https://checkout.stripe.com/checkout.js" class="stripe-button"
     data-key="{{ env('STRIPE_KEY') }}"
     data-amount="100"
     data-name="Stripe決済デモ"
     data-label="決済をする"
     data-description="これはデモ決済です"
     data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
     data-locale="auto"
     data-currency="JPY">
 </script>
</form>
```


```
php artisan make:controller PaymentController
```


```:app\Http\Controllers\PaymentController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;


class PaymentController extends Controller
{
    public function pay(Request $request){
        Stripe::setApiKey(env('STRIPE_SECRET'));//シークレットキー

        $charge = Charge::create(array(
            'amount' => 100,
            'currency' => 'jpy',
            'source'=> request()->stripeToken,
        ));
        return back();
    }
}

```


```:web.php
Route::post('/pay', 'PaymentController@pay');
```


決済ボタンを押してみる

テスト用の番号があるので使ってみる。


```
NUMBER  BRAND   CVC DATE
4242424242424242    Visa    Any 3 digits    Any future date
4000056655665556    Visa (debit)    Any 3 digits    Any future date
5555555555554444    Mastercard  Any 3 digits    Any future date
2223003122003222    Mastercard (2-series)   Any 3 digits    Any future date
5200828282828210    Mastercard (debit)  Any 3 digits    Any future date
```

https://stripe.com/docs/testing#cards


# 簡易フォーム



```
php artisan make:controller StripePaymentController
```


```:app\Http\Controllers\StripePaymentController.php
<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
  
        Session::flash('success', 'Payment successful!');
          
        return back();
    }
}
```


```:resources/views/stripeForm.blade.php
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 - Stripe Payment Gateway Integration Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
</head>
<body>
  
<div class="container">
  
    <h1>Laravel 5 - Stripe Payment Gateway Integration Example <br/> ItSolutionStuff.com</h1>
  
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
  
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form">
                        @csrf
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
  
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                            </div>
                        </div>
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
      
</div>
  
</body>
  
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  
  });
  
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
</script>
</html>
```

# デザイン




```
#bootstrap-sassを消す
npm uninstall --save bootstrap-sass
# bootstrap-sassを消してbootstrapとpopper.jsを入れる
npm install --save bootstrap
npm install --save popper.j
```


```:resource/asset/js/bootstrap.js
try {
    window.$ = window.jQuery = require('jquery');

    // require('bootstrap-sass');
    require('bootstrap');
} catch (e) {}
```

```:resources/assets/sass/app.scss
// Bootstrap
// @import "~bootstrap-sass/assets/stylesheets/bootstrap";
@import "~bootstrap/scss/bootstrap";
```

```:resources/assets/sass/_variables.scss
// Typography
$icon-font-path: "~bootstrap-sass/assets/fonts/bootstrap/";
$font-family-sans-serif: "Raleway", sans-serif;
// $font-size-base: 14px;
$font-size-base: 1rem;
$line-height-base: 1.6;
$text-color: #636b6f;
```




```
php artisan make:controller BootstrapController
```


# 検索

```
php artisan make:migration create_shops_table
php artisan migrate
php artisan make:seeder ShopsTableSeeder
php artisan db:seed --class=ShopsTableSeeder
```


php artisan make:controller SearchController

# elastic search

参考
https://madewithlove.be/how-to-integrate-elasticsearch-in-your-laravel-app-2019-edition/


composer require elasticsearch/elasticsearch:7.1
//composer require laravel/ui
//php artisan ui:auth

mはモデル作成、fはファクトリー作成。
php artisan make:model -mf Article

```:create_articles_table.php
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('body');
            $table->json('tags');
            $table->timestamps();
        });
    }
}
```


```:Article.php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $casts = [
        'tags' => 'json',
    ];
}
```


```
php artisan make:seeder ArticlesTableSeeder
```

```
<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->truncate();
        factory(App\Article::class)->times(50)->create();
    }
}
```


```:database/seeds/DatabaseSeeder.php
public function run()
{
    $this->call(ArticlesTableSeeder::class);
}
```



# 参考

簡易
https://hikopro.com/laravel-stripe/

簡易フォーム
https://www.itsolutionstuff.com/post/laravel-57-stripe-payment-gateway-integration-exampleexample.html

B