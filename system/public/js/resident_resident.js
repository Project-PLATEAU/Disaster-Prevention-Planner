// 家族情報
var family = new Array();

// 家族人数上限
var familyMax = 10;

// 現在選択されている家族人数
var familyNow = 0;

$(function() {
    // 家族情報初期化
    for (var i = 0; i < familyMax; i++) {
        family[i] = new familyItem('', 1, 1, '');
    }

    /**
     * 家族情報が存在すればそれをセットする
     */
    if ($('#family_flag').val() == 1) {
        var familyData = $('#family').val();
        familyData = familyData.split(',');
        var count = Math.round((familyData.length) / 4);
        for (var i = 0; i < count; i++) {
            family[i]['name'] = familyData[(i * 4)];
            family[i]['attr1'] = familyData[(i * 4) + 1];
            family[i]['attr2'] = familyData[(i * 4) + 2];
            family[i]['others'] = familyData[(i * 4) + 3];
        }
    }

    /** Re:Earth Visualizerからの値を受けとる */
    window.addEventListener('message', (event) => {
        if (event.data.action === "sendBldgId") {
            var message = event.data.message;
            var gml = message.split(',');
            $('#house').val(gml[0]);
            $('#bldg_lat').val(gml[1]);
            $('#bldg_lng').val(gml[2]);
        }
    });

    /**
     * 家族の人数が変更されたとき
     */
    $('#family_num').on('change', function() {
        changeFamilyData(familyNow);
        var num = $('#family_num option:selected').val();
        createFamilyForm(num);
        familyNow = num;
    });

    /**
     * 家族の人数に応じてフォーム作成
     */
    if ($('#user_num').val() == 1) {
        familyNow = 1;
        createFamilyForm(1);
    } else {
        familyNow = $('#user_num').val();
        createFamilyForm(familyNow);
    }

    /**
     * 「次へ」ボタンがクリックされたときに、家族情報をセットする
     */
    $('#resident_form').submit(function() {
        for (var i = 0; i < familyNow; i++) {
            var str = family[i]['name'] + ',' + family[i]['attr1'] + ',' + family[i]['attr2'] + ',' + family[i]['others'];
            $('#family' + i).val(str);
        }
    });
});

/**
 * 家族情報オブジェクト
 *
 * @param {string} name
 * @param {number} attr1
 * @param {number} attr2
 * @param {string} others
 */
function familyItem(name, attr1, attr2, others) {
    this.name = name;
    this.attr1 = attr1;
    this.attr2 = attr2;
    this.others = others;
}

/**
 * 家族の人数に応じてデータを変更
 * @param {number} num
 */
function changeFamilyData(num) {
    for (var i = 0; i < num; i++) {
        family[i]['name'] = $('#family_' + i + '_name').val();
        family[i]['attr1'] = $('#family_' + i + '_type1 option:selected').val();
        family[i]['attr2'] = $('#family_' + i + '_type2 option:selected').val();
        family[i]['others'] = $('#family_' + i + '_others').val();
    }
}

/**
 * 家族の人数に応じてフォーム作成
 * @param {number} num
 */
function createFamilyForm(num) {
    var html = '';
    for (var i = 0; i < num; i++) {
        html += '<div class="frame-11"><div class="FAQ-item"><div class="div-2"><div class="frame-5"><img class="img-3" src="/ddpps/img/frame.svg" />';
        html += '<div class="category">ご家族' + (i + 1) + '</div></div><img class="img-3" src="/ddpps/img/icon-chevron-down.svg" /></div></div>';
        html += '<div class="FAQ-item-2"><div class="vertical-form-item"><div class="label"><div class="title-6">名前</div></div><div class="div-wrapper">';
        html += '<input id="family_' + i + '_name"' + ' name="family_' + i + '_name" class="placeholder-2" placeholder="名前を入力してください" type="text" value="' + family[i]['name'] + '" /></div></div>';
        html += '<div class="vertical-form-item"><div class="label"><div class="title-7">属性</div></div>';
        html += '<select id="family_' + i + '_type1" name="family_' + i + '_type1" class="select-2">';
        if (family[i]['attr1'] == 1) {
            html += '<option value="1" selected="selected">健常者</option>';
            html += '<option value="2">高齢者</option>';
            html += '<option value="3">要支援者</option>';
            html += '<option value="4">支援者</option></select></div>';
        } else if (family[i]['attr1'] == 2) {
            html += '<option value="1">健常者</option>';
            html += '<option value="2" selected="selected">高齢者</option>';
            html += '<option value="3">要支援者</option>';
            html += '<option value="4">支援者</option></select></div>';
        } else if (family[i]['attr1'] == 3) {
            html += '<option value="1">健常者</option>';
            html += '<option value="2">高齢者</option>';
            html += '<option value="3" selected="selected">要支援者</option>';
            html += '<option value="4">支援者</option></select></div>';
        } else {
            html += '<option value="1">健常者</option>';
            html += '<option value="2">高齢者</option>';
            html += '<option value="3">要支援者</option>';
            html += '<option value="4" selected="selected">支援者</option></select></div>';
        }
        html += '<div class="vertical-form-item"><div class="label"><div class="title-7">避難手段</div></div>';
        html += '<select id="family_' + i + '_type2" name="family_' + i + '_type2" class="select-2">';
        if (family[i]['attr2'] == 1) {
            html += '<option value="1" selected="selected">徒歩</option>';
            html += '<option value="2">徒歩(高齢者)</option>';
            html += '<option value="3">車</option></select></div>';
        } else if (family[i]['attr2'] == 2) {
            html += '<option value="1">徒歩</option>';
            html += '<option value="2" selected="selected">徒歩(高齢者)</option>';
            html += '<option value="3">車</option></select></div>';
        } else if (family[i]['attr2'] == 3) {
            html += '<option value="1">徒歩</option>';
            html += '<option value="2">徒歩(高齢者)</option>';
            html += '<option value="3" selected="selected">車</option></select></div>';
        }
        html += '<div class="vertical-form-item"><div class="label"><div class="title-7">自由記述</div></div>';
        html += '<textarea id="family_' + i + '_others" name="family_' + i + '_others" class="textarea" rows="5">' + family[i]['others'] + '</textarea></div></div></div>';
    }
    $('#family_form').html(html);
}
