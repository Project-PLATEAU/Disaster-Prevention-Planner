$(function() {
    /** Re:Earth Visualizerからの値を受けとる */
    window.addEventListener('message', (event) => {
        console.log(event);
        if (event.data.action === "sendImage") {
            var message = event.data.message;
            $('#image').val(message);
            $('#message-area').html('スクリーンショットを取得しました');
        } else if (event.data.action === "sendRoute") {
            var message = event.data.message;
            $('#departure').val(message.departure_bldgId);
            $('#stopover').val(message.stopover_bldgId);
            $('#destination').val(message.destination_bldgId);
        }
    });
});
