// leafletオブジェクト
let leafletMap;

// ベース地図
let baseMap;

// マーカー
let marker = null;

// 地図種別
const mapTYpe = [
    'https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png',
    'https://cyberjapandata.gsi.go.jp/xyz/pale/{z}/{x}/{y}.png',
    'https://cyberjapandata.gsi.go.jp/xyz/blank/{z}/{x}/{y}.png',
    'https://cyberjapandata.gsi.go.jp/xyz/seamlessphoto/{z}/{x}/{y}.jpg'
];

$(function() {
    /** ボタンでFileを制御 */
    $('#file-select1').on('click', function() {
        $('#file-element1').click();
    });
    $('#file-select2').on('click', function() {
        $('#file-element2').click();
    });
    $('#file-select3').on('click', function() {
        $('#file-element3').click();
    });

    /** Re:Earth Visualizerからの値を受けとる */
    window.addEventListener('message', (event) => {
        if (event.data.action === "sendPosition") {
            var message = event.data.message;
            $('#latlng').val(message);
        }
    });

    $('#file-element1').on('change', function() {
        var file = $(this).prop('files')[0];
        var render = new FileReader();
        render.onload = function() {
            $('#file-select1').css('background-image', 'url(' + render.result + ')');
        }
        render.readAsDataURL(file);
    });
    $('#file-element2').on('change', function() {
        var file = $(this).prop('files')[0];
        var render = new FileReader();
        render.onload = function() {
            $('#file-select2').css('background-image', 'url(' + render.result + ')');
        }
        render.readAsDataURL(file);
    });
    $('#file-element3').on('change', function() {
        var file = $(this).prop('files')[0];
        var render = new FileReader();
        render.onload = function() {
            $('#file-select3').css('background-image', 'url(' + render.result + ')');
        }
        render.readAsDataURL(file);
    });

    leafletMap = L.map('map').setView([34.2379852, 134.2349951], 18);    // 日本を中心に設定

    var attr = '<a href="https://maps.gsi.go.jp/development/ichiran.html" target="_blank">地理院タイル</a>'; //備考
    var std = L.tileLayer(mapTYpe[0], {attribution: attr, maxZoom: 20});
    var pale = L.tileLayer(mapTYpe[1], {attribution: attr, maxZoom: 20});
    var blank = L.tileLayer(mapTYpe[2], {attribution: attr, maxZoom: 20});
    var seamlessphoto = L.tileLayer(mapTYpe[3], {attribution: attr, maxZoom: 18});

    baseMap = {
        '写真' : seamlessphoto,
        '淡色地図' : pale,
        '標準地図' : std,
        '白地図' : blank,
    };

    /** 地図の種別を選択できるSelectを作成 */
    var mapSelect = L.control({ position: "topright" });
    mapSelect.onAdd = function(leafletMap) {
        this.ele = L.DomUtil.create('select');
        this.ele.id = 'selectBaseMap';
        return this.ele;
    };
    mapSelect.addTo(leafletMap);
    var sel = document.getElementById('selectBaseMap');
    sel.setAttribute('onchange', "baseLayerChange()");
    for (var key in baseMap) {
        var opt = L.DomUtil.create('option', '', sel);
        opt.value = key;
        opt.innerText = key;
    }
    baseLayerChange();

    // 現在地ボタン作成
    let mapButton = L.control({position: "topleft"});
    mapButton.onAdd = function(leafletMap) {
        this.ele = L.DomUtil.create('input');
        this.ele.id = 'now-button';
        this.ele.type = 'button';
        return this.ele;
    };
    mapButton.addTo(leafletMap);

    $('#now-button').on('click', function(e) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setPosition);
        }
    });

    /** 地図クリック時 */
    leafletMap.on('click', function(e) {
        if (e.containerPoint.x <= 50 && e.containerPoint.y <= 125) {
            return;
        }
        $('#latlng').val(e.latlng.lat + "," + e.latlng.lng);
        if (marker != null) {
            leafletMap.removeLayer(marker);
        }
        marker = L.marker(e.latlng).addTo(leafletMap);
    });

    let pos = $('#latlng').val().split(',');
    if (pos.length == 2) {
        marker = L.marker([pos[0], pos[1]]).addTo(leafletMap);
    }
});

/**
 * 表示されるベース地図を変更
 */
function baseLayerChange()
{
    for (var key in baseMap) {
        if (leafletMap.hasLayer(baseMap[key]) == true) {
            leafletMap.removeLayer(baseMap[key]);
        }
    }
    var sel = document.getElementById('selectBaseMap');
    var selTile = sel.options[sel.selectedIndex].value;
    baseMap[selTile].addTo(leafletMap);
}

/**
 * 指定された位置に移動
 * @param {array} position
 */
function setPosition(position)
{
    let lat = position.coords.latitude;
    let lng = position.coords.longitude;

    $('#latlng').val(lat + "," + lng);
    leafletMap.setView([lat, lng], 18);
}

/**
 * 現在位置を取得
 */
function getLocation()
{
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(setPosition);
    }
}
