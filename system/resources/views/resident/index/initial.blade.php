<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{asset('/css/globals_introduction.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/styleguide_introduction.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/style_introduction.css')}}" />
  </head>
  <body>
    <div class="screen">
      <div class="overlap-group-wrapper">
        <div class="overlap-group">
          <img class="vector" src="{{asset('/img/vector.svg')}}" />
          <img class="img" src="{{asset('/img/vector-1.svg')}}" />
          <img class="vector-2" src="{{asset('/img/vector-2.svg')}}" />
          <img class="vector-3" src="{{asset('/img/vector-3.svg')}}" />
          <div class="frame">
            <div class="div">
              <div class="global-header-front">
                <div class="frame-2">
                  <div class="text"><div class="text-wrapper">地区防災計画作成支援システム 個別避難計画作成</div></div>
                </div>
              </div>
              <div class="frame-wrapper">
                <div class="frame-3">
                  <div class="frame-4">
                    <p class="p">
                      <span class="span">みんな</span>
                      <span class="text-wrapper-2">でつくる、わたしの街の</span>
                      <span class="span">防災計画</span>
                    </p>
                    <div class="text-2">災害時の対応を、防災計画を作成して確実に</div>
                    <div class="text-3">
                      住民一人ひとりが、自分に合わせた防災アクションを計画できる「マイタイムライン」を作成することで、避難時要支援者のサポートを含めた、安心・安全な避難行動を実現します。<br />みなさんで協力して、災害に強い地区を築きましょう。
                    </div>
                  </div>
                  <div class="frame-5">
                    <div class="frame-6">
                      <img class="element" src="{{asset('/img/1470.png')}}" />
                      <div class="content">
                        <div class="title-category">
                          <div class="title-2">地区とあなたの家の災害リスクを知ります</div>
                        </div>
                      </div>
                    </div>
                    <div class="frame-6">
                      <img class="element" src="{{asset('/img/1623.png')}}" />
                      <div class="content">
                        <div class="title-category">
                          <div class="title-2">家族みんなの避難行動計画をつくります</div>
                        </div>
                      </div>
                    </div>
                    <div class="frame-6">
                      <img class="element" src="{{asset('/img/1628.png')}}" />
                      <div class="content">
                        <div class="title-category">
                          <div class="title-2">地区の防災力を高めるための計画をたてます</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="frame-7">
                    <button class="div-wrapper" onclick="location.href='{{route('resident.index.index')}}';"><div class="text-4">トップページ</div></button>
                    <button class="button-2" onclick="location.href='{{route('resident.resident.index')}}';"><div class="text-5">マイタイムライン作成開始</div></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="footer-wrapper">
              <footer class="footer"><div class="text-wrapper-3">PLATEAU by MLIT</div></footer>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
