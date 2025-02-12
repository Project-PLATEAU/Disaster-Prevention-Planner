<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>地区防災作成支援システム</title>
  <link rel="stylesheet" href="{{ asset('/css/globals_signup.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/styleguide_signup.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/style_signup.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/vendor/jquery-ui.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/vendor/jquery-ui.structure.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/vendor/jquery-ui.theme.min.css') }}" />
</head>
<body>
  <div class="screen">
    <div class="div">
      <footer class="footer">
        <div class="text-wrapper">PLATEAU by MLIT</div>
      </footer>
      <div class="frame">
        <div class="frame-2">
          <div class="frame-3">
            <div class="text">
              <div class="text-wrapper-2">地区防災作成支援システム</div>
            </div>
          </div>
          <div class="div-wrapper">
            <div class="div-wrapper">
              <div class="main-headline">サインアップ</div>
            </div>
          </div>
        </div>
        <div class="frame-2">
          <form method="post" action="{{route('register')}}" id="regist-form">
          @csrf
          <div class="frame-4">
            <div class="frame-5">
              <div class="vertical-form-item-2">
                <div class="label">
                  <div class="title">メールアドレス</div>
                </div>
                <input name="email" id="email" type="text" class="input-2">
                </input>
              </div>
              <div class="frame-6">
                <div class="vertical-form-item">
                  <div class="label">
                    <div class="title">住所</div>
                  </div>
                  <select name="address1" id="address1" class="select">
                    @foreach ($addressList as $address)
                          @if ($address->id === 5)
                          <option value="{{ $address->id }}" selected="selected">{{ $address->name }}</option>
                          @else
                          <option value="{{ $address->id }}">{{ $address->name }}</option>
                          @endif
                    @endforeach
                  </select>
                </div>
                <div class="input-wrapper">
                  <input name="address2" id="address2" type="text" class="input" placeholder="1-1-1"></input>
                </div>
              </div>
              <div class="vertical-form-item2">
                <div class="error-label"><div class="error-title" id="error1"></div></div>
              </div>
              <div class="vertical-form-item-2">
                <div class="label">
                  <div class="title">パスワード</div>
                </div>
                <input name="password" id="password" type="password" class="input-2">
                </input>
              </div>
              <div class="vertical-form-item-2">
                <div class="label">
                  <div class="title">パスワード確認</div>
                </div>
                <input name="password_confirmation" id="password_confirmation" type="password" class="input-2">
                </input>
              </div>
              <div class="vertical-form-item2">
                <div class="error-label"><div class="error-title" id="error2"></div></div>
              </div>
              <div class="checkbox">
                <input id="terms" name="terms" class="checkbox-input" type="checkbox">
                </input>
                <p class="p"><span class="span" onclick="showTerms();">利用規約</span> <span class="text-wrapper-3">を同意する</span></p>
              </div>
              <div class="vertical-form-item2">
                <div class="error-label">
                    <div class="error-title" id="error3">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                        @endforeach
                    </div>
                </div>
              </div>
            </div>
            <button class="button" type="submit">
              <div class="text-2">サインアップ</div>
            </button>
          </div>
          </form>
          <img class="divider" src="{{ asset('/img/divider.svg') }}" />
          <div class="frame-7">
            <div class="text-3">アカウントをお持ちの方はこちらから</div>
            <button type="button" class="button-2" onclick="location.href='{{route('login')}}';">
              <div class="text-4">ログイン</div>
            </button>
          </div>
          <div id="dialog" style="display: none;font-size: 16px;"></div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('/js/vendor/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('/js/vendor/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('/js/default_regist.js') }}"></script>
</body>
</html>
