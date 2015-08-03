//on subit ajax call to update user image
var frm = $('#Form1');
    frm.submit(function (e) {
    var fd = new FormData(this);
    e.preventDefault();
    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: fd,
        processData: false,
        contentType: false,
        type: 'POST' ,
        success: function (data) {
                    $("#res1").html(data);    
        },
        error: function(data){
        }
    });
});

