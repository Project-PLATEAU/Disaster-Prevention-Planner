<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_community_toppage.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_community_toppage.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_community_toppage.css') }}" />
  </head>
  <body>
    <div class="screen">
      <div class="overlap-group-wrapper">
        <div class="overlap-group">
          <img class="vector" src="{{ asset ('/img/vector.svg') }}" />
          <img class="img" src="{{ asset ('/img/vector-1.svg') }}" />
          <img class="vector-2" src="{{ asset ('/img/vector-2.svg') }}" />
          <img class="vector-3" src="{{ asset ('/img/vector-3.svg') }}" />
          <div class="frame">
            <div class="div">
              <div class="global-header-front">
                <div class="frame-2">
                  <div class="text"><div class="text-wrapper">地区防災計画作成支援システム 自治会</div></div>
                </div>
                <div class="buttons">
                  <button class="button" onclick="location.href='{{route('logout')}}';">
                    <div class="icon-wrapper">ログアウト</div>
                  </button>
                </div>
              </div>
              <div class="frame-3">
                <div class="frame-4"><div class="text-2">トップページ</div></div>
                <div class="frame-5">
                  <div class="frame-6">
                    <img class="img-2" src="{{ asset ('/img/frame.svg') }}" />
                    <div class="text-3">地区防災</div>
                  </div>
                  <div class="frame-5">
                    <div class="frame-7">
                      <button class="stats-card" onclick="location.href='{{ route('org.areachar.index') }}'">
                        <img class="element" src="{{ asset ('/img/1467.png') }}" />
                        <div class="content">
                          <div class="text-4">
                            <div class="description-top">地区特性</div>
                            <div class="description-top-2">土砂災害などの地区の災害に関する情報を登録する</div>
                          </div>
                        </div>
                      </button>
                      <button class="stats-card"  onclick="location.href='{{ route('org.stock.warehouse') }}'">
                        <img class="element" src="{{ asset ('/img/1415.png') }}" />
                        <div class="content">
                          <div class="text-4">
                            <div class="description-top">地区情報</div>
                            <div class="description-top-2">地区の防災に関する情報を確認・編集する</div>
                          </div>
                        </div>
                      </button>
                    </div>
                    <div class="frame-7">
                      <button class="stats-card"  onclick="location.href='{{ route('org.training.index') }}'">
                        <img class="element" src="{{ asset ('/img/436.png') }}" />
                        <div class="content">
                          <div class="text-4">
                            <div class="description-top">災害図上訓練コンテンツ</div>
                            <div class="description-top-2">マップで災害情報を確認する</div>
                          </div>
                        </div>
                      </button>
                      <button class="stats-card"  onclick="location.href='{{ route('org.dpp.index') }}'">
                        <img class="element" src="{{ asset ('/img/742.png') }}" />
                        <div class="content">
                          <div class="text-4">
                            <div class="description-top">地区防災計画</div>
                            <div class="description-top-2">地区防災計画の一覧を表示</div>
                          </div>
                        </div>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="frame-5">
                  <div class="frame-6">
                    <img class="img-2" src="{{ asset ('/img/frame-1.svg') }}" />
                    <div class="text-3">設定</div>
                  </div>
                  <div class="frame-7">
                    <button class="stats-card-2"  onclick="location.href='{{ route('org.master.supply1') }}'">
                      <img class="element-2" src="{{ asset ('/img/701.png') }}" />
                      <div class="content">
                        <div class="text-4">
                          <div class="description-top">マスタ情報</div>
                          <div class="description-top-2">物資と技能資格のリスト設定</div>
                        </div>
                      </div>
                    </button>
                    <div class="stats-card-3"></div>
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
