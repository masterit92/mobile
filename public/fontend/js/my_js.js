$(function() {
    $('.event_back').click(function() {
        history.go(-1);
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
