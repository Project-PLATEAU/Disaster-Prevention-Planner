$(function() {
    /** 左側のメニューを制御 */
    //$('#area_submenu').hide();
    $('#area_subsubmenu').hide();
    $('#master_submenu').hide();

    $('#area_menu').on('click', function() {
        $('#area_submenu').slideToggle();
    });
    $('#area_submenu').on('click', function() {
        $('#area_subsubmenu').slideToggle();
    });
    $('#master_menu').on('click', function() {
        $('#master_submenu').slideToggle();
    });

    /** DataTableを作成 */
    $('#dataTable').dataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
        },
        lengthChange: false,
        searching: true,
        info: false,
    });

    $('#file-select').on('click', function() {
        $('#file-element').click();
    });

    /** Re:Earth Visualizerからの値を受けとる */
    window.addEventListener('message', (event) => {
        if (event.data.action === "sendBldgId") {
            var message = event.data.message;
            var gml = message.split(',');
            $('#bldgId').val(gml[0]);
            $('#bldgLat').val(gml[1]);
            $('#bldgLng').val(gml[2]);
        }
    });

});

/**
 * 連絡体制の画面キャプチャを取得し、Ajaxで送信する
 */
function capture()
{
    html2canvas(document.querySelector("#contact-area"), {}).then(canvas => {
        let dataUrlScheme = canvas.toDataURL();
        var options = {
            url: "/ddpps/org/contact/capture",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: "post",
            data: {image:dataUrlScheme},
            success: function(json){
                var result = json.result;
                if (result == 1) {
                    location.reload();
                }
            },
            error: function(err){
                console.log(err);
            }
        };
        $.ajax(options);
    });
}

/**
 * 地区一次避難場所を削除する
 * @param {number} id
 */
function deleteShelter(id)
{
    let html = "この地区一次避難場所を本当に削除しますか？";
    $('#base-dialog').html(html);

    $('#base-dialog').dialog({
        'title': "削除",
        'width': 400,
        'height': 200,
        buttons: [
            {
                text: "削除する",
                class: 'dialog-button',
                click: function() {
                    var options = {
                        url: "/ddpps/org/shelter/delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "post",
                        data: {id:id},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html('地区一次避難場所を削除しました');
                                $('#alert-dialog').dialog({
                                    'title': "削除",
                                    'width': 400,
                                    'height': 200,
                                    buttons: [
                                        {
                                            text: "OK",
                                            class: 'dialog-button',
                                            click: function() {
                                                $(this).dialog('close');
                                                location.reload();
                                            }
                                        },
                                    ]
                                });
                            }
                        },
                        error: function(err){
                        }
                    };
                    $.ajax(options);
                    $(this).dialog('close');
                }
            },
            {
                text: "キャンセル",
                class: 'dialog-button',
                click: function() {
                    $(this).dialog('close');
                }
            },
        ]
    });
}

/**
 * 人的資源を削除する
 * @param {number} id
 */
function deleteHuman(id)
{
    let html = "この人的資源を本当に削除しますか？";
    $('#base-dialog').html(html);

    $('#base-dialog').dialog({
        'title': "削除",
        'width': 400,
        'height': 200,
        buttons: [
            {
                text: "削除する",
                class: 'dialog-button',
                click: function() {
                    var options = {
                        url: "/ddpps/org/human/delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "post",
                        data: {id:id},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html('人的資源を削除しました');
                                $('#alert-dialog').dialog({
                                    'title': "削除",
                                    'width': 400,
                                    'height': 200,
                                    buttons: [
                                        {
                                            text: "OK",
                                            class: 'dialog-button',
                                            click: function() {
                                                $(this).dialog('close');
                                                location.reload();
                                            }
                                        },
                                    ]
                                });
                            }
                        },
                        error: function(err){
                        }
                    };
                    $.ajax(options);
                    $(this).dialog('close');
                }
            },
            {
                text: "キャンセル",
                class: 'dialog-button',
                click: function() {
                    $(this).dialog('close');
                }
            },
        ]
    });
}

/**
 * 緊急連絡先を削除する
 * @param {number} id
 */
function deleteEmergency(id)
{
    let html = "この緊急連絡先を本当に削除しますか？";
    $('#base-dialog').html(html);

    $('#base-dialog').dialog({
        'title': "削除",
        'width': 400,
        'height': 200,
        buttons: [
            {
                text: "削除する",
                class: 'dialog-button',
                click: function() {
                    var options = {
                        url: "/ddpps/org/emergency/delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "post",
                        data: {id:id},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html('緊急連絡先を削除しました');
                                $('#alert-dialog').dialog({
                                    'title': "削除",
                                    'width': 400,
                                    'height': 200,
                                    buttons: [
                                        {
                                            text: "OK",
                                            class: 'dialog-button',
                                            click: function() {
                                                $(this).dialog('close');
                                                location.reload();
                                            }
                                        },
                                    ]
                                });
                            }
                        },
                        error: function(err){
                        }
                    };
                    $.ajax(options);
                    $(this).dialog('close');
                }
            },
            {
                text: "キャンセル",
                class: 'dialog-button',
                click: function() {
                    $(this).dialog('close');
                }
            },
        ]
    });
}

/**
 * 地区特有の情報を削除する
 * @param {number} id
 */
function deleteSpecific(id)
{
    let html = "この地区特有の情報を本当に削除しますか？";
    $('#base-dialog').html(html);

    $('#base-dialog').dialog({
        'title': "削除",
        'width': 400,
        'height': 200,
        buttons: [
            {
                text: "削除する",
                class: 'dialog-button',
                click: function() {
                    var options = {
                        url: "/ddpps/org/specific/delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "post",
                        data: {id:id},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html('地区特有の情報を削除しました');
                                $('#alert-dialog').dialog({
                                    'title': "削除",
                                    'width': 400,
                                    'height': 200,
                                    buttons: [
                                        {
                                            text: "OK",
                                            class: 'dialog-button',
                                            click: function() {
                                                $(this).dialog('close');
                                                location.reload();
                                            }
                                        },
                                    ]
                                });
                            }
                        },
                        error: function(err){
                        }
                    };
                    $.ajax(options);
                    $(this).dialog('close');
                }
            },
            {
                text: "キャンセル",
                class: 'dialog-button',
                click: function() {
                    $(this).dialog('close');
                }
            },
        ]
    });
}

/**
 * 自治会館を削除する
 * @param {number} id
 */
function deleteHall(id)
{
    let html = "この自治会館を本当に削除しますか？";
    $('#base-dialog').html(html);

    $('#base-dialog').dialog({
        'title': "削除",
        'width': 400,
        'height': 200,
        buttons: [
            {
                text: "削除する",
                class: 'dialog-button',
                click: function() {
                    var options = {
                        url: "/ddpps/org/hall/delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "post",
                        data: {id:id},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html('自治会館の情報を削除しました');
                                $('#alert-dialog').dialog({
                                    'title': "削除",
                                    'width': 400,
                                    'height': 200,
                                    buttons: [
                                        {
                                            text: "OK",
                                            class: 'dialog-button',
                                            click: function() {
                                                $(this).dialog('close');
                                                location.reload();
                                            }
                                        },
                                    ]
                                });
                            }
                        },
                        error: function(err){
                        }
                    };
                    $.ajax(options);
                    $(this).dialog('close');
                }
            },
            {
                text: "キャンセル",
                class: 'dialog-button',
                click: function() {
                    $(this).dialog('close');
                }
            },
        ]
    });
}
