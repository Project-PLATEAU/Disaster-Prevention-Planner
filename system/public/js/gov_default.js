$(function() {
    // DataTableを作成
    $('#dataTable').dataTable({
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
        },
        lengthChange: false,
        searching: true,
        info: false,
    });
});
