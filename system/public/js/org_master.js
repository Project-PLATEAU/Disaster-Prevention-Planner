$(function() {
    /** 左側のメニューを制御 */
    $('#area_submenu').hide();
    $('#area_subsubmenu').hide();
    //$('#master_submenu').hide();

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
});

/**
 * 各種情報を削除
 *
 * modeによってどの情報を削除するかを指定
 * 1:物資リスト大項目
 * 2:物資リスト小項目
 * 3:技能資格
 * 4:地区特有
 *
 * @param {number} mode
 * @param {number} id
 */
function deleteData(mode, id)
{
    let html = '';
    let html2 = '';
    if (mode == 1) {
        html = "この物資リスト大項目を本当に削除しますか？";
        html2 = "物資リスト大項目を削除しました";
    } else if (mode == 2) {
        html = "この物資リスト小項目を本当に削除しますか？";
        html2 = "物資リスト小項目を削除しました";
    } else if (mode == 3) {
        html = "この技能資格を本当に削除しますか？";
        html2 = "技能資格を削除しました";
    } else if (mode == 4) {
        html = "この地区特有情報を本当に削除しますか？";
        html2 = "地区特有情報を削除しました";
    }

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
                        url: "/ddpps/org/master/delete",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        type: "post",
                        data: {id:id, mode:mode},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html(html2);
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
