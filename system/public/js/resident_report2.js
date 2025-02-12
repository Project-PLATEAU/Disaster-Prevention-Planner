$(function() {
    $('#file-select1').on('click', function() {
        $('#file-element1').click();
    });
    $('#file-select2').on('click', function() {
        $('#file-element2').click();
    });
    $('#file-select3').on('click', function() {
        $('#file-element3').click();
    });

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
});