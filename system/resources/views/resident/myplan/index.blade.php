<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_evacuation-registration.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_myplan.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_myplan.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" />
  </head>
  <body>
    <div class="screen">
      <div class="overlap-group-wrapper">
        <div class="overlap-group">
          <div class="frame">
            <div class="div">
              <div class="global-header-front">
                <div class="frame-2">
                  <div class="text"><div class="text-wrapper"><a href="{{route('resident.index.index')}}">地区防災計画作成支援システム 個別避難計画作成</a></div></div>
                </div>
              </div>
              <div class="frame-3">
                <div class="steps">
                  <div class="item">
                    <div class="number-wrapper"><a class="link" href="{{route('resident.resident.index')}}"><img class="check" src="{{ asset ('/img/check-3.svg') }}" /></a></div>
                    <div class="title-2"><a class="link" href="{{route('resident.resident.index')}}">住民情報</a></div>
                    <img class="tail-2" src="{{ asset ('/img/tail-3.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="number-wrapper"><a class="link" href="{{route('resident.risk.index')}}"><img class="check" src="{{ asset ('/img/check-3.svg') }}" /></a></div>
                    <div class="title-2"><a class="link" href="{{route('resident.risk.index')}}">リスク情報確認</a></div>
                    <img class="tail-2" src="{{ asset ('/img/tail-7.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="number-wrapper"><a class="link" href="{{route('resident.evacuation.index')}}"><img class="check" src="{{ asset ('/img/check-3.svg') }}" /></a></div>
                    <div class="title-2"><a class="link" href="{{route('resident.evacuation.index')}}">避難情報</a></div>
                    <img class="tail-2" src="{{ asset ('/img/tail-4.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="number-wrapper"><a class="link" href="{{route('resident.route.index')}}"><img class="check" src="{{ asset ('/img/check-3.svg') }}" /></a></div>
                    <div class="title-2"><a class="link" href="{{route('resident.route.index')}}">避難ルート検索</a></div>
                    <img class="tail-2" src="{{ asset ('/img/tail-7.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="number-wrapper"><a class="link" href="{{route('resident.timeline.index')}}"><img class="check" src="{{ asset ('/img/check-3.svg') }}" /></a></div>
                    <div class="title-2"><a class="link" href="{{route('resident.timeline.index')}}">避難のタイミング</a></div>
                    <img class="tail-2" src="{{ asset ('/img/tail-5.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="number-wrapper"><a class="link" href="{{route('resident.carry.index')}}"><img class="check" src="{{ asset ('/img/check-3.svg') }}" /></a></div>
                    <div class="title-2"><a class="link" href="{{route('resident.carry.index')}}">非常持出</a></div>
                    <img class="tail-2" src="{{ asset ('/img/tail-8.svg') }}" />
                  </div>
                  <div class="item-3">
                    <div class="number-wrapper"><img class="check" src="{{ asset ('/img/check-3.svg') }}"/></div>
                    <div class="title-2">完了</div>
                  </div>
                </div>
                <div class="frame-4">
                  <div class="frame-5"><div class="main-headline">個別避難計画</div></div>
                  <div class="frame-wrapper">
                    <div class="button-wrapper">
                        <button class="div-wrapper" onclick="location.href='{{route('resident.myplan.exec')}}';"><div class="text-3">今のデータで作成</div></button>
                      </div>
                    <div class="div-2" style="width: 100%;">
                      <table id="myplan_table" class="display" style="width: 100%;">
                        <thead>
                          <tr>
                            <th style="text-align: left;">作成日時</th>
                            <th>操作</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                          <tr>
                            <td style="text-align: left;">{{$item->updated_at}}</td>
                            <td>
                              <a class="link-button" target="_blank" href="{{route('resident.myplan.download2', ['id' => $item->id])}}">ダウンロード(PDF)</a>
                              <a class="link-button" target="_blank" href="{{route('resident.myplan.download', ['id' => $item->id])}}">ダウンロード(Excel)</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
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
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{ asset ('/js/resident_myplan.js') }}"></script>
  </body>
</html>
