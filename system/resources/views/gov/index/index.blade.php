<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_administration_planning_management.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_administration_planning_management.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_administration_planning_management.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/dataTable.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" />
  </head>
  <body>
    <div class="screen">
      <div class="div">
        <div class="frame">
          <div class="frame-2">
            <div class="global-header-front">
              <div class="frame-3">
                <div class="text"><div class="text-wrapper"><a class="back-link" href="{{ route('gov.index.index') }}">地区防災計画作成支援システム 行政</a></div></div>
              </div>
              <div class="buttons">
                <button class="button" onclick="location.href='{{route('logout')}}';">
                  <div class="icon-wrapper">ログアウト</div>
                </button>
              </div>
            </div>
            <div class="frame-wrapper">
              <div class="frame-4">
                <div class="heading-left">
                  <div class="layout-blocks">
                    <div class="wrapper-wrapper">
                      <div class="div-2"><div class="title-2">地区防災計画管理</div></div>
                    </div>
                    <div class="heading-extra">
                      <button class="div-wrapper" onclick="location.href='{{ route('gov.index.map') }}'"><div class="text-2">作成状況を地図で確認</div></button>
                    </div>
                  </div>
                </div>
                <div class="data-frame">
                  <div class="data-frame-div">
                    <div class="create-button">
                    </div>
                    <table id="dataTable" style="width: 1300px;">
                      <thead>
                        <tr>
                          <th>地区名</th>
                          <th>最終作成日</th>
                          <th>操作</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <td>大川町南川地区</td>
                          <td>{{$item->created_date}}</td>
                          <td>
                            <a class="link-button" target="_blank" href="{{route('gov.index.download', ['id' => $item->id])}}">ダウンロード</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-wrapper">
            <footer class="footer"><div class="text-wrapper-5">PLATEAU by MLIT</div></footer>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset ('/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{ asset ('/js/gov_default.js') }}"></script>
  </body>
</html>
