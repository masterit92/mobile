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
});