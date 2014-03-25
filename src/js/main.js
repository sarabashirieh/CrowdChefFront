$(document).ready(function() {

$(".add").click(function() {
    var child = $('#field').clone(true);
    child = $(child);
    console.log(child);
    child.find(':nth-child(1)').val("");
    child.find(':nth-child(2)').val("");
    child.find(':nth-child(3)').val("");
    child.insertAfter('#field');
    //console.log($bla);
    return false;
});

$(".remove").click(function() {
    $(this).parent().remove();
});

$("#form_id").live('submit',function(){
    if($(this).find('#username').val()==''){
        alert('username cant left empty!!');
        return false;
    }
});
$("#fancyform").live('submit', function(){
    $(this).find('#fields').val();
});


});


