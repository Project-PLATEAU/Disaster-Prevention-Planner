$(function() {
    /** Re:Earth Visualizerからの値を受けとる */
    window.addEventListener('message', (event) => {
        console.log(event);
        if (event.data.action === "sendImage") {
            var message = event.data.message;
            $('#image').val(message);
            $('#message-area').html('スクリーンショットを取得しました');
        }
    });
});
