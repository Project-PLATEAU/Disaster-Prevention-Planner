$(function() {
    toolTip();
});

/**
 * ツールチップを表示する
 */
function toolTip()
{
    var dataTooltip, insertHtml;

    // ツールチップ表示処理
    $('.info-mark').click(function(e){
        e.preventDefault();         // hrefが無効になり、画面遷移が行わない

        // クリックされた要素の"data-tooltip"（ツールチップ内容）を取得
        var id = $(this).attr('value');
        switch(id) {
            case '1':
                dataTooltip = '二次避難所（福祉避難所）とは、主に高齢者や障害者など特別な配慮が必要な人々が、災害発生時に安全に避難し、生活できるよう設けられた場所です。一般的に、一次避難所（学校の体育館など）からさらに移動し、より手厚いケアを受けられる施設が二次避難所として指定されています。<br />さぬき市では、市内の要配慮者利用施設などを「福祉避難所」として開設しますが、ご自身で「二次避難所」として避難する場所（例えば、安全な近隣の身内宅など）がありましたら、『はい』とお答えください。';
                break;
            case '2':
                dataTooltip = '例えば、災害時など「家族で待ち合わせ場所を予め決めておく」や「連絡手段を決めておく」など、家族での決め事を記入してください。';
                break;
            default:
                break;
        }
        //dataTooltip = $(this).attr('data-tooltip');

        // (html最後に挿入する)ツールチップ用pタグを作成
        insertHtml = '<p class="tgToolTip">' + dataTooltip + '</p>';

        // pタグをhtmlの最後に挿入
        $('body').append(insertHtml);

        // クリックされた [?] アイコンの座標を取得
        //var position = $(this).position();
        var position = $(this).offset();
        var newPositionTop = position.top +30;      // +数値で下方向へ移動
        var newPositionLeft = position.left + 35;   // +数値で右方向へ移動

        // 出現するツールチップの位置を調整
        $(".tgToolTip").css({'top': newPositionTop + 'px', 'left': newPositionLeft + 'px'});

        // (ツールチップの非表示処理) 非表示なクリック領域を展開
        $('body').append('<p class="dummy"></p>');
    });

    // "ツールチップ以外の領域"をクリックでツールチップを隠す処理
    $('body').on('click', '.dummy', function(){
        $('p.tgToolTip').remove();
        $('p.dummy').remove();
    });
}
