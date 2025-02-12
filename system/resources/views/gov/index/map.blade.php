<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_administration_planning_management.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_administration_planning_management.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_administration_planning_management.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/dataTable.css') }}" />
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
            </div>
            <div class="frame-wrapper">
              <div class="frame-4">
                <div class="heading-left">
                  <div class="layout-blocks">
                    <div class="wrapper-wrapper">
                      <div class="div-2">
                        <div class="title-2">
                            <a href="{{route('gov.index.index')}}"><img class="arrow-left" src="{{asset('/img/arrowleft-2.svg')}}"/></a>
                            地区防災計画管理
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="frame-5">
                  <iframe src="{{$url}}" width="100%" height="600px"></iframe>
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
  </body>
</html>
