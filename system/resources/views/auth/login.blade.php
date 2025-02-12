<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>地区防災作成支援システム</title>
    <link rel="stylesheet" href="{{ asset('/css/globals_login.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/styleguide_login.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/style_login.css') }}" />
  </head>
  <body>
    <div class="screen">
      <div class="div">
        <footer class="footer"><div class="text-wrapper">PLATEAU by MLIT</div></footer>
        <div class="frame">
          <div class="frame-2">
            <div class="frame-3">
              <div class="text"><div class="text-wrapper-2">地区防災作成支援システム</div></div>
            </div>
            <div class="div-wrapper">
              <div class="div-wrapper"><div class="main-headline">ログイン</div></div>
            </div>
          </div>
          <form method="post" action="{{ route('login') }}">
          @csrf
          <div class="frame-2">
            <div class="frame-4">
              <div class="frame-5">
                <div class="vertical-form-item-2">
                    <div class="label"><div class="title">メールアドレス</div></div>
                    <input class="input-2" name="email" type="text" :value="old('email')" required>
                      <div class="placeholder"><div class="placeholder-2"></div></div>
                      <div class="spacer"><div class="spacer-2"></div></div>
                    </input>
                  </div>
                <div class="vertical-form-item-2">
                  <div class="label"><div class="title">パスワード</div></div>
                  <input class="input-2" name="password" type="password">
                    <div class="placeholder"><div class="placeholder-2"></div></div>
                    <div class="spacer"><div class="spacer-2"></div></div>
                  </input>
                </div>
                <div class="vertical-form-item2">
                  <div class="error-label">
                    <div class="error-title">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <button class="button" type="submit"><div class="text-2">ログイン</div></button>
            </form>
              <button class="button-2" type="button">
                <div class="text-3">パスワードを忘れた場合、所属する自治会にお問い合わせください</div>
              </button>
            </div>
            <img class="divider" src="{{ asset('/img/divider.svg') }}" />
            <div class="frame-7">
              <div class="text-4">アカウントをお持ちでない方はこちらから</div>
              <button type="button" class="button-3" onclick="location.href='{{ route('register') }}'"><div class="text-3">サインアップ</div></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
