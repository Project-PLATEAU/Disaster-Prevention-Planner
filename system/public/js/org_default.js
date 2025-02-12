$(function() {
    /** 左側のメニューを制御 */
    $('#area_submenu').hide();
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
        order: [[0, "desc"]],
    });

    /** 画像をサムネイルする */
    $('#file-select').on('click', function() {
        $('#file-element').click();
    });
    $('#file-element').on('change', function() {
        var file = $(this).prop('files')[0];
        var render = new FileReader();
        render.onload = function() {
            //$('#file-select').css('background-color', 'rgba(255,0,0,0.5)');
            $('#file-select').html(file.name);
        }
        render.readAsDataURL(file);
    });
});

/**
 * 地区特性を削除する
 * @param {number} id
 */
function deleteData(id)
{
    let html = "この地区特性を本当に削除しますか？";
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
                        url: "/ddpps/org/areachar/delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "post",
                        data: {id:id},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html('地区特性を削除しました');
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
                            console.log(err);
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
 * 災害図上訓練コンテンツを削除する
 * @param {number} id
 */
function deleteTraining(id)
{
    let html = "この災害図上訓練コンテンツを本当に削除しますか？";
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
                        url: "/ddpps/org/training/delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "post",
                        data: {id:id},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html('災害図上訓練コンテンツを削除しました');
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
