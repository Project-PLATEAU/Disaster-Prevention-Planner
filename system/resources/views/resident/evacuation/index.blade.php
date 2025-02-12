<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_evacuation-registration.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_evacuation-registration.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_evacuation-registration.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/info.css') }}" />
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
                    <div class="steps-item-icon"><a href="{{route('resident.resident.index')}}"><img class="check" src="{{ asset ('/img/check-3.svg') }}" /></div>
                    <div class="title-2">住民情報</div></a>
                    <img class="tail-2" src="{{ asset ('/img/tail-3.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="steps-item-icon"><a href="{{route('resident.risk.index')}}"><img class="check" src="{{ asset ('/img/check-3.svg') }}" /></div>
                    <div class="title-2">リスク情報確認</div></a>
                    <img class="tail-2" src="{{ asset ('/img/tail-4.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="components-steps"><div class="number">3</div></div>
                    <div class="title-2">避難情報</div>
                    <img class="tail-2" src="{{ asset ('/img/tail-7.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="number-wrapper"><div class="number-2">4</div></div>
                    <div class="title-3">避難ルート検索</div>
                    <img class="tail-2" src="{{ asset ('/img/tail-8.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="number-wrapper"><div class="number-2">5</div></div>
                    <div class="title-3">避難のタイミング</div>
                    <img class="tail-2" src="{{ asset ('/img/tail-8.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="number-wrapper"><div class="number-2">6</div></div>
                    <div class="title-3">非常持出</div>
                    <img class="tail-2" src="{{ asset ('/img/tail-8.svg') }}" />
                  </div>
                  <div class="item-3">
                    <div class="number-wrapper"><div class="number-2">7</div></div>
                    <div class="title-3">完了</div>
                  </div>
                </div>
                <div class="frame-4">
                  <div class="frame-5"><div class="main-headline">避難情報</div></div>
                  <div class="frame-wrapper">
                    <form method="post" action="{{route('resident.evacuation.exec')}}">
                    @csrf
                    <div class="div-2">
                      <div class="vertical-form-item">
                        <div class="label">
                          <div class="title-4">避難をするときに、ご近所で一緒に避難をする方がいますか？</div>
                        </div>
                        <div class="radio-group">
                          <div class="element">
                            <label><input type="radio" name="evacuation1" value="1" @isset($data) @if ($data->evacuation1 == 1)checked="checked"@endif @endisset>
                            はい</label>
                          </div>
                          <div class="element">
                            <label><input type="radio" name="evacuation1" value="2" @isset($data) @if ($data->evacuation1 == 2)checked="checked"@endif @endisset>
                            いいえ</label>
                          </div>
                        </div>
                      </div>
                      <div class="vertical-form-item">
                        <div class="label"><div class="title-5">避難場所はきまってますか？</div></div>
                        <select name="evacuation2" class="select-2">
                          <option value="1" @isset($data) @if ($data->evacuation2 == 1)selected="selected"@endif @endisset>指定の避難場所</option>
                          <option value="2" @isset($data) @if ($data->evacuation2 == 2)selected="selected"@endif @endisset>安全なご近所、知り合いの家</option>
                        </select>
                      </div>
                      <div class="vertical-form-item">
                        <div class="div-2">
                          <div class="label"><div class="title-4">二次避難場所はありますか？<img src="{{ asset ('/img/info.png') }}" class="info-mark" value="1" /></div></div>
                          <div class="radio-group">
                            <div class="element">
                              <label><input type="radio" name="evacuation3" value="1" @isset($data) @if ($data->evacuation3 == 1)checked="checked"@endif @endisset>
                              はい</label>
                            </div>
                            <div class="element">
                              <label><input type="radio" name="evacuation3" value="2" @isset($data) @if ($data->evacuation3 == 2)checked="checked"@endif @endisset>
                              いいえ</label>
                            </div>
                          </div>
                        </div>
                        <!--<div class="message">
                          <div class="message-2">
                            「二次避難場所」とは、災害発生時に一次避難場所が利用できない、または安全でない場合に移動するための別の避難場所を指します。
                          </div>
                        </div>-->
                      </div>
                      <div calss="vertical-form-item">
                        <div class="div-2">
                          <div class="label"><div class="title-5">家族で共有する情報 <img src="{{ asset ('/img/info.png') }}" class="info-mark" value="2" /></div></div>
                          <textarea class="textarea" rows="10" name="share">@isset($data){{$data->share}}@endisset</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="button-wrapper">
                    <button class="div-wrapper" onclick="location.href='';"><div class="text-3">次へ</div></button>
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
    <script src="{{ asset ('/js/info.js') }}"></script>
  </body>
</html>
