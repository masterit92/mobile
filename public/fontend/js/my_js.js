$(function () {
    $('.event_back').click(function () {
        history.go(-10);
    });
    $('.event_sort_name').click(function () {
        var sort_name = $(this).attr('sort');
        var url = url_root + 'product/sort';
        $('#container').load(url, {'sort_name': sort_name});
    });
    $('.event_sort_price').click(function () {
        var sort_price = $(this).attr('sort');
        var url = url_root +'product/sort';
        $('#container').load(url, {'sort_price': sort_price});
    });
    $('.event_page').click(function () {
        var page = $(this).attr('id');
        page = parseInt(page) + 1;
        var url = url_root +'product/filter';
        $('#container').load(url, {'page': page});
    });
    $('.event_del_filter').click(function () {
        var filter = $(this).attr('filter');
        var url =  url_root + 'product/delete_filter';
        $('#container').load(url, {'filter': filter});
    });

    $("#slider-range").slider({
        change: function (event, ui) {
            var price_rang = $("#amount").val();
            var url = url_root +'product/price_rang';
            $('#container').load(url, {'price_rang': price_rang});
        }});
    $('.event_makers').click(function () {
        var m_id_check = get_arr_check(arr_m_id);
        var url =url_root +'product/makers';
        $('#container').load(url, {'arr_m_id': m_id_check});
    });
});
function get_arr_check(arr_m_id) {
    arr_check = new Array();
    k = 0;
    for (i = 0; i < arr_m_id.length; i++) {
        element = "#makerid_" + arr_m_id[i];
        if ($(element).is(':checked')) {
            arr_check[k] = arr_m_id[i];
            k++;
        }
    }
    if (arr_check.length) {
        return  arr_check;
    } else {
        return 'NULL';
    }
}
