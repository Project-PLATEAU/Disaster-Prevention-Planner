<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
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
              <img class="image" src="{{ asset('/img/image-35.png')}}" />
              <div class="text"><div class="text-wrapper-2">さぬき市個別避難計画作成</div></div>
            </div>
            <div class="div-wrapper">
              <div class="div-wrapper"><div class="main-headline">ログイン</div></div>
            </div>
          </div>
          <form method="post" action="{$docRoot}default/auth/process/">
          <div class="frame-2">
            <div class="frame-4">
              <div class="frame-5">
                <div class="frame-6">
                  <div class="vertical-form-item">
                    <div class="label"><div class="title">ユーザID（住所）</div></div>
                    <select class="select" name="address1">
                      {foreach from=$address item=item}
                      {if $item.id == 5}
                      <option value="{$item.id}" selected="selected">{$item.name}</option>
                      {else}
                      <option value="{$item.id}">{$item.name}</option>
                      {/if}
                      {/foreach}
                    </select>
                  </div>
                  <div class="input-wrapper">
                    <input class="input" name="address2" placeholder="1-1-1">
                    </input>
                  </div>
                </div>
                <div class="vertical-form-item-2">
                  <div class="label"><div class="title">パスワード</div></div>
                  <input class="input-2" name="password" type="password">
                    <div class="placeholder"><div class="placeholder-2"></div></div>
                    <div class="spacer"><div class="spacer-2"></div></div>
                  </input>
                </div>
                <div class="vertical-form-item2">
                  <div class="error-label"><div class="error-title"></div></div>
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
              <button type="button" class="button-3" onclick="location.href='{$docRoot}default/regist/index/';"><div class="text-3">サインアップ</div></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
