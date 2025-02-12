$(function() {
    /** 左側のメニューを制御 */
    //$('#area_submenu').hide();
    //$('#area_subsubmenu').hide();
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

    /** Selectボックスを制御 */
    var children_default = $('#item_master');
    var original = children_default.html();
    $('#type_master').on('change', function() {
        var children = $("#item_master");
        var val1 = $(this).val();
        children.html(original).find('option').each(function() {
            var val2 = $(this).data('val');
            if (val1 != val2) {
                $(this).remove();
            }
        });
        if ($(this).val() === '') {
            children.attr('disabled', 'disabled');
        } else {
            children.removeAttr('disabled');
        }
    });

    let mode = $('#mode').val();
    if (mode == 'update') {
        let typeId = $('#material_type_master_id').val();
        let itemId = $('#material_item_master_id').val();

        $('#type_master').val(typeId).trigger('change');
        $('#item_master').val(itemId);
    } else {
        $('#type_master').trigger('change');
    }
});

/**
 * 倉庫に備蓄されている情報を表示する
 * @param {number} id
 */
function showData(id)
{
    var options = {
        url: "/ddpps/org/stock/ajax/",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        type: "post",
        data: {id:id},
        success: function(json){
            var result = json.result;
            if (result == 1) {
                let data = json.data;
                let html = '<table class="base-table"><tr><th>品名</th><th>数量</th></tr>';
                data.forEach(function(item){
                    const tr = '<tr><td>' + item.name + '</td><td class="amount">' + item.amount + '</td></tr>';
                    html += tr;
                });
                html += '</table>';
                $('#base-dialog').html(html);
                $('#base-dialog').dialog({
                    'title': "物資一覧",
                    'width': 800,
                    'height': 800,
                    buttons: [
                        {
                            text: "OK",
                            class: 'dialog-button',
                            click: function() {
                                $(this).dialog('close');
                            }
                        }
                    ]
                });
            }
        },
        error: function(err){
        }
    };
    $.ajax(options);
}

/**
 * 倉庫を削除する
 * @param {number} id
 */
function deleteData(id)
{
    let html = "この倉庫を本当に削除しますか？";
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
                        url: "/ddpps/org/stock/delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "post",
                        data: {id:id},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html('倉庫を削除しました');
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
 * 物資を削除する
 * @param {number} id
 */
function deleteData2(id)
{
    let html = "この物資を本当に削除しますか？";
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
                        url: "/ddpps/org/stock/delete2",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "post",
                        data: {id:id},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html('物資を削除しました');
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
