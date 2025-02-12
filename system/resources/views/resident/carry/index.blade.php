<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_emergency-item.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_emergency-item.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_emergency-item.css') }}" />
  </head>
  <body>
    <div class="screen">
      <div class="overlap-group-wrapper">
        <div class="overlap-group">
          <div class="frame">
            <form class="div" method="post" action="{{route('resident.carry.exec')}}">
            @csrf
              <div class="global-header-front">
                <div class="frame-2">
                  <img class="image" src="{{ asset ('/img/image-34.png') }}" />
                  <div class="text"><div class="text-wrapper"><a href="{{route('resident.index.index')}}">地区防災計画作成支援システム 個別避難計画作成</a></div></div>
                </div>
              </div>
              <div class="frame-3">
                <div class="steps">
                  <div class="item">
                    <div class="steps-item-icon"><a href="{{route('resident.resident.index')}}"><img class="check" src="{{ asset ('/img/check-10.svg') }}" /></div>
                    <div class="title-2">住民情報</div></a>
                    <img class="tail-2" src="{{ asset ('/img/tail-2.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="steps-item-icon"><a href="{{route('resident.risk.index')}}"><img class="check" src="{{ asset ('/img/check-11.svg') }}" /></div>
                    <div class="title-2">リスク情報確認</div></a>
                    <img class="tail-2" src="{{ asset ('/img/tail-3.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="steps-item-icon"><a href="{{route('resident.evacuation.index')}}"><img class="check" src="{{ asset ('/img/check-14.svg') }}" /></div>
                    <div class="title-2">避難情報</div></a>
                    <img class="tail-2" src="{{ asset ('/img/tail-4.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="steps-item-icon"><a href="{{route('resident.route.index')}}><img class="check" src="{{ asset ('/img/check-14.svg') }}" /></div>
                    <div class="title-2">避難ルート検索</div></a>
                    <img class="tail-2" src="{{ asset ('/img/tail-6.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="steps-item-icon"><a href="{{route('resident.timeline.index')}}"><img class="check" src="{{ asset ('/img/check-14.svg') }}" /></div>
                    <div class="title-2">避難のタイミング</div></a>
                    <img class="tail-2" src="{{ asset ('/img/tail-6.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="components-steps"><div class="number">6</div></div>
                    <div class="title-2">非常持出</div>
                    <img class="tail-2" src="{{ asset ('/img/tail-7.svg') }}" />
                  </div>
                  <div class="item-3">
                    <div class="number-wrapper"><div class="number-2">7</div></div>
                    <div class="title-3">完了</div>
                  </div>
                </div>
                <div class="frame-4">
                  <div class="frame-5"><div class="main-headline">非常持出</div></div>
                  <div class="frame-6">
                    <div class="main-headline-2">非常持出リスト</div>
                    <div class="frame-6">
                      <div class="frame-7">
                        <div class="frame-8">
                          <div class="main-headline-3">食料と飲料水</div>
                          <div class="checkbox-group">
                            @foreach ($data[1] as $item)
                            <div class="checkbox">
                              <label><input class="checkbox-input" type="checkbox" name="item[]" value="{{$item['id']}}" @if ($item['check'] == 1)checked="checked"@endif></input>
                              {{$item['name']}}</label>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        <div class="frame-8">
                          <div class="main-headline-3">医薬品と救急セット</div>
                          <div class="checkbox-group">
                            @foreach ($data[2] as $item)
                            <div class="checkbox">
                              <label><input class="checkbox-input" type="checkbox" name="item[]" value="{{$item['id']}}" @if ($item['check'] == 1)checked="checked"@endif></input>
                              {{$item['name']}}</label>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        <div class="frame-8">
                          <div class="main-headline-3">衛生用品</div>
                          <div class="checkbox-group-2">
                            @foreach ($data[3] as $item)
                            <div class="checkbox">
                              <label><input class="checkbox-input" type="checkbox" name="item[]" value="{{$item['id']}}" @if ($item['check'] == 1)checked="checked"@endif></input>
                              {{$item['name']}}</label>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        <div class="frame-8">
                          <div class="main-headline-3">衣類と防寒具</div>
                          <div class="checkbox-group">
                            @foreach ($data[4] as $item)
                            <div class="checkbox">
                              <label><input class="checkbox-input" type="checkbox" name="item[]" value="{{$item['id']}}" @if ($item['check'] == 1)checked="checked"@endif></input>
                              {{$item['name']}}</label>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                      <div class="frame-7">
                        <div class="frame-8">
                          <div class="main-headline-3">通信・照明手段</div>
                          <div class="checkbox-group">
                            @foreach ($data[5] as $item)
                            <div class="checkbox">
                              <label><input class="checkbox-input" type="checkbox" name="item[]" value="{{$item['id']}}" @if ($item['check'] == 1)checked="checked"@endif></input>
                              {{$item['name']}}</label>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        <div class="frame-8">
                          <div class="main-headline-3">書類</div>
                          <div class="checkbox-group">
                            @foreach ($data[6] as $item)
                            <div class="checkbox">
                              <label><input class="checkbox-input" type="checkbox" name="item[]" value="{{$item['id']}}" @if ($item['check'] == 1)checked="checked"@endif></input>
                              {{$item['name']}}</label>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        <div class="frame-8">
                          <div class="main-headline-3">お金</div>
                          <div class="checkbox-group">
                            @foreach ($data[7] as $item)
                            <div class="checkbox">
                              <label><input class="checkbox-input" type="checkbox" name="item[]" value="{{$item['id']}}" @if ($item['check'] == 1)checked="checked"@endif></input>
                              {{$item['name']}}</label>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        <div class="frame-8">
                          <div class="main-headline-3">その他</div>
                          <div class="checkbox-group">
                            @foreach ($data[8] as $item)
                            <div class="checkbox">
                              <label><input class="checkbox-input" type="checkbox" name="item[]" value="{{$item['id']}}" @if ($item['check'] == 1)checked="checked"@endif></input>
                              {{$item['name']}}</label>
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="frame-6">
                    <div class="main-headline-2">自由記述</div>
                    <textarea name="others" class="textarea" placeholder="その他持っていくもの(薬の詳細など)" rows="10">{{$user->takeout_others}}</textarea>
                    </div>
                  </div>
                  <div class="div-wrapper">
                    <button type="submit" class="button-3"><div class="text-3">次へ</div></button>
                    <div style="width: 100%;height: 50px;"></div>
                  </div>
                </div>
              </div>
            </form>

            <div class="footer-wrapper">
              <footer class="footer"><div class="text-wrapper-3">PLATEAU by MLIT</div></footer>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
