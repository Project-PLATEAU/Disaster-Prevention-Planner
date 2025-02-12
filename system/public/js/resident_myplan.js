var family = new Array();
var familyMax = 10;
var familyNow = 0;

$(function() {
    /** DataTableを作成 */
    $('#myplan_table').DataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
        },
        lengthChange: false,
        searching: true,
        info: false,
        order: [[0, "desc"]]
    });
});

/**
 * リスク情報を削除する
 * @param {number} id
 */
function deleteReport(id)
{
    let html = "このリスク情報を本当に削除しますか？";
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
                        url: "/ddpps/resident/report/delete/",
                        type: "post",
                        data: {id:id},
                        success: function(json){
                            var result = json.result;
                            if (result == 1) {
                                $('#alert-dialog').html('リスク情報を削除しました');
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
