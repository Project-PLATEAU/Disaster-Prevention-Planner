<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{asset('/css/globals_evacuation-registration.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/styleguide_evacuation-registration.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/style_evacuation-registration.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/report.css')}}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
  </head>
  <body>
    <div class="screen">
      <div class="overlap-group-wrapper">
        <div class="overlap-group">
          <div class="frame">
            <div class="div">
              <div class="global-header-front">
                <div class="frame-2">
                  <img class="image" src="{{asset('/img/image-34.png')}}" />
                  <div class="text"><div class="text-wrapper"><a href="{{route('resident.index.index')}}">地区防災計画作成支援システム 個別避難計画作成</a></div></div>
                </div>
              </div>
              <div class="frame-3">
                <form method="post" action="{{route('resident.report.exec')}}" enctype="multipart/form-data" style="width: 100%;">
                @csrf
                <div class="frame-4">
                  <div class="frame-5"><div class="main-headline"><a href="{{route('resident.report.index')}}"><img class="arrow-left" src="{{asset('/img/arrowleft-2.svg')}}" /></a> リスク情報登録</div></div>
                  <div class="report-div"><button class="report-button-2"><div class="report-text-2">保存</div></button></div>
                  <div class="frame-wrapper">
                    <div class="report-vertical-form-item">
                      <div class="report-label"><div class="report-title-5">時点</div></div>
                      <select class="report-select" name="time">
                        <option value="1" @isset($data)@if ($data->time == 1)selected="selected"@endif @endisset>現在のリスク</option>
                        <option value="2" @isset($data)@if ($data->time == 2)selected="selected"@endif @endisset>過去の災害</option>
                      </select>
                    </div>
                    <div class="report-vertical-form-item">
                      <div class="report-label"><div class="report-title-5">種別</div></div>
                      <select class="report-select" name="type">
                        <option value="1" @isset($data)@if ($data->type == 1)selected="selected"@endif @endisset>河川氾濫</option>
                        <option value="2" @isset($data)@if ($data->type == 2)selected="selected"@endif @endisset>土砂災害</option>
                        <option value="3" @isset($data)@if ($data->type == 3)selected="selected"@endif @endisset>道路</option>
                        <option value="4" @isset($data)@if ($data->type == 4)selected="selected"@endif @endisset>建物</option>
                        <option value="5" @isset($data)@if ($data->type == 5)selected="selected"@endif @endisset>その他</option>
                      </select>
                    </div>
                    <div class="report-vertical-form-item">
                      <div class="report-label"><div class="report-title-7">名称</div></div>
                      <input class="report-input" name="title" value="@isset($data){{$data->title}}@endisset" />
                    </div>
                    <div class="report-vertical-form-item">
                      <div class="report-label"><div class="report-title-2">説明</div></div>
                      <div class="report-frame-wrapper">
                        <div class="report-frame-wrapper">
                          <div class="report-frame-9">
                            <input type="file" name="file-element1" id="file-element1" accept="image/*" style="display:none" />
                            <button class="report-upload-picture" id="file-select1" type="button">
                              <img class="report-plus" src="{{asset('/img/plus-4.svg')}}" />
                              <div class="report-upload">画像を登録</div>
                            </button>
                            <textarea class="report-textarea" name="detail1">@isset($data){{$data->detail1}}@endisset</textarea>
                          </div>
                        </div>
                      </div>
                      <br />
                      <div class="report-frame-wrapper">
                        <div class="report-frame-wrapper">
                          <div class="report-frame-9">
                            <input type="file" name="file-element2" id="file-element2" accept="image/*" style="display:none" />
                            <button class="report-upload-picture" id="file-select2" type="button">
                              <img class="report-plus" src="{{asset('/img/plus-4.svg')}}" />
                              <div class="report-upload">画像を登録</div>
                            </button>
                            <textarea class="report-textarea" name="detail2">@isset($data){{$data->detail2}}@endisset</textarea>
                          </div>
                        </div>
                      </div>
                      <br />
                      <div class="report-frame-wrapper">
                        <div class="report-frame-wrapper">
                          <div class="report-frame-9">
                            <input type="file" name="file-element3" id="file-element3" accept="image/*" style="display:none" />
                            <button class="report-upload-picture" id="file-select3" type="button">
                              <img class="report-plus" src="{{asset('/img/plus-4.svg')}}" />
                              <div class="report-upload">画像を登録</div>
                            </button>
                            <textarea class="report-textarea" name="detail3">@isset($data){{$data->detail3}}@endisset</textarea>
                          </div>
                        </div>
                      </div>
                      <br />
                      <div class="report-vertical-form-item">
                        <div class="report-label"><div class="report-title-2">位置</div></div>
                        <input class="report-input" name="latlng" id="latlng" value="@isset($data){{$latlng}}@endisset" readonly />
                      </div>
                      <input type="hidden" name="mode" value="{{$mode}}" />
                      <input type="hidden" name="id" value="@isset($data){{$data->id}}@endisset" />
                      </form>
                      <div style="width: 100%">
                      <input type="button" onclick="getLocation();" value="現在地" />
                      <div id="map" style="width:100%;height:600px"></div>
                      </div>
                    </div>
                  </div>
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
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="{{asset('/js/resident_report.js')}}"></script>
  </body>
</html>
