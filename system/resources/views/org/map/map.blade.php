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
                  <div class="text"><div class="text-wrapper"><a class="back-link" href="{{route('org.index.index')}}">さぬき市自治会</a></div></div>
                </div>
                <div class="buttons">
                  <button class="button" onclick="location.href='{{route('logout')}}';">
                    <div class="icon-wrapper">ログアウト</div>
                  </button>
                </div>
              </div>
              <div class="frame-3">
                <div class="frame-4"><div class="text-2"><a href="{{route('org.map.index')}}"><img class="arrow-left" src="{{asset('/img/arrowleft-2.svg')}}" /></a> 地図画像用</div></div>
                <div class="frame-5">
                    <form method="post" action="{{route('org.map.exec')}}" style="width: 100%;">
                    @csrf
                    <input type="submit" value="保存" />
                    <iframe width="100%" height="800px" src="{{$url}}?type={{$type}}" frameBorder="0"></iframe>
                    <input type="hidden" name="image" id="image" value="" />
                    <input type="hidden" name="type" value="{{$type}}" />
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
    <script src="{{asset('/js/vendor/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('/js/org_map.js')}}"></script>
  </body>
</html>
