<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" />
    <link rel="stylesheet" href="{{ asset ('/css/css_evacuation-timing-select.css') }}" />
  </head>
  <body>
    <div class="main-container">
      <div class="frame">
        <div class="frame-1">
          <div class="global-header-front-end">
            <div class="frame-2">
              <div class="text">
                <span class="sanuki-city-evacuation-plan-creation"
                  ><a href="{{route('resident.index.index')}}">地区防災計画作成支援システム 個別避難計画作成</a></span
                >
              </div>
            </div>
          </div>
          <div class="frame-5">
            <div class="steps">
              <div class="item">
                <a class="top-link" href="{{route('resident.resident.index')}}">
                <div class="steps-item-icon">
                  <div class="check"><div class="vector-6"></div></div>
                  <div class="rectangle"></div>
                </div>
                </a>
                <span class="title-resident-information">住民情報</span>
                <div class="tail"><div class="line"></div></div>
              </div>
              <div class="item">
                <a class="top-link" href="{{route('resident.risk.index')}}">
                <div class="steps-item-icon">
                  <div class="check"><div class="vector-6"></div></div>
                  <div class="rectangle"></div>
                </div>
                </a>
                <span class="title-resident-information">リスク情報確認</span>
                <div class="tail"><div class="line"></div></div>
              </div>
              <div class="item">
                <a class="top-link" href="{{route('resident.evacuation.index')}}">
                <div class="steps-item-icon">
                  <div class="check"><div class="vector-6"></div></div>
                  <div class="rectangle"></div>
                </div>
                </a>
                <span class="title-resident-information">避難情報</span>
                <div class="tail"><div class="line"></div></div>
              </div>
              <div class="item">
                <a class="top-link" href="{{route('resident.route.index')}}">
                <div class="steps-item-icon">
                  <div class="check"><div class="vector-6"></div></div>
                  <div class="rectangle"></div>
                </div>
                </a>
                <span class="title-resident-information">避難ルート検索</span>
                <div class="tail"><div class="line"></div></div>
              </div>
              <div class="item-18">
                <div class="steps-item-icon-19">
                  <span class="number-3">5</span>
                  <div class="rectangle-10"></div></div>
                  <span class="title-resident-information">避難のタイミング</span>
                <div class="tail-1b"><div class="line-1c"></div></div>
              </div>
              <div class="item-1d">
                <div class="steps-item-icon-1e">
                  <span class="number-6">6</span>
                  <div class="rectangle-1f"></div></div
                ><span class="title-emergency-evacuation">非常持出</span>
                <div class="tail-20"><div class="line-21"></div></div>
              </div>
              <div class="item-22">
                <div class="steps-item-icon-1e">
                  <span class="number-6">7</span>
                  <div class="rectangle-1f"></div></div
                ><span class="title-emergency-evacuation">完了</span>
                <div class="tail-20"><div class="line-21"></div></div>
              </div>
            </div>
            <form method="post" action="{{route('resident.timeline.exec')}}" style="width: 100%;">
            @csrf
            <div class="frame-25">
              <div class="frame-26">
                <span class="main-headline">避難のタイミング</span>
              </div>
              <div class="frame-27">
                <div class="frame-28">
                  <div class="frame-29">
                    <span class="title-2a">台風直撃 <br />3日前</span>
                  </div>
                  <div class="steps-item-dot">
                    <div class="track">
                      <div class="steps-item-icon-2b">
                        <div class="rectangle-2c"></div>
                      </div>
                      <span class="title-2d">警戒レベル1</span>
                    </div>
                    <div class="wrapper">
                      <div class="tail-2e"><div class="line-2f"></div></div>
                      <div class="content">
                        <span class="description">台風が接近</span>
                      </div>
                    </div>
                  </div>
                  <div class="frame-30">
                    <div class="frame-31">
                      <div class="vertical-form-item-select">
                        <div class="label">
                          <span class="title-32">このとき何をしますか</span>
                        </div>
                        <select name="timing1" class="select">
                          <option value="1" @isset($data) @if ($data->timing1 == 1)selected="selected"@endif @endisset>避難しやすい服装に着替える</option>
                          <option value="2" @isset($data) @if ($data->timing1 == 2)selected="selected"@endif @endisset>避難する時に持っていくものを準備する</option>
                          <option value="3" @isset($data) @if ($data->timing1 == 3)selected="selected"@endif @endisset>今後の台風を調べ始める</option>
                          <option value="4" @isset($data) @if ($data->timing1 == 4)selected="selected"@endif @endisset>川の水位を調べ始める</option>
                          <option value="5" @isset($data) @if ($data->timing1 == 5)selected="selected"@endif @endisset>住んでいるところと上流の雨量を調べる</option>
                          <option value="6" @isset($data) @if ($data->timing1 == 6)selected="selected"@endif @endisset>安全なところに移動を始める</option>
                          <option value="7" @isset($data) @if ($data->timing1 == 7)selected="selected"@endif @endisset>避難完了</option>
                        </select>
                      </div>
                      <div class="vertical-form-item-input">
                        <div class="label-35">
                          <span class="title-36"
                            >その他やるべきこと（自由記述）</span
                          >
                        </div>
                        <textarea name="timing1_others" rows="3" class="textarea"  placeholder="やること">@isset($data){{$data->timing1_others}}@endisset</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="frame-37">
                  <div class="frame-38">
                    <span class="title-39">台風直撃 <br />2日前</span>
                  </div>
                  <div class="steps-item-dot-3a">
                    <div class="track-3b">
                      <div class="steps-item-icon-3c">
                        <div class="rectangle-3d"></div>
                      </div>
                      <span class="title-3e">警戒レベル2</span>
                    </div>
                    <div class="wrapper-3f">
                      <div class="tail-40"><div class="line-41"></div></div>
                      <div class="content-42">
                        <span class="description-43">雨風が強くなる</span>
                      </div>
                    </div>
                  </div>
                  <div class="frame-44">
                    <div class="frame-45">
                      <div class="vertical-form-item-select-46">
                        <div class="label-47">
                          <span class="title-48">このとき何をしますか</span>
                        </div>
                        <select name="timing2" class="select">
                            <option value="1" @isset($data) @if ($data->timing2 == 1)selected="selected"@endif @endisset>避難しやすい服装に着替える</option>
                            <option value="2" @isset($data) @if ($data->timing2 == 2)selected="selected"@endif @endisset>避難する時に持っていくものを準備する</option>
                            <option value="3" @isset($data) @if ($data->timing2 == 3)selected="selected"@endif @endisset>今後の台風を調べ始める</option>
                            <option value="4" @isset($data) @if ($data->timing2 == 4)selected="selected"@endif @endisset>川の水位を調べ始める</option>
                            <option value="5" @isset($data) @if ($data->timing2 == 5)selected="selected"@endif @endisset>住んでいるところと上流の雨量を調べる</option>
                            <option value="6" @isset($data) @if ($data->timing2 == 6)selected="selected"@endif @endisset>安全なところに移動を始める</option>
                            <option value="7" @isset($data) @if ($data->timing2 == 7)selected="selected"@endif @endisset>避難完了</option>
                        </select>
                      </div>
                      <div class="vertical-form-item-input-4c">
                        <div class="div-label">
                          <span class="title-other-tasks">その他やるべきこと（自由記述）</span>
                        </div>
                        <textarea name="timing2_others" rows="3" class="textarea"  placeholder="やること">@isset($data){{$data->timing2_others}}@endisset</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="div-frame">
                  <div class="button-frame">
                    <span class="title-typhoon">台風直撃 <br />1日前</span>
                  </div>
                  <div class="steps-item-dot-4d">
                    <div class="div-track">
                      <div class="steps-item-icon-4e">
                        <div class="div-rectangle"></div>
                      </div>
                      <span class="title-alert-level">警戒レベル2</span>
                    </div>
                    <div class="div-wrapper">
                      <div class="div-tail"><div class="div-line"></div></div>
                      <div class="div-content">
                        <span class="description-water-level"
                          >川の水位が上昇</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="div-frame-4f">
                    <div class="div-frame-50">
                      <div class="vertical-form-item-select-51">
                        <div class="div-label-52">
                          <span class="title-what-to-do"
                            >このとき何をしますか</span
                          >
                        </div>
                        <select name="timing3" class="select">
                            <option value="1" @isset($data) @if ($data->timing3 == 1)selected="selected"@endif @endisset>避難しやすい服装に着替える</option>
                            <option value="2" @isset($data) @if ($data->timing3 == 2)selected="selected"@endif @endisset>避難する時に持っていくものを準備する</option>
                            <option value="3" @isset($data) @if ($data->timing3 == 3)selected="selected"@endif @endisset>今後の台風を調べ始める</option>
                            <option value="4" @isset($data) @if ($data->timing3 == 4)selected="selected"@endif @endisset>川の水位を調べ始める</option>
                            <option value="5" @isset($data) @if ($data->timing3 == 5)selected="selected"@endif @endisset>住んでいるところと上流の雨量を調べる</option>
                            <option value="6" @isset($data) @if ($data->timing3 == 6)selected="selected"@endif @endisset>安全なところに移動を始める</option>
                            <option value="7" @isset($data) @if ($data->timing3 == 7)selected="selected"@endif @endisset>避難完了</option>
                        </select>
                      </div>
                      <div class="vertical-form-item-input-4c">
                        <div class="div-label">
                          <span class="title-other-tasks">その他やるべきこと（自由記述）</span>
                        </div>
                        <textarea name="timing3_others" rows="3" class="textarea"  placeholder="やること">@isset($data){{$data->timing3_others}}@endisset</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="div-frame-5f">
                  <div class="button-frame-60">
                    <span class="title-typhoon-61">台風直撃 <br />半日前</span>
                  </div>
                  <div class="steps-item-dot-62">
                    <div class="div-track-63">
                      <div class="steps-item-icon-64">
                        <div class="div-rectangle-65"></div>
                      </div>
                      <span class="title-alert-level-66">警戒レベル2</span>
                    </div>
                    <div class="div-wrapper-67">
                      <div class="div-tail-68">
                        <div class="div-line-69"></div>
                      </div>
                      <div class="div-content-6a">
                        <span class="description-water-gathering"
                          >川の上流から水が集まる</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="div-frame-6b">
                    <div class="div-frame-6c">
                      <div class="vertical-form-item-select-6d">
                        <div class="div-label-6e">
                          <span class="title-what-to-do-6f"
                            >このとき何をしますか</span
                          >
                        </div>
                        <select name="timing4" class="select">
                            <option value="1" @isset($data) @if ($data->timing4 == 1)selected="selected"@endif @endisset>避難しやすい服装に着替える</option>
                            <option value="2" @isset($data) @if ($data->timing4 == 2)selected="selected"@endif @endisset>避難する時に持っていくものを準備する</option>
                            <option value="3" @isset($data) @if ($data->timing4 == 3)selected="selected"@endif @endisset>今後の台風を調べ始める</option>
                            <option value="4" @isset($data) @if ($data->timing4 == 4)selected="selected"@endif @endisset>川の水位を調べ始める</option>
                            <option value="5" @isset($data) @if ($data->timing4 == 5)selected="selected"@endif @endisset>住んでいるところと上流の雨量を調べる</option>
                            <option value="6" @isset($data) @if ($data->timing4 == 6)selected="selected"@endif @endisset>安全なところに移動を始める</option>
                            <option value="7" @isset($data) @if ($data->timing4 == 7)selected="selected"@endif @endisset>避難完了</option>
                        </select>
                      </div>
                      <div class="div-vertical-form-item">
                        <div class="div-label-75">
                          <span class="title-other-tasks-76"
                            >その他やるべきこと（自由記述）</span
                          >
                        </div>
                        <textarea name="timing4_others" rows="3" class="textarea"  placeholder="やること">@isset($data){{$data->timing4_others}}@endisset</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="div-frame-7c">
                  <div class="button-frame-7d">
                    <span class="title-typhoon-7e">台風直撃 <br />半日前</span>
                  </div>
                  <div class="div-steps-item-dot">
                    <div class="div-track-7f">
                      <div class="div-steps-item-icon">
                        <div class="rectangle-title"></div>
                      </div>
                      <span class="title-alert-level-2">警戒レベル2</span>
                    </div>
                    <div class="div-wrapper-80">
                      <div class="div-tail-81">
                        <div class="div-line-82"></div>
                      </div>
                      <div class="div-content-83">
                        <span class="description-river-level-rise"
                          >さらに川の水位が上昇</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="div-frame-84">
                    <div class="div-frame-85">
                      <div class="div-vertical-form-item-86">
                        <div class="div-label-87">
                          <span class="title-what-to-do-88"
                            >このとき何をしますか</span
                          >
                        </div>
                        <select name="timing5" class="select">
                            <option value="1" @isset($data) @if ($data->timing5 == 1)selected="selected"@endif @endisset>避難しやすい服装に着替える</option>
                            <option value="2" @isset($data) @if ($data->timing5 == 2)selected="selected"@endif @endisset>避難する時に持っていくものを準備する</option>
                            <option value="3" @isset($data) @if ($data->timing5 == 3)selected="selected"@endif @endisset>今後の台風を調べ始める</option>
                            <option value="4" @isset($data) @if ($data->timing5 == 4)selected="selected"@endif @endisset>川の水位を調べ始める</option>
                            <option value="5" @isset($data) @if ($data->timing5 == 5)selected="selected"@endif @endisset>住んでいるところと上流の雨量を調べる</option>
                            <option value="6" @isset($data) @if ($data->timing5 == 6)selected="selected"@endif @endisset>安全なところに移動を始める</option>
                            <option value="7" @isset($data) @if ($data->timing5 == 7)selected="selected"@endif @endisset>避難完了</option>
                        </select>
                      </div>
                      <div class="div-vertical-form-item-8d">
                        <div class="div-label-8e">
                          <span class="title-other-tasks-8f"
                            >その他やるべきこと（自由記述）</span
                          >
                        </div>
                        <textarea name="timing5_others" rows="3" class="textarea"  placeholder="やること">@isset($data){{$data->timing5_others}}@endisset</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="div-frame-95">
                  <div class="button-frame-96">
                    <span class="title-flood">氾濫 <br />5時間前</span>
                  </div>
                  <div class="div-steps-item-dot-97">
                    <div class="div-track-98">
                      <div class="div-steps-item-icon-99">
                        <div class="rectangle-title-9a"></div>
                      </div>
                      <span class="title-alert-level-3"
                        >警戒レベル3（高齢者等避難）</span
                      >
                    </div>
                    <div class="div-wrapper-9b">
                      <div class="div-tail-9c">
                        <div class="div-line-9d"></div>
                      </div>
                      <div class="div-content-9e">
                        <span class="description-ground-flooded"
                          >河川敷のグラウンドが水没</span
                        >
                      </div>
                    </div>
                  </div>
                  <div class="div-frame-9f">
                    <div class="div-frame-a0">
                      <div class="div-vertical-form-item-a1">
                        <div class="div-label-a2">
                          <span class="title-what-to-do-a3"
                            >このとき何をしますか</span
                          >
                        </div>
                        <select name="timing6" class="select">
                            <option value="1" @isset($data) @if ($data->timing6 == 1)selected="selected"@endif @endisset>避難しやすい服装に着替える</option>
                            <option value="2" @isset($data) @if ($data->timing6 == 2)selected="selected"@endif @endisset>避難する時に持っていくものを準備する</option>
                            <option value="3" @isset($data) @if ($data->timing6 == 3)selected="selected"@endif @endisset>今後の台風を調べ始める</option>
                            <option value="4" @isset($data) @if ($data->timing6 == 4)selected="selected"@endif @endisset>川の水位を調べ始める</option>
                            <option value="5" @isset($data) @if ($data->timing6 == 5)selected="selected"@endif @endisset>住んでいるところと上流の雨量を調べる</option>
                            <option value="6" @isset($data) @if ($data->timing6 == 6)selected="selected"@endif @endisset>安全なところに移動を始める</option>
                            <option value="7" @isset($data) @if ($data->timing6 == 7)selected="selected"@endif @endisset>避難完了</option>
                        </select>
                      </div>
                      <div class="vertical-form-item-input-a8">
                        <div class="div-label-a9">
                          <span class="title-span"
                            >その他やるべきこと（自由記述）</span
                          >
                        </div>
                        <textarea name="timing6_others" rows="3" class="textarea"  placeholder="やること">@isset($data){{$data->timing6_others}}@endisset</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="div-frame-ae">
                  <div class="button-frame-af">
                    <span class="time-span">氾濫 <br />3時間前</span>
                  </div>
                  <div class="steps-item-dot-b0">
                    <div class="div-track-b1">
                      <div class="steps-item-icon-b2">
                        <div class="rectangle-div"></div>
                      </div>
                      <span class="alert-level-title"
                        >警戒レベル4（避難指示）</span
                      >
                    </div>
                    <div class="wrapper-div">
                      <div class="tail-div"><div class="line-div"></div></div>
                      <div class="content-div">
                        <span class="description-span">川の水があふれそう</span>
                      </div>
                    </div>
                  </div>
                  <div class="frame-div">
                    <div class="frame-div-b3">
                      <div class="vertical-form-item-select-b4">
                        <div class="div-label-b5">
                          <span class="action-title-span"
                            >このとき何をしますか</span
                          >
                        </div>
                        <select name="timing7" class="select">
                            <option value="1" @isset($data) @if ($data->timing7 == 1)selected="selected"@endif @endisset>避難しやすい服装に着替える</option>
                            <option value="2" @isset($data) @if ($data->timing7 == 2)selected="selected"@endif @endisset>避難する時に持っていくものを準備する</option>
                            <option value="3" @isset($data) @if ($data->timing7 == 3)selected="selected"@endif @endisset>今後の台風を調べ始める</option>
                            <option value="4" @isset($data) @if ($data->timing7 == 4)selected="selected"@endif @endisset>川の水位を調べ始める</option>
                            <option value="5" @isset($data) @if ($data->timing7 == 5)selected="selected"@endif @endisset>住んでいるところと上流の雨量を調べる</option>
                            <option value="6" @isset($data) @if ($data->timing7 == 6)selected="selected"@endif @endisset>安全なところに移動を始める</option>
                            <option value="7" @isset($data) @if ($data->timing7 == 7)selected="selected"@endif @endisset>避難完了</option>
                        </select>
                      </div>
                      <div class="vertical-form-item-input-b9">
                        <div class="div-label-ba">
                          <span class="title-span-bb"
                            >その他やるべきこと（自由記述）</span
                          >
                        </div>
                        <textarea name="timing7_others" rows="3" class="textarea"  placeholder="やること">@isset($data){{$data->timing7_others}}@endisset</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="div-frame-c1">
                  <div class="div-frame-c2"></div>
                  <div class="steps-item-dot-c3">
                    <div class="div-track-c4">
                      <div class="steps-item-icon-c5">
                        <div class="rectangle-div-c6"></div>
                      </div>
                      <span class="alert-level-title-c7">警戒レベル5</span>
                    </div>
                    <div class="wrapper-div-c8">
                      <div class="content-div-c9">
                        <span class="description-span-ca">氾濫発生</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="frame-div-cb">
                  <button class="button-div" onclick="location.href='';">
                    <span class="text-span">次へ</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
        <div class="frame-div-cc">
          <div class="footer-div">
            <span class="plateau-title">PLATEAU by MLIT</span>
          </div>
        </div>
      </div>
    </div>
    <!-- Generated by Codia AI - https://codia.ai/ -->
  </body>
</html>
