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
            //$('#file-select1').css('background-image', 'url(' + render.result + ')');
            $('#file-select1').html(file.name);
        }
        render.readAsDataURL(file);
    });
    $('#file-element2').on('change', function() {
        var file = $(this).prop('files')[0];
        var render = new FileReader();
        render.onload = function() {
            //$('#file-select2').css('background-image', 'url(' + render.result + ')');
            $('#file-select2').html(file.name);
        }
        render.readAsDataURL(file);
    });
    $('#file-element3').on('change', function() {
        var file = $(this).prop('files')[0];
        var render = new FileReader();
        render.onload = function() {
            //$('#file-select3').css('background-image', 'url(' + render.result + ')');
            $('#file-select3').html(file.name);
        }
        render.readAsDataURL(file);
    });
});
