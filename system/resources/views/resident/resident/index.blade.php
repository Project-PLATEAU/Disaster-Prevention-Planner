<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_citizen-info-registration.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_citizen-info-registration.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_citizen-info-registration.css') }}" />
  </head>
  <body>
    <div class="screen">
      <div class="overlap-group-wrapper">
        <div class="overlap-group">
          <div class="frame">
            <div class="div">
              <div class="global-header-front">
                <div class="frame-2">
                  <div class="text"><div class="text-wrapper"><a href="{{ route('resident.index.index') }}">地区防災計画作成支援システム 個別避難計画作成</a></div></div>
                </div>
              </div>
              <div class="frame-3">
                <div class="steps">
                  <div class="item">
                    <div class="components-steps"><div class="number">1</div></div>
                    <div class="title-2">住民情報</div>
                    <img class="tail" src="{{ asset ('/img/tail-2.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="number-wrapper"><div class="number-2">2</div></div>
                    <div class="title-3">リスク情報確認</div>
                    <img class="tail" src="{{ asset ('/img/tail-3.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="number-wrapper"><div class="number-2">3</div></div>
                    <div class="title-3">避難情報</div>
                    <img class="tail" src="{{ asset ('/img/tail-6.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="number-wrapper"><div class="number-2">4</div></div>
                    <div class="title-3">避難ルート検索</div>
                    <img class="tail" src="{{ asset ('/img/tail-6.svg') }}" />
                  </div>
                  <div class="item-2">
                    <div class="number-wrapper"><div class="number-2">5</div></div>
                    <div class="title-3">避難のタイミング</div>
                    <img class="tail" src="{{ asset ('/img/tail-6.svg') }}" />
                  </div>
                  <div class="item">
                    <div class="number-wrapper"><div class="number-2">6</div></div>
                    <div class="title-3">非常持出</div>
                    <img class="tail" src="{{ asset ('/img/tail-7.svg') }}" />
                  </div>
                  <div class="item-3">
                    <div class="number-wrapper"><div class="number-2">7</div></div>
                    <div class="title-3">完了</div>
                  </div>
                </div>
                <form id="resident_form" method="post" action="{{ route('resident.resident.exec') }}" style="width: 100%;">
                @csrf
                <div class="frame-4">
                  <div class="frame-5"><div class="main-headline">住民情報</div></div>
                  <iframe src="{{$url}}?token={{$user->user_id}}" width="100%" height="600px"></iframe>
                  <div class="frame-10">
                    <div class="main-headline-2">
                      住民情報
                      <input type="hidden" id="user_id" value="{{ $user->id }}" />
                      <input type="hidden" id="user_num" value="{{ $num }}" />
                      <input type="hidden" id="family_flag" value="{{ $family_flag }}" />
                      <input type="hidden" id="family" value="{{ $family }}" />
                    </div>
                    <div class="frame-11">
                      <div class="vertical-form-item">
                        <div class="label"><div class="title-6">自宅</div></div>
                        <div class="div-wrapper">
                          <input type="text" name="bldg_id" id="house" class="placeholder-2" readonly ="text" value="{{ $user->bldg_id }}" />
                          <input type="hidden" id="bldg_lat" name="bldg_lat" value="{{ $user->latitude }}" />
                          <input type="hidden" id="bldg_lng" name="bldg_lng" value="{{ $user->longitude }}" />
                        </div>
                      </div>
                      <div class="vertical-form-item">
                        <div class="label"><div class="title-6">氏名</div></div>
                        <div class="div-wrapper">
                          <input type="text" name="name" id="name0" class="placeholder-2" placeholder="氏名を入力してください" type="text" value="{{ $user->name }}" />
                        </div>
                      </div>
                      <div class="vertical-form-item">
                        <div class="label"><div class="title-7">一緒にお住いの方の人数は？</div></div>
                        <select name="family_num" id="family_num" class="select-2">
                          <option value="1" @if ($user->num == 1)selected @endif>1</option>
                          <option value="2" @if ($user->num == 2)selected @endif>2</option>
                          <option value="3" @if ($user->num == 3)selected @endif>3</option>
                          <option value="4" @if ($user->num == 4)selected @endif>4</option>
                          <option value="5" @if ($user->num == 5)selected @endif>5</option>
                          <option value="6" @if ($user->num == 6)selected @endif>6</option>
                          <option value="7" @if ($user->num == 7)selected @endif>7</option>
                          <option value="8" @if ($user->num == 8)selected @endif>8</option>
                          <option value="9" @if ($user->num == 9)selected @endif>9</option>
                          <option value="10" @if ($user->num == 10)selected @endif>10</option>
                        </select>
                      </div>
                      <div class="vertical-form-item">
                        <div class="label">
                          <div class="title-7">一緒に避難する方で、避難時に支援が必要な方はいらっしゃいますか？</div>
                        </div>
                        <div class="radio-group">
                          <div class="element">
                            <label><input type="radio" name="support" value="1" @if ($user->attr1 == 1 or $user->attr1 == Null)checked @endif />
                            はい</label>
                          </div>
                          <div class="element">
                            <label><input type="radio" name="support" value="2" @if ($user->attr1 == 2)checked @endif />
                            いいえ</label>
                          </div>
                        </div>
                      </div>
                      <div class="vertical-form-item">
                        <div class="label"><div class="title-7">ペットは飼われていますか？</div></div>
                        <div class="radio-group">
                          <div class="element">
                            <label><input type="radio" name="pets" value="1" @if ($user->attr2 == 1 or $user->attr2 == Null)checked @endif />
                            はい</label>
                          </div>
                          <div class="element">
                            <label><input type="radio" name="pets" value="2" @if ($user->attr2 == 2)checked @endif />
                            いいえ</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="frame-10">
                    <div class="main-headline-2">家族情報</div>
                    <div class="frame-12" id="family_form">
                    </div>
                  </div>
                  <div class="frame-10">
                    <div class="main-headline-2">緊急連絡先</div>
                    <div class="frame-11">
                      <div class="vertical-form-item-2">
                        <div class="label"><div class="title-8">緊急連絡先１</div></div>
                        <input type="text" name="contact01_name" class="div-wrapper" placeholder="名前" value="@isset($contact){{$contact[0]['name']}}@endisset">
                        </input>
                      </div>
                      <div class="frame-13">
                        <input type="text" name="contact01_phone" class="div-wrapper" placeholder="電話番号" value="@isset($contact){{$contact[0]['phone']}}@endisset">
                        </input>
                      </div>
                      <div class="frame-13">
                        <select name="contact01_type" class="select-2">
                          <option value="1" @isset($contact) @if ($contact[0]['type'] == 1)selected="selected"@endif @endisset>家族、親類</option>
                          <option value="2" @isset($contact) @if ($contact[0]['type'] == 2)selected="selected"@endif @endisset>ご近所</option>
                          <option value="3" @isset($contact) @if ($contact[0]['type'] == 3)selected="selected"@endif @endisset>その他</option>
                        </select>
                      </div>
                    </div>
                    <div class="frame-11">
                      <div class="vertical-form-item-2">
                        <div class="label"><div class="title-8">緊急連絡先２</div></div>
                        <input type="text" name="contact02_name" class="div-wrapper" placeholder="名前" value="@isset($contact){{$contact[1]['name']}}@endisset">
                        </input>
                      </div>
                      <div class="frame-13">
                        <input type="text" name="contact02_phone" class="div-wrapper" placeholder="電話番号" value="@isset($contact){{$contact[1]['phone']}}@endisset">
                        </input>
                      </div>
                      <div class="frame-13">
                        <select name="contact02_type" class="select-2">
                            <option value="1" @isset($contact) @if ($contact[1]['type'] == 1)selected="selected"@endif @endisset>家族、親類</option>
                            <option value="2" @isset($contact) @if ($contact[1]['type'] == 2)selected="selected"@endif @endisset>ご近所</option>
                            <option value="3" @isset($contact) @if ($contact[1]['type'] == 3)selected="selected"@endif @endisset>その他</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="button-wrapper">
                    <button class="button-4"><div class="text-5">次へ</div></button>
                  </div>
                </div>
                <inptu type="hidden" id="family0" name="family0" value="" />
                <inptu type="hidden" id="family1" name="family1" value="" />
                <inptu type="hidden" id="family2" name="family2" value="" />
                <inptu type="hidden" id="family3" name="family3" value="" />
                <inptu type="hidden" id="family4" name="family4" value="" />
                <inptu type="hidden" id="family5" name="family5" value="" />
                <inptu type="hidden" id="family6" name="family6" value="" />
                <inptu type="hidden" id="family7" name="family7" value="" />
                <inptu type="hidden" id="family8" name="family8" value="" />
                <inptu type="hidden" id="family9" name="family9" value="" />
                </form>
              </div>
            </div>

            <div class="footer-wrapper">
              <footer class="footer"><div class="text-wrapper-6">PLATEAU by MLIT</div></footer>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset ('/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset ('/js/resident_resident.js') }}"></script>
  </body>
</html>
