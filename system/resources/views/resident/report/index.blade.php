<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_evacuation-registration.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_myplan.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_myplan.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/dataTable.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="{{ asset ('/css/vendor/jquery-ui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/vendor/jquery-ui.structure.min.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/vendor/jquery-ui.theme.min.css') }}" />
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
                <div class="frame-4">
                  <div class="frame-5"><div class="main-headline">リスク情報</div></div>
                  <div class="message-area">
                    @if (session('message'))
                    {{ session('message') }}
                    @endif
                  </div>
                  <div class="button-wrapper">
                    <button class="div-wrapper" onclick="location.href='{{route('resident.report.create')}}';"><div class="text-3">作成</div></button>
                  </div>
                  <div class="frame-wrapper">
                    <div class="div-2" style="width: 100%;">
                      <table id="myplan_table" class="display" style="width: 100%;">
                        <thead>
                          <tr>
                            <th>タイトル</th>
                            <th>時期</th>
                            <th>種別</th>
                            <th>操作</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                          <tr>
                            <td>{{$item->title}}</td>
                            <td>
                              @if ($item->time == 1)
                              現在のリスク
                              @else
                              過去の災害
                              @endif
                            </td>
                            <td>
                              @if ($item->type == 1)
                              河川氾濫
                              @elseif ($item->type == 2)
                              土砂災害
                              @elseif ($item->type == 3)
                              道路
                              @elseif ($item->type == 4)
                              建物
                              @elseif ($item->type == 5)
                              その他
                              @endif
                            </td>
                            <td>
                              <form method="post" action="{{route('resident.report.create')}}" style="display: inline;">@csrf<button class="link-button" onClick="">編集</button><input type="hidden" name="id" value="{{$item->id}}" /></form>
                              <button class="link-button" onClick="deleteReport({{$item->id}})">削除</button>
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
        <div id="base-dialog" style="display: none;"></div>
        <div id="alert-dialog" style="display: none;"></div>
      </div>
    </div>
    <script src="{{ asset ('/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset ('/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{ asset ('/js/resident_myplan.js') }}"></script>
  </body>
</html>
