<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_toppage.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_toppage.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_toppage.css') }}" />
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
                  <div class="text"><div class="text-wrapper">地区防災計画作成支援システム 個別避難計画作成</div></div>
                </div>
                <div class="buttons">
                  <button class="button" onclick="location.href='{{ route('logout') }}';">
                    <div class="icon-wrapper">ログアウト</div>
                  </button>
                </div>
              </div>
              <div class="frame-wrapper">
                <div class="frame-3">
                  <div class="frame-4"><div class="text-2">トップページ</div></div>
                  <div class="frame-5">
                    <div class="frame-6">
                      <img class="img-2" src="{{ asset ('/img/frame.svg') }}" />
                      <div class="text-3">個別避難計画</div>
                    </div>
                    <div class="frame-5">
                      <div class="frame-7">
                        <button class="stats-card" onclick="location.href='{{ route('resident.resident.index') }}';">
                          <img class="element" src="{{ asset ('/img/488.png') }}" />
                          <div class="content">
                            <div class="text-4">
                              <div class="description-top">1.住民情報</div>
                              <div class="description-top-3">住所・住民情報・家族情報・緊急連絡先の入力</div>
                            </div>
                          </div>
                        </button>
                        <button class="stats-card" onclick="location.href='{{ route('resident.risk.index') }}';">
                          <img class="element" src="{{ asset ('/img/1471.png') }}" />
                          <div class="content">
                            <div class="text-4">
                              <div class="description-top">2.リスク情報確認</div>
                              <div class="description-top-3">自宅周辺のリスク情報を地図で確認</div>
                            </div>
                          </div>
                        </button>
                      </div>
                      <div class="frame-7">
                        <button class="stats-card" onclick="location.href='{{ route('resident.evacuation.index') }}';">
                          <img class="element" src="{{ asset ('/img/1117.png') }}" />
                          <div class="content">
                            <div class="text-4">
                              <div class="description-top">3.避難情報</div>
                              <div class="description-top-3">避難場所を決めましょう</div>
                            </div>
                          </div>
                        </button>
                        <button class="stats-card" onclick="location.href='{{ route('resident.route.index') }}';">
                          <img class="element" src="{{ asset ('/img/701.png') }}" />
                          <div class="content">
                            <div class="text-4">
                              <div class="description-top">4.避難ルート検索</div>
                              <div class="description-top-3">自宅から避難場所へのルートを検索</div>
                            </div>
                          </div>
                        </button>
                      </div>
                      <div class="frame-7">
                        <button class="stats-card" onclick="location.href='{{ route('resident.timeline.index') }}';">
                          <img class="element" src="{{ asset ('/img/451.png') }}" />
                          <div class="content">
                            <div class="text-4">
                              <div class="description-top">5.避難のタイミング</div>
                              <div class="description-top-3">避難のタイミングを確認ましょう</div>
                            </div>
                          </div>
                        </button>
                        <button class="stats-card" onclick="location.href='{{ route('resident.carry.index') }}';">
                          <img class="element" src="{{ asset ('/img/1109.png') }}" />
                          <div class="content">
                            <div class="text-4">
                              <div class="description-top">6.非常持出</div>
                              <div class="description-top-3">非常持出リストをチェック</div>
                            </div>
                          </div>
                        </button>
                      </div>
                      <div class="frame-7">
                        <button class="stats-card" onclick="location.href='{{ route('resident.myplan.index') }}';">
                          <img class="element" src="{{ asset ('/img/1624.png') }}" />
                          <div class="content">
                            <div class="text-4">
                              <div class="description-top">7.個別避難計画</div>
                              <div class="description-top-3">個別避難計画の確認・ダウンロード</div>
                            </div>
                          </div>
                        </button>
                        <div class="stats-card-2"></div>
                      </div>
                    </div>
                  </div>
                  <div class="frame-5">
                    <div class="frame-6">
                      <img class="img-2" src="{{ asset ('/img/frame-1.svg') }}" />
                      <div class="text-3">ツール</div>
                    </div>
                    <div class="frame-7">
                      <button class="stats-card" onclick="location.href='{{ route('resident.report.index') }}';">
                        <img class="element-2" src="{{ asset ('/img/1463-1.png') }}" />
                        <div class="content">
                          <div class="text-4">
                            <div class="description-top">リスク情報登録</div>
                            <div class="description-top-3">発見したリスク情報を報告する</div>
                          </div>
                        </div>
                      </button>
                      <div class="stats-card-2"></div>
                    </div>
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
