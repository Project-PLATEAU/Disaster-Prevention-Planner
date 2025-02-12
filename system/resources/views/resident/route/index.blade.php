<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_evacuation-route-search.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_evacuation-route-search.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_evacuation-route-search.css') }}" />
  </head>
  <body>
    <div class="screen">
      <div class="overlap-group-wrapper">
        <div class="overlap-group">
          <div class="frame">
            <div class="div">
              <div class="global-header-front">
                <div class="frame-2">
                  <img class="image" src="{{ asset ('/img/image-34.png') }}" />
                  <div class="text"><div class="text-wrapper"><a href="{{route('resident.index.index')}}">地区防災計画作成支援システム 個別避難計画作成</a></div></div>
                </div>
              </div>
              <div class="frame-3">
                <div class="steps">
                  <div class="item">
                    <div class="steps-item-icon"><a href="{{route('resident.resident.index')}}"><img class="check" src="{{ asset ('/img/check-3.svg') }}" /></div>
                    <div class="title-2">住民情報</div></a>
                    <img class="tail-2" src="{{ asset ('/img/tail-4.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="steps-item-icon"><a href="{{route('resident.risk.index')}}"><img class="check" src="{{ asset ('/img/check-4.svg') }}" /></div>
                    <div class="title-2">リスク情報確認</div></a>
                    <img class="tail-2" src="{{ asset ('/img/tail-5.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="steps-item-icon"><a href="{{route('resident.evacuation.index')}}"><img class="check" src="{{ asset ('/img/check-6.svg') }}" /></div>
                    <div class="title-2">避難情報</div></a>
                    <img class="tail-2" src="{{ asset ('/img/tail-6.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="components-steps"><div class="number">4</div></div>
                    <div class="title-2">避難ルート検索</div>
                    <img class="tail-2" src="{{ asset ('/img/tail-7.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="number-wrapper"><div class="number-2">5</div></div>
                    <div class="title-3">避難のタイミング</div>
                    <img class="tail-2" src="{{ asset ('/img/tail-8.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="number-wrapper"><div class="number-2">6</div></div>
                    <div class="title-3">非常持出</div>
                    <img class="tail-2" src="{{ asset ('/img/tail-9.svg') }}" />
                  </div>
                  <div class="item-3">
                    <div class="number-wrapper"><div class="number-2">7</div></div>
                    <div class="title-3">完了</div>
                  </div>
                </div>
                <div class="frame-4">
                  <div class="frame-5"><div class="main-headline">避難ルート検索（水害）</div></div>
                  <div class="message-area2">ご自宅の災害リスクが分かり易い画面で下記「スクリーンショット」ボタンを押してください。「個別避難行動計画」に画像が反映されます。</div>
                  <div class="message-area" id="message-area"></div>
                  <iframe src="{{$url}}?token={{$user->user_id}}" width="100%" height="600px"></iframe>
                  <form id="resident_form" method="post" action="{{route('resident.route.exec')}}" style="width: 100%;">
                  @csrf
                  <input type="hidden" id="image" name="image" value="" />
                  <inptu type="hidden" id="departure" name="departure" value="" />
                  <input type="hidden" id="stopoever" name="stopover" value="" />
                  <input type="hidden" id="destination" name="destination" value="" />
                  <div class="button-wrapper">
                    <button class="div-wrapper"><div class="text-2">次へ</div></button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="footer-wrapper">
              <footer class="footer"><div class="text-wrapper-2">PLATEAU by MLIT</div></footer>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset ('/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset ('/js/resident_route.js') }}"></script>
  </body>
</html>
