<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>地区防災計画作成支援システム</title>
    <link rel="stylesheet" href="{{asset('/css/globals_community_communication2.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/styleguide_community_communication2.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/style_community_communication2.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/dataTable.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css" />
  </head>
  <body>
    <div class="screen">
      <div class="div">
        <div class="frame">
          <div class="frame-2">
            <div class="global-header-front">
              <div class="frame-3">
                <div class="text"><div class="text-wrapper"><a class="back-link" href="{{route('org.index.index')}}">さぬき市自治会</a></div></div>
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
                            <div class="img-wrapper"><img class="icon" src="{{asset('/img/icon.svg')}}" /></div>
                            <div class="title-2"><a href="{{route('org.index.index')}}">トップページ</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="img-wrapper"><img class="icon-2" src="{{asset('/img/icon-12.svg')}}" /></div>
                            <div class="text-wrapper-2"><a href="{{route('org.areachar.index')}}">地区特性</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="menu">
                        <div class="parent">
                          <div class="inner-wrapper">
                            <div class="title-wrapper-2">
                              <div class="icon-wrapper-2"><img class="icon-3" src="{{asset('/img/icon-10.svg')}}" /></div>
                              <div class="title-2" id="area_menu">地区情報</div>
                            </div>
                            <div class="menu-icon-ant-menu"><img class="union" src="{{asset('/img/union-10.svg')}}" /></div>
                          </div>
                        </div>
                        <div class="submenu">
                          <div class="item">
                            <div class="div-wrapper" id="area_submenu">
                              <div class="inner-wrapper">
                                <div class="element-level-title">物資・資材の備蓄</div>
                                <div class="union-wrapper"><img class="union" src="{{asset('/img/union-10.svg')}}" /></div>
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
                          <div class="element-level-title-wrapper">
                            <div class="element-nd-level-title"><a href="{{route('org.contact.index')}}">連絡体制</a></div>
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
                            <div class="icon-wrapper-2"><img class="icon-4" src="{{asset('/img/icon-3.svg')}}" /></div>
                            <div class="title-2"><a href="{{route('org.training.index')}}">災害図上訓練コンテンツ</a></div>
                          </div>
                        </div>
                      </div>
                      <div class="inline-menu-item-top">
                        <div class="inner-wrapper">
                          <div class="title-wrapper">
                            <div class="icon-wrapper-2"><img class="icon-2" src="{{asset('/img/icon-4.svg')}}" /></div>
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
                            <div class="img-wrapper"><img class="icon-2" src="{{asset('/img/icon-6.svg')}}" /></div>
                            <div class="title-3" id="master_menu">マスタ情報</div>
                          </div>
                          <div class="menu-icon-ant-menu"><img class="union" src="{{asset('/img/union-10.svg')}}" /></div>
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
              </div>
              <div class="frame-6">
                <form method="post" action="{{route('org.contact.exec')}}">
                @csrf
                <div class="frame-7">
                  <div class="heading-left">
                    <div class="wrapper"><div class="title-4"><a href="{{route('org.contact.index')}}"><img class="arrow-left" src="{{asset('/img/arrowleft-2.svg')}}" /></a> 連絡体制 登録</div></div>
                  </div>
                  <button class="button-2"><div class="text-2">保存</div></button>
                </div>
                <div class="div-2">
                  <div class="frame-8">
                    <div class="frame-9">
                      <input class="input" name="title1" value="{{$data[1]['role']}}" />
                      <input class="placeholder-wrapper" name="name1" value="{{$data[1]['name']}}" />
                      <input class="input-2" name="phone1" value="{{$data[1]['phone']}}" />
                    </div>
                    <div class="frame-10">
                      <div class="frame-11">
                        <div class="frame-9">
                          <input class="input" name="title2" value="{{$data[2]['role']}}" />
                          <input class="placeholder-wrapper" name="name2" value="{{$data[2]['name']}}" />
                          <input class="input-2" name="phone2" value="{{$data[2]['phone']}}"  />
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name8" value="{{$data[8]['name']}}" />
                            <input class="input-4" name="phone8" value="{{$data[8]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name11" value="{{$data[11]['name']}}" />
                            <input class="input-4" name="phone11" value="{{$data[11]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name9" value="{{$data[9]['name']}}" />
                            <input class="input-4" name="phone9" value="{{$data[9]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name12" value="{{$data[12]['name']}}" />
                            <input class="input-4" name="phone12" value="{{$data[12]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name10" value="{{$data[10]['name']}}" />
                            <input class="input-4" name="phone10" value="{{$data[10]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name13" value="{{$data[13]['name']}}" />
                            <input class="input-4" name="phone13" value="{{$data[13]['phone']}}"  />
                          </div>
                        </div>
                        <img class="group" src="{{asset('/img/group-29-5.png')}}" />
                        <img class="group-2" src="{{asset('/img/group-31-5.png')}}" />
                      </div>
                      <div class="frame-11">
                        <div class="frame-9">
                          <input class="input" name="title3" value="{{$data[3]['role']}}" />
                          <input class="placeholder-wrapper" name="name3" value="{{$data[3]['name']}}" />
                          <input class="input-2" name="phone3" value="{{$data[3]['phone']}}" />
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name14" value="{{$data[14]['name']}}" />
                            <input class="input-4" name="phone14" value="{{$data[14]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name17" value="{{$data[17]['name']}}" />
                            <input class="input-4" name="phone17" value="{{$data[17]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name15" value="{{$data[15]['name']}}" />
                            <input class="input-4" name="phone15" value="{{$data[15]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name18" value="{{$data[18]['name']}}" />
                            <input class="input-4" name="phone18" value="{{$data[18]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name16" value="{{$data[16]['name']}}" />
                            <input class="input-4" name="phone16" value="{{$data[16]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name19" value="{{$data[19]['name']}}" />
                            <input class="input-4" name="phone19" value="{{$data[19]['phone']}}"  />
                          </div>
                        </div>
                        <img class="group" src="{{asset('/img/group-29-5.png')}}" />
                        <img class="group-2" src="{{asset('/img/group-31-5.png')}}" />
                      </div>
                      <div class="frame-11">
                        <div class="frame-9">
                          <input class="input" name="title4" value="{{$data[4]['role']}}" />
                          <input class="placeholder-wrapper" name="name4" value="{{$data[4]['name']}}" />
                          <input class="input-2" name="phone4" value="{{$data[4]['phone']}}" />
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name20" value="{{$data[20]['name']}}" />
                            <input class="input-4" name="phone20" value="{{$data[20]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name23" value="{{$data[23]['name']}}" />
                            <input class="input-4" name="phone23" value="{{$data[23]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name21" value="{{$data[21]['name']}}" />
                            <input class="input-4" name="phone21" value="{{$data[21]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name24" value="{{$data[24]['name']}}" />
                            <input class="input-4" name="phone24" value="{{$data[24]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name22" value="{{$data[22]['name']}}" />
                            <input class="input-4" name="phone22" value="{{$data[22]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name25" value="{{$data[25]['name']}}" />
                            <input class="input-4" name="phone25" value="{{$data[25]['phone']}}"  />
                          </div>
                        </div>
                        <img class="group" src="{{asset('/img/group-29-5.png')}}" />
                        <img class="group-2" src="{{asset('/img/group-31-5.png')}}" />
                      </div>
                      <div class="frame-11">
                        <div class="frame-9">
                          <input class="input" name="title5" value="{{$data[5]['role']}}" />
                          <input class="placeholder-wrapper" name="name5" value="{{$data[5]['name']}}" />
                          <input class="input-2" name="phone5" value="{{$data[5]['phone']}}" />
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name26" value="{{$data[26]['name']}}" />
                            <input class="input-4" name="phone26" value="{{$data[26]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name29" value="{{$data[29]['name']}}" />
                            <input class="input-4" name="phone29" value="{{$data[29]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name27" value="{{$data[27]['name']}}" />
                            <input class="input-4" name="phone27" value="{{$data[27]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name30" value="{{$data[30]['name']}}" />
                            <input class="input-4" name="phone30" value="{{$data[30]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name28" value="{{$data[28]['name']}}" />
                            <input class="input-4" name="phone28" value="{{$data[28]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name31" value="{{$data[31]['name']}}" />
                            <input class="input-4" name="phone31" value="{{$data[31]['phone']}}"  />
                          </div>
                        </div>
                        <img class="group" src="{{asset('/img/group-29-5.png')}}" />
                        <img class="group-2" src="{{asset('/img/group-31-5.png')}}" />
                      </div>
                      <div class="frame-11">
                        <div class="frame-9">
                          <input class="input" name="title6" value="{{$data[6]['role']}}" />
                          <input class="placeholder-wrapper" name="name6" value="{{$data[6]['name']}}" />
                          <input class="input-2" name="phone6" value="{{$data[6]['phone']}}" />
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name32" value="{{$data[32]['name']}}" />
                            <input class="input-4" name="phone32" value="{{$data[32]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name35" value="{{$data[35]['name']}}" />
                            <input class="input-4" name="phone35" value="{{$data[35]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name33" value="{{$data[33]['name']}}" />
                            <input class="input-4" name="phone33" value="{{$data[33]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name36" value="{{$data[36]['name']}}" />
                            <input class="input-4" name="phone36" value="{{$data[36]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name34" value="{{$data[34]['name']}}" />
                            <input class="input-4" name="phone34" value="{{$data[34]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name37" value="{{$data[37]['name']}}" />
                            <input class="input-4" name="phone37" value="{{$data[37]['phone']}}"  />
                          </div>
                        </div>
                        <img class="group" src="{{asset('/img/group-29-5.png')}}" />
                        <img class="group-2" src="{{asset('/img/group-31-5.png')}}" />
                      </div>
                      <div class="frame-11">
                        <div class="frame-9">
                          <input class="input" name="title7" value="{{$data[7]['role']}}" />
                          <input class="placeholder-wrapper" name="name7" value="{{$data[7]['name']}}" />
                          <input class="input-2" name="phone7" value="{{$data[7]['phone']}}" />
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name38" value="{{$data[38]['name']}}" />
                            <input class="input-4" name="phone38" value="{{$data[38]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name41" value="{{$data[41]['name']}}" />
                            <input class="input-4" name="phone41" value="{{$data[41]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name39" value="{{$data[39]['name']}}" />
                            <input class="input-4" name="phone39" value="{{$data[39]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name42" value="{{$data[42]['name']}}" />
                            <input class="input-4" name="phone42" value="{{$data[42]['phone']}}"  />
                          </div>
                        </div>
                        <div class="frame-12">
                          <div class="div-2">
                            <input class="input-3" name="name40" value="{{$data[40]['name']}}" />
                            <input class="input-4" name="phone40" value="{{$data[40]['phone']}}"  />
                          </div>
                          <div class="div-2">
                            <input class="input-3" name="name43" value="{{$data[43]['name']}}" />
                            <input class="input-4" name="phone43" value="{{$data[43]['phone']}}"  />
                          </div>
                        </div>
                        <img class="group" src="{{asset('/img/group-29-5.png')}}" />
                        <img class="group-2" src="{{asset('/img/group-31-5.png')}}" />
                      </div>
                    </div>
                    <img class="input-input" src="{{asset('/img/input-input.svg')}}" />
                    <img class="input-input-2" src="{{asset('/img/input-input-1.svg')}}" />
                    <img class="input-input-3" src="{{asset('/img/input-input-2.svg')}}" />
                    <img class="input-input-4" src="{{asset('/img/input-input-3.svg')}}" />
                    <img class="input-input-5" src="{{asset('/img/input-input-4.svg')}}" />
                    <img class="input-input-6" src="{{asset('/img/input-input-5.svg')}}" />
                  </div>
                </div>
                </form>
              </div>
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
    <script src="{{asset('/js/org_area.js')}}"></script>
  </body>
</html>
