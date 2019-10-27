@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h2>
            bootstrap - グリッド
        </h2>
        <div class="col-md-8 col-md-offset-2">
            
        </div>

    </div>
    
    <hr class="my-4">

    <pre>
        .bs-example  div[class^="col"] {
          border: 1px solid white;
          background: #f5f5f5;
          text-align: center;
          padding-top: 8px;
          padding-bottom: 8px;
        }
    </pre>
    グリッドシステムには何種類かある。

    Small：smはコンテナサイズが540pxで切り替わる。
    Medium：mbは720pxで切り替わる。
    Large：lgは960pxで切り替わる。

    ここは参考になりそう。
    http://websae.net/twitter-bootstrap-grid-system-21060224/
    <b>colは合わせて12になること。</b>


    <div class="bs-example">
        
        <h2>の場合</h2>
        <pre class="source">
            &lt;div class=&quot;row&quot;&gt;
                &lt;div class=&quot;col-sm&quot;&gt;
                  One of three columns
                &lt;/div&gt;
                &lt;div class=&quot;col-sm&quot;&gt;
                  One of three columns
                &lt;/div&gt;
                &lt;div class=&quot;col-sm&quot;&gt;
                  One of three columns
                &lt;/div&gt;
            &lt;/div&gt;
        </pre>
        <div class="row">
            <div class="col-sm">
              One of three columns
            </div>
            <div class="col-sm">
              One of three columns
            </div>
            <div class="col-sm">
              One of three columns
            </div>
        </div>
        <hr class="my-4">

        <h2>の場合</h2>
        <pre class="source">
        </pre>
        <div class="row">
        </div>
        <hr class="my-4">

        <h2>smの場合</h2>
        <pre class="source">
            &lt;div class=&quot;row&quot;&gt;
                  &lt;div class=&quot;col-sm-4&quot;&gt;.col-sm-4&lt;/div&gt;
                  &lt;div class=&quot;col-sm-4&quot;&gt;.col-sm-4&lt;/div&gt;
                  &lt;div class=&quot;col-sm-4&quot;&gt;.col-sm-4&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-sm-12&quot;&gt;.col-sm-12&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-sm-6&quot;&gt;.col-sm-6&lt;/div&gt;
              &lt;div class=&quot;col-sm-6&quot;&gt;.col-sm-6&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-sm-5&quot;&gt;.col-sm-5&lt;/div&gt;
              &lt;div class=&quot;col-sm-7&quot;&gt;.col-sm-7&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-sm-2&quot;&gt;.col-sm-2&lt;/div&gt;
              &lt;div class=&quot;col-sm-2&quot;&gt;.col-sm-2&lt;/div&gt;
              &lt;div class=&quot;col-sm-4&quot;&gt;.col-sm-4&lt;/div&gt;
              12にならないと余る。
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-sm-7&quot;&gt;.col-sm-2&lt;/div&gt;
              &lt;div class=&quot;col-sm-4&quot;&gt;.col-sm-2&lt;/div&gt;
              &lt;div class=&quot;col-sm-4&quot;&gt;.col-sm-4&lt;/div&gt;
              12を超えると改行される。
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
              &lt;div class=&quot;col-sm-1&quot;&gt;.col-sm-1&lt;/div&gt;
            &lt;/div&gt;
        </pre>

        <div class="row">
              <div class="col-sm-4">.col-sm-4</div>
              <div class="col-sm-4">.col-sm-4</div>
              <div class="col-sm-4">.col-sm-4</div>
        </div>
        <div class="row">
          <div class="col-sm-12">.col-sm-12</div>
        </div>
        <div class="row">
          <div class="col-sm-6">.col-sm-6</div>
          <div class="col-sm-6">.col-sm-6</div>
        </div>
        <div class="row">
          <div class="col-sm-5">.col-sm-5</div>
          <div class="col-sm-7">.col-sm-7</div>
        </div>
        <div class="row">
          <div class="col-sm-2">.col-sm-2</div>
          <div class="col-sm-2">.col-sm-2</div>
          <div class="col-sm-4">.col-sm-4</div>
          12にならないと余る。
        </div>
        <div class="row">
          <div class="col-sm-7">.col-sm-2</div>
          <div class="col-sm-4">.col-sm-2</div>
          <div class="col-sm-4">.col-sm-4</div>
          12を超えると改行される。
        </div>
        <div class="row">
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
          <div class="col-sm-1">.col-sm-1</div>
        </div>
        <hr class="my-4">

        <h2>mbの場合</h2>

        <pre class="source">
            &lt;div class=&quot;row&quot;&gt;
                  &lt;div class=&quot;col-md-4&quot;&gt;.col-md-4&lt;/div&gt;
                  &lt;div class=&quot;col-md-4&quot;&gt;.col-md-4&lt;/div&gt;
                  &lt;div class=&quot;col-md-4&quot;&gt;.col-md-4&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-md-12&quot;&gt;.col-md-12&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-md-6&quot;&gt;.col-md-6&lt;/div&gt;
              &lt;div class=&quot;col-md-6&quot;&gt;.col-md-6&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-md-5&quot;&gt;.col-md-5&lt;/div&gt;
              &lt;div class=&quot;col-md-7&quot;&gt;.col-md-7&lt;/div&gt;
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-md-2&quot;&gt;.col-md-2&lt;/div&gt;
              &lt;div class=&quot;col-md-2&quot;&gt;.col-md-2&lt;/div&gt;
              &lt;div class=&quot;col-md-4&quot;&gt;.col-md-4&lt;/div&gt;
              12にならないと余る。
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-md-7&quot;&gt;.col-md-2&lt;/div&gt;
              &lt;div class=&quot;col-md-4&quot;&gt;.col-md-2&lt;/div&gt;
              &lt;div class=&quot;col-md-4&quot;&gt;.col-md-4&lt;/div&gt;
              12を超えると改行される。
            &lt;/div&gt;
            &lt;div class=&quot;row&quot;&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
              &lt;div class=&quot;col-md-1&quot;&gt;.col-md-1&lt;/div&gt;
            &lt;/div&gt;
        </pre>

        <div class="row">
              <div class="col-md-4">.col-md-4</div>
              <div class="col-md-4">.col-md-4</div>
              <div class="col-md-4">.col-md-4</div>
        </div>
        <div class="row">
          <div class="col-md-12">.col-md-12</div>
        </div>
        <div class="row">
          <div class="col-md-6">.col-md-6</div>
          <div class="col-md-6">.col-md-6</div>
        </div>
        <div class="row">
          <div class="col-md-5">.col-md-5</div>
          <div class="col-md-7">.col-md-7</div>
        </div>
        <div class="row">
          <div class="col-md-2">.col-md-2</div>
          <div class="col-md-2">.col-md-2</div>
          <div class="col-md-4">.col-md-4</div>
          12にならないと余る。
        </div>
        <div class="row">
          <div class="col-md-7">.col-md-2</div>
          <div class="col-md-4">.col-md-2</div>
          <div class="col-md-4">.col-md-4</div>
          12を超えると改行される。
        </div>
        <div class="row">
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
          <div class="col-md-1">.col-md-1</div>
        </div>
        <hr class="my-4">

</div>
@endsection
