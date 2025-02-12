<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{ asset ('/css/globals_community_communication1.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/styleguide_community_communication1.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/style_community_communication1.css') }}" />
    <link rel="stylesheet" href="{{ asset ('/css/dataTable.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" />
    <meta name="csrf-token" content="{{csrf_token()}}" />
  </head>
  <body>
    <div class="screen">
      <div class="div">
        <div class="frame">
          <div class="frame-2">
            <div class="global-header-front">
              <div class="frame-3">
                <div class="text"><div class="text-wrapper"><a class="back-link" href="{{route('org.index.index')}}">地区防災計画作成支援システム 自治会</a></div></div>
              </div>
            </div>
            <div class="frame-4">
              <div class="sider">
                <div class="frame-5">
                  <div class="menu-logo">
                    <div class="div-2">
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="img-wrapper"><img class="icon" src="{{ asset ('/img/icon.svg') }}" /></div>
                            <div class="title-2"><a href="{{route('org.index.index')}}">トップページ</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="img-wrapper"><img class="icon-2" src="{{ asset ('/img/icon-12.svg') }}" /></div>
                            <div class="text-wrapper-2"><a href="{{route('org.areachar.index')}}">地区特性</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="menu">
                        <div class="parent">
                          <div class="inner-wrapper">
                            <div class="title-wrapper-2">
                              <div class="icon-wrapper-2"><img class="icon-3" src="{{ asset ('/img/icon-10.svg') }}" /></div>
                              <div class="title-2" id="area_menu">地区情報</div>
                            </div>
                            <div class="menu-icon-ant-menu"><img class="union" src="{{ asset ('/img/union-10.svg') }}" /></div>
                          </div>
                        </div>
                        <div class="submenu">
                          <div class="item">
                            <div class="div-wrapper" id="area_submenu">
                              <div class="inner-wrapper">
                                <div class="element-level-title">物資・資材の備蓄</div>
                                <div class="union-wrapper"><img class="union" src="{{ asset ('/img/union-10.svg') }}" /></div>
                              </div>
                            </div>
                            <div class="submenu" id="area_subsubmenu">
                              <div class="inline-menu-item"><div class="text-wrapper-4"><a href="{{route('org.stock.warehouse')}}">倉庫リスト</a></div></div>
                              <div class="inline-menu-item"><div class="element-level-title-2"><a href="{{route('org.stock.supply')}}">物資リスト</a></div></div>
                            </div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-3"><a href="{{route('org.shelter.index')}}">地区一次避難場所</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-3"><a href="{{route('org.human.index')}}">人的資源</a></div></div>
                          </div>
                          <div class="element-level-title-wrapper">
                            <div class="element-nd-level-title"><a href="{{route('org.contact.exec')}}">連絡体制</a></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-3"><a href="{{route('org.emergency.index')}}">緊急連絡先</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-3"><a href="{{route('org.specific.index')}}">地区特有の情報</a></div></div>
                          </div>
                          <div class="item-2">
                            <div class="inner-wrapper"><div class="text-wrapper-3"><a href="{{route('org.hall.index')}}">自治会館</a></div></div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="icon-wrapper-2"><img class="icon-4" src="{{ asset ('/img/icon-3.svg') }}" /></div>
                            <div class="title-2"><a href="{{route('org.training.index')}}">災害図上訓練コンテンツ</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="icon-wrapper-2"><img class="icon-2" src="{{ asset ('/img/icon-4.svg') }}" /></div>
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
                            <div class="img-wrapper"><img class="icon-2" src="{{ asset ('/img/icon-6.svg') }}" /></div>
                            <div class="title-3" id="master_menu">マスタ情報</div>
                          </div>
                          <div class="menu-icon-ant-menu"><img class="union" src="{{ asset ('/img/union-10.svg') }}" /></div>
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
              <div class="frame-6">
                <div class="heading-left">
                  <div class="wrapper"><div class="title-4">連絡体制</div></div>
                </div>
                <div class="table-toolbar">
                  <div class="right">
                    <div class="message-area">
                        @if (session('message'))
                        {{ session('message') }}
                        @endif
                    </div>
                    <div class="button-group">
                      <button class="button-2" onclick="location.href='{{route('org.contact.edit')}}';">
                        <div class="icon-wrapper">
                          <div class="img-wrapper"><img class="union-2" src="{{ asset ('/img/union-22.svg') }}" /></div>
                        </div>
                        <div class="text-2">編集</div>
                      </button>
                      <button class="button-2" onclick="capture();">
                        <div class="text-2">キャプチャ</div>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="div-2">
                  <div class="frame-7" id="contact-area">
                    <div class="frame-8">
                      <div class="input">
                        <div class="placeholder"><div class="placeholder-2">{{$data[1]['role']}}</div></div>
                      </div>
                      <div class="placeholder-wrapper">
                        <div class="placeholder"><div class="placeholder-2">{{$data[1]['name']}}</div></div>
                      </div>
                      <div class="input-2">
                        <div class="placeholder"><div class="placeholder-2">{{$data[1]['phone']}}</div></div>
                      </div>
                    </div>
                    <div class="frame-9">
                      <div class="frame-10">
                        <div class="frame-8">
                          <div class="input">
                            <div class="placeholder"><div class="placeholder-2">{{$data[2]['role']}}</div></div>
                          </div>
                          <div class="placeholder-wrapper">
                            <div class="placeholder"><div class="placeholder-2">{{$data[2]['name']}}</div></div>
                          </div>
                          <div class="input-2">
                            <div class="placeholder"><div class="placeholder-2">{{$data[2]['phone']}}</div></div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[8]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[8]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[11]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[11]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[9]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[9]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[12]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[12]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[10]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[10]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[13]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[13]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <img class="group" src="{{ asset ('/img/group-29-5.png') }}" />
                        <img class="group-2" src="{{ asset ('/img/group-31-5.png') }}" />
                      </div>
                      <div class="frame-10">
                        <div class="frame-8">
                          <div class="input">
                            <div class="placeholder"><div class="placeholder-2">{{$data[3]['role']}}</div></div>
                          </div>
                          <div class="placeholder-wrapper">
                            <div class="placeholder"><div class="placeholder-2">{{$data[3]['name']}}</div></div>
                          </div>
                          <div class="input-2">
                            <div class="placeholder"><div class="placeholder-2">{{$data[3]['phone']}}</div></div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[14]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[14]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[17]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[17]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[15]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[15]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[18]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[18]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[16]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[16]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[19]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[19]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <img class="group" src="{{ asset ('/img/group-29-5.png') }}" />
                        <img class="group-2" src="{{ asset ('/img/group-31-5.png') }}" />
                      </div>
                      <div class="frame-10">
                        <div class="frame-8">
                          <div class="input">
                            <div class="placeholder"><div class="placeholder-2">{{$data[4]['role']}}</div></div>
                          </div>
                          <div class="placeholder-wrapper">
                            <div class="placeholder"><div class="placeholder-2">{{$data[4]['name']}}</div></div>
                          </div>
                          <div class="input-2">
                            <div class="placeholder"><div class="placeholder-2">{{$data[4]['phone']}}</div></div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[20]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[20]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[23]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[23]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[21]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[21]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[24]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[24]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[22]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[22]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[25]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[25]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <img class="group" src="{{ asset ('/img/group-29-5.png') }}" />
                        <img class="group-2" src="{{ asset ('/img/group-31-5.png') }}" />
                      </div>
                      <div class="frame-10">
                        <div class="frame-8">
                          <div class="input">
                            <div class="placeholder"><div class="placeholder-2">{{$data[5]['role']}}</div></div>
                          </div>
                          <div class="placeholder-wrapper">
                            <div class="placeholder"><div class="placeholder-2">{{$data[5]['name']}}</div></div>
                          </div>
                          <div class="input-2">
                            <div class="placeholder"><div class="placeholder-2">{{$data[5]['phone']}}</div></div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[26]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[26]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[29]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[29]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[27]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[27]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[30]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[30]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[28]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[28]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[31]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[31]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <img class="group" src="{{ asset ('/img/group-29-5.png') }}" />
                        <img class="group-2" src="{{ asset ('/img/group-31-5.png') }}" />
                      </div>
                      <div class="frame-10">
                        <div class="frame-8">
                          <div class="input">
                            <div class="placeholder"><div class="placeholder-2">{{$data[6]['role']}}</div></div>
                          </div>
                          <div class="placeholder-wrapper">
                            <div class="placeholder"><div class="placeholder-2">{{$data[6]['name']}}</div></div>
                          </div>
                          <div class="input-2">
                            <div class="placeholder"><div class="placeholder-2">{{$data[6]['phone']}}</div></div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[32]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[32]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[35]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[35]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[33]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[33]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[36]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[36]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[34]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[34]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[37]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[37]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <img class="group" src="{{ asset ('/img/group-29-5.png') }}" />
                        <img class="group-2" src="{{ asset ('/img/group-31-5.png') }}" />
                      </div>
                      <div class="frame-10">
                        <div class="frame-8">
                          <div class="input">
                            <div class="placeholder"><div class="placeholder-2">{{$data[7]['role']}}</div></div>
                          </div>
                          <div class="placeholder-wrapper">
                            <div class="placeholder"><div class="placeholder-2">{{$data[7]['name']}}</div></div>
                          </div>
                          <div class="input-2">
                            <div class="placeholder"><div class="placeholder-2">{{$data[7]['phone']}}</div></div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[38]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[38]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[41]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[41]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[39]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[39]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[42]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[42]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <div class="frame-11">
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[40]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[40]['phone']}}</div></div>
                            </div>
                          </div>
                          <div class="div-2">
                            <div class="input-3">
                              <div class="placeholder"><div class="placeholder-2">{{$data[43]['name']}}</div></div>
                            </div>
                            <div class="input-4">
                              <div class="placeholder"><div class="placeholder-2">{{$data[43]['phone']}}</div></div>
                            </div>
                          </div>
                        </div>
                        <img class="group" src="{{ asset ('/img/group-29-5.png') }}" />
                        <img class="group-2" src="{{ asset ('/img/group-31-5.png') }}" />
                      </div>
                    </div>
                    <img class="input-input" src="{{ asset ('/img/input-input.svg') }}" />
                    <img class="input-input-2" src="{{ asset ('/img/input-input-1.svg') }}" />
                    <img class="input-input-3" src="{{ asset ('/img/input-input-2.svg') }}" />
                    <img class="input-input-4" src="{{ asset ('/img/input-input-3.svg') }}" />
                    <img class="input-input-5" src="{{ asset ('/img/input-input-4.svg') }}" />
                    <img class="input-input-6" src="{{ asset ('/img/input-input-5.svg') }}" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-wrapper">
            <footer class="footer"><div class="text-wrapper-4">PLATEAU by MLIT</div></footer>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset ('/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset ('/js/vendor/html2canvas.min.js') }}"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{ asset ('/js/org_area.js') }}"></script>
  </body>
</html>
