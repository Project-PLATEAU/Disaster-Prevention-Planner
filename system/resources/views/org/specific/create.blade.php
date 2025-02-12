<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{asset('/css/globals_community_info_specific2.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/styleguide_community_info_specific2.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/style_community_info_specific2.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/dataTable.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" />
  </head>
  <body>
    <div class="edit-add-new">
      <div class="div">
        <div class="frame">
          <div class="frame-2">
            <div class="global-header-front">
              <div class="frame-3">
                <div class="text"><div class="text-wrapper"><a class="back-link" href="{$docRoot}org/">地区防災計画作成支援システム 自治会</a></div></div>
              </div>
            </div>
            <form class="frame-4" method="post" action="{{route('org.specific.exec')}}" enctype="multipart/form-data">
            @csrf
              <div class="sider">
                <div class="frame-5">
                  <div class="menu-logo">
                    <div class="div-2">
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="img-wrapper"><img class="icon" src="{{asset('/img/icon-5.svg')}}" /></div>
                            <div class="title-2">トップページ</div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="img-wrapper"><img class="icon-2" src="{{asset('/img/icon-17.svg')}}" /></div>
                            <div class="text-wrapper-2"><a href="{{route('org.areachar.index')}}">地区特性</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="menu">
                        <div class="parent">
                          <div class="inner-wrapper">
                            <div class="title-wrapper-2">
                              <div class="icon-wrapper-2"><img class="icon-3" src="{{asset('/img/icon-15.svg')}}" /></div>
                              <div class="title-2" id="area_menu">地区情報</div>
                            </div>
                            <div class="menu-icon-ant-menu"><img class="union" src="{{asset('/img/union-18.svg')}}" /></div>
                          </div>
                        </div>
                        <div class="submenu" id="area_submenu">
                          <div class="item">
                            <div class="div-wrapper">
                              <div class="inner-wrapper">
                                <div class="element-level-title">物資・資材の備蓄</div>
                                <div class="union-wrapper"><img class="union" src="{{asset('/img/union-18.svg')}}" /></div>
                              </div>
                            </div>
                            <div class="submenu" id="area_subsubmenu">
                                <div class="inline-menu-item"><div class="text-wrapper-2"><a href="{{route('org.stock.warehouse')}}">倉庫リスト</a></div></div>
                                <div class="inline-menu-item"><div class="element-level-title-2"><a href="{{route('org.stock.supply')}}">物資リスト</a></div></div>
                            </div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-3"><a href="{{route('org.shelter.index')}}">地区一次避難場所</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-3"><a href="{{route('org.human.index')}}">人的資源</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-3"><a href="{{route('org.contact.index')}}">連絡体制</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-3"><a href="{{route('org.emergency.index')}}">緊急連絡先</a></div></div>
                          </div>
                          <div class="element-level-title-wrapper">
                            <div class="element-nd-level-title"><a href="{{route('org.specific.index')}}">地区特有の情報</a></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-3"><a href="{{route('org.hall.index')}}">自治会館</a></div></div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="icon-wrapper-2"><img class="icon-4" src="{{asset('/img/icon-19.svg')}}" /></div>
                            <div class="title-2"><a href="{{route('org.training.index')}}">災害図上訓練コンテンツ</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="icon-wrapper-2"><img class="icon-2" src="{{asset('/img/icon-20.svg')}}" /></div>
                            <div class="text-wrapper-2"><a href="{{route('org.dpp.index')}}">地区防災計画</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="div-2">
                    <div class="inline-menu-item-top-2">
                      <div class="parent-2">
                        <div class="inner-wrapper">
                          <div class="title-wrapper-2">
                            <div class="img-wrapper"><img class="icon-2" src="{{asset('/img/icon-21.svg')}}" /></div>
                            <div class="title-3" id="master_menu">マスタ情報</div>
                          </div>
                          <div class="menu-icon-ant-menu"><img class="union" src="{{asset('/img/union-18.svg')}}" /></div>
                        </div>
                      </div>
                      <div class="submenu" id="master_submenu">
                        <div class="content-wrapper">
                            <div class="content"><div class="text-wrapper-2"><a href="{{route('org.master.supply1')}}">物資リスト 大項目</a></div></div>
                          </div>
                          <div class="content-wrapper">
                            <div class="content"><div class="element-level-title-2"><a href="{{route('org.master.supply2')}}">物資リスト 小項目</a></div></div>
                          </div>
                          <div class="content-wrapper">
                            <div class="content"><div class="text-wrapper-2"><a href="{{route('org.master.skill')}}">技能資格</a></div></div>
                          </div>
                          <div class="content-wrapper">
                            <div class="content"><div class="element-level-title-3"><a href="{{route('org.master.area')}}">地区特有情報</a></div></div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="sider-trigger">
                  <div class="inner-wrapper"><img class="menu-fold" src="{{asset('/img/menufold.svg')}}" /></div>
                </div>
              </div>
              <div class="frame-6">
                <div class="frame-7">
                  <div class="heading-left">
                    <div class="wrapper"><div class="title-4"><a href="{{route('org.specific.index')}}"><img class="arrow-left" src="{{asset('/img/arrowleft-2.svg')}}" /></a> 地区特有の情報 登録</div></div>
                  </div>
                  <button class="button-2"><div class="text-2">保存</div></button>
                </div>
                <div class="frame-8">
                  <div class="vertical-form-item">
                    <div class="label"><div class="title-5">種別</div></div>
                    <select class="select" name="type">
                      @foreach ($type as $item)
                      <option value="{{$item->id}}" @isset($data) @if ($data->type == $item->id)selected="selected"@endif @endisset>{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="vertical-form-item">
                    <div class="label"><div class="title-7">名称</div></div>
                    <input class="input" name="title" value="@isset($data){{$data->title}}@endisset" />
                  </div>
                  <div class="vertical-form-item">
                    <div class="label"><div class="title-2">説明</div></div>
                    <div class="frame-wrapper">
                      <div class="frame-wrapper">
                        <div class="frame-9">
                          <input type="file" name="file-element1" id="file-element1" accept="image/*" style="display:none" />
                          <button class="upload-picture" id="file-select1" type="button">
                            <img class="plus" src="{{asset('/img/plus-4.svg')}}" />
                            <div class="upload">画像を登録</div>
                          </button>
                          <textarea class="textarea" name="detail1">@isset($data){{$data->detail1}}@endisset</textarea>
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="frame-wrapper">
                      <div class="frame-wrapper">
                        <div class="frame-9">
                          <input type="file" name="file-element2" id="file-element2" accept="image/*" style="display:none" />
                          <button class="upload-picture" id="file-select2" type="button">
                            <img class="plus" src="{{asset('/img/plus-4.svg')}}" />
                            <div class="upload">画像を登録</div>
                          </button>
                          <textarea class="textarea" name="detail2">@isset($data){{$data->detail2}}@endisset</textarea>
                        </div>
                      </div>
                    </div>
                    <br />
                    <div class="frame-wrapper">
                      <div class="frame-wrapper">
                        <div class="frame-9">
                          <input type="file" name="file-element3" id="file-element3" accept="image/*" style="display:none" />
                          <button class="upload-picture" id="file-select3" type="button">
                            <img class="plus" src="{{asset('/img/plus-4.svg')}}" />
                            <div class="upload">画像を登録</div>
                          </button>
                          <textarea class="textarea" name="detail3">@isset($data){{$data->detail3}}@endisset</textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="vertical-form-item">
                    <div class="label"><div class="title-2">位置</div></div>
                    <input class="input" name="latlng" id="latlng" readonly value="@isset($data){{$data->latitude}},{{$data->longitude}}@endisset" />
                  </div>
                  @isset($data)
                  <iframe src="{{$url}}?lat={{$data->latitude}}&lng={{$data->longitude}}" width="1100px" height="600px"></iframe>
                  @else
                  <iframe src="{{$url}}" width="1100px" height="600px"></iframe>
                  @endisset
                </div>
              </div>
              <input type="hidden" name="mode" value="{{$mode}}" />
              </form>
            </div>
          </div>
          <div class="footer-wrapper">
            <footer class="footer"><div class="text-wrapper-4">PLATEAU by MLIT</div></footer>
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('/js/vendor/jquery-3.7.1.min.js')}}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{asset('/js/org_specific.js')}}"></script>
  </body>
</html>
