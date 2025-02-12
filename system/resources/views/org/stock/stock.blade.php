<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{asset('/css/globals_community_characteristics3.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/styleguide_community_characteristics3.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/style_community_characteristics3.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="{{asset('/css/dataTable.css')}}" />
    <title>地区防災計画作成支援システム</title>
  </head>
  <body>
    <div class="edit-add-new">
      <div class="div">
        <div class="frame">
          <div class="frame-2">
            <div class="global-header-front">
              <div class="frame-3">
                <div class="text"><div class="text-wrapper"><a class="back-link" href="{{route('org.index.index')}}">地区防災計画作成支援システム 自治会</a></div></div>
              </div>
            </div>
            <form class="frame-4" method="post" action="{{route('org.stock.exec')}}">
            @csrf
              <div class="sider">
                <div class="frame-5">
                  <div class="menu-logo">
                    <div class="div-2">
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="img-wrapper"><img class="icon" src="{{asset('/img/icon-15.svg')}}" /></div>
                            <div class="text-wrapper-2"><a href="{{route('org.index.index')}}">トップページ</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="img-wrapper"><img class="icon-2" src="{{asset('/img/icon-16.svg')}}" /></div>
                            <div class="title-3"><a href="{{route('org.areachar.index')}}">地区特性</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="menu">
                        <div class="parent">
                          <div class="inner-wrapper">
                            <div class="title-wrapper-2">
                              <div class="icon-wrapper-2"><img class="icon-3" src="{{asset('/img/icon-17.svg')}}" /></div>
                              <div class="text-wrapper-2" id="area_menu">地区情報</div>
                            </div>
                            <div class="menu-icon-ant-menu"><img class="union" src="{{asset('/img/union-21.svg')}}" /></div>
                          </div>
                        </div>
                        <div class="submenu" id="area_submenu">
                          <div class="item">
                            <div class="parent-2">
                              <div class="inner-wrapper">
                                <div class="element-level-title">物資・資材の備蓄</div>
                                <div class="union-wrapper"><img class="union" src="{{asset('/img/union-21.svg')}}" /></div>
                              </div>
                            </div>
                            <div class="submenu" id="area_subsubmenu">
                              <div class="active-menu-3"><div class="text-wrapper-4"><a href="{{route('org.stock.warehouse')}}">倉庫リスト</a></div></div>
                              <div class="inline-menu-item"><div class="element-level-title-2"><a href="{{route('org.stock.supply')}}">物資リスト</a></div></div>
                            </div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-5"><a href="{{route('org.shelter.index')}}">地区一次避難場所</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-5"><a href="{{route('org.human.index')}}">人的資源</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-5"><a href="{{route('org.contact.index')}}">連絡体制</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-5"><a href="{{route('org.emergency.index')}}">緊急連絡先</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-5"><a href="{{route('org.specific.index')}}">地区特有の情報</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-5"><a href="{{route('org.hall.index')}}">自治会館</a></div></div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="icon-wrapper-2"><img class="icon-4" src="{{asset('/img/icon-18.svg')}}" /></div>
                            <div class="text-wrapper-2"><a href="{{route('org.training.index')}}">災害図上訓練コンテンツ</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="icon-wrapper-2"><img class="icon-2" src="{{asset('/img/icon-19.svg')}}" /></div>
                            <div class="text-wrapper-4"><a href="{{route('org.dpp.index')}}">地区防災計画</a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="div-2">
                    <div class="inline-menu-item-top-2">
                      <div class="parent-3">
                        <div class="inner-wrapper">
                          <div class="title-wrapper-2">
                            <div class="img-wrapper"><img class="icon-2" src="{{asset('/img/icon-20.svg')}}" /></div>
                            <div class="text-wrapper-2" id="master_menu">マスタ情報</div>
                          </div>
                          <div class="menu-icon-ant-menu"><img class="union" src="{{asset('/img/union-21.svg')}}" /></div>
                        </div>
                      </div>
                      <div class="submenu" id="master_submenu">
                        <div class="content-wrapper">
                          <div class="content"><div class="text-wrapper-4"><a href="{{route('org.master.supply1')}}">物資リスト 大項目</a></div></div>
                        </div>
                        <div class="content-wrapper">
                          <div class="content"><div class="element-level-title-2"><a href="{{route('org.master.supply2')}}">物資リスト 小項目</a></div></div>
                        </div>
                        <div class="content-wrapper">
                          <div class="content"><div class="text-wrapper-4"><a href="{{route('org.master.skill')}}">技能資格</a></div></div>
                        </div>
                        <div class="content-wrapper">
                          <div class="content"><div class="element-nd-level-title"><a href="{{route('org.master.area')}}">地区特有情報</a></div></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <input type="hidden" name="mode" value="{$mode}" />
              <div class="frame-6">
                <div class="frame-7">
                  <div class="heading-left">
                    <div class="wrapper">
                      <div class="title-5">
                        <a href="{{route('org.stock.warehouse')}}"><img class="arrow-left" src="{{asset('/img/arrowleft-2.svg')}}" /></a>
                        倉庫 登録
                      </div>
                    </div>
                  </div>
                  <button class="button-2"><div class="text-2">保存</div></button>
                </div>
                <div class="frame-8">
                  <div class="vertical-form-item">
                    <div class="label"><div class="title-6">名称</div></div>
                    <div class="input-div-wrapper">
                    <input id="name" name="name" class="input-text" placeholder="名称を入力してください" type="text" value="@isset($data){{$data->name}}@endisset" />
                    </div>
                    <br />
                    <div class="label"><div class="title-6">建物ID</div></div>
                    <div class="input-div-wrapper">
                    <input id="bldgId" name="bldgId" class="input-text" readonly type="text" value="@isset($data){{$data->bldg_id}}@endisset" />
                    <input type="hidden" id="bldgLat" name="bldgLat" value="@isset($data){{$data->latitude}}@endisset" />
                    <input type="hidden" id="bldgLng" name="bldgLng" value="@isset($data){{$data->longitude}}@endisset" />
                    <input type="hidden" name="mode" value="{{$mode}}" />
                    <input type="hidden" name="id" value="@isset($data){{$data->id}}@endisset" />
                    </div>
                  </div>
                </div>
                @if (isset($data))
                <iframe src="{{$url}}?bldgId={{$data->bldg_id}}&bldgLat={{$data->latitude}}&bldgLng={{$data->longitude}}" width="1100px" height="600px"></iframe>
                @else
                <iframe src="{{$url}}" width="1100px" height="600px"></iframe>
                @endif
              </div>
            </form>
          </div>
          <div class="footer-wrapper">
            <footer class="footer"><div class="text-wrapper-4">PLATEAU by MLIT</div></footer>
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('/js/vendor/jquery-3.7.1.min.js')}}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{asset('/js/org_item.js')}}"></script>
  </body>
</html>
