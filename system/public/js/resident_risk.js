$(function() {
    /** Re:Earth Visualizerからの値を受けとる */
    window.addEventListener('message', (event) => {
        if (event.data.action === "sendImage") {
            var message = event.data.message;
            $('#risk-image').val(message);
            $('#message-area').html('スクリーンショットを取得しました');
        }
    });
});
