$(function (){
//    event delete
    $('.event_delete').click(function (){
        return confirm('You want to delete!');
    });
    //event go  back
    $('.event_back').click(function (){
        history.go(-1);
    });
    // validate
    $('#input_form').validate();
    $('.event_page').click(function () {
        var page = $(this).attr('id');
        page = parseInt(page) + 1;
        var url= url_root + 'admin/product/index';
        $('.container-right').load(url, {'page': page});

    });
});