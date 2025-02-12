<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{asset('/css/globals_community_toppage.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/styleguide_community_toppage.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/style_community_toppage.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/dataTable.css')}}" />
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
                  <div class="text"><div class="text-wrapper"><a class="back-link" href="{{route('org.index.index')}}">地区防災計画作成支援システム 自治会</a></div></div>
                </div>
                <div class="buttons">
                  <button class="button" onclick="location.href='{{route('logout')}}';">
                    <div class="icon-wrapper">ログアウト</div>
                  </button>
                </div>
              </div>
              <div class="frame-3">
                <div class="frame-4"><div class="text-2"><a href="{{route('org.index.index')}}"><img class="arrow-left" src="{{asset('/img/arrowleft-2.svg')}}" /></a>地図画像用</div></div>
                <div class="frame-5">
                    <div>
                      <a href="{{route('org.map.map', ['type' => 1])}}" >倉庫地図</a><br />
                      <a href="{{route('org.map.map', ['type' => 2])}}" >地区一次避難場所</a><br />
                      <a href="{{route('org.map.map', ['type' => 3])}}" >緊急連絡先</a><br />
                      <a href="{{route('org.map.map', ['type' => 4])}}" >地区特有の情報</a><br />
                      <a href="{{route('org.map.map', ['type' => 5])}}" >自治会館</a><br />
                    </div>
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
  </body>
</html>
