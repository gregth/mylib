//ajax validation for each field  -- validates while typing or when you unfocus a field(to cach autofill and for e-mail)
$('#username').focus(function() {
    $('#username').on('keyup change', function () {
        var val = $('#username').val();
        $.ajax({
            url: 'registerValidator.php',
            data: {'value' : val, 'field' : 1},
            type: 'POST' ,
            success: function (data) {
                $('#errors1').html(data);
            },
            error: function(data){
            }
        });

    });
});

$('#name').focus(function() {
    $('#name').on('keyup change', function () {
        var val = $('#name').val();
        $.ajax({
            url: 'registerValidator.php',
            data: {'value' : val, 'field' : 2},
            type: 'POST' ,
            success: function (data) {
                $('#errors2').html(data);
            },
            error: function(data){
            }
        });

    });
});

$('#surname').focus(function() {
    $('#surname').on('keyup change',function () {
        var val = $('#surname').val();
        $.ajax({
            url: 'registerValidator.php',
            data: {'value' : val, 'field' : 3},
            type: 'POST' ,
            success: function (data) {
                $('#errors3').html(data);
            },
            error: function(data){
            }
        });

    });
});

$('#email').focus(function() {
    $('#email').change(function () {
        var val = $('#email').val();
        $.ajax({
            url: 'registerValidator.php',
            data: {'value' : val, 'field' : 4},
            type: 'POST' ,
            success: function (data) {
                $('#errors4').html(data);
            },
            error: function(data){
            }
        });

    });
});

$('#password').focus(function() {
    $('#password').on('keyup change',function () {
        var val = $('#password').val();
        $.ajax({
            url: 'registerValidator.php',
            data: {'value' : val, 'field' : 5},
            type: 'POST' ,
            success: function (data) {
                $('#errors5').html(data);
            },
            error: function(data){
            }
        });

    });
});
// checks for empty fields
$('#regForm').submit( function(e) {
var isValid = true;
    $("form#regForm input[type=text],input[type=password]").each ( function() { 
        if ($.trim( $( this ).val( ) ) == '') {
            isValid = false;
            $('#errors6').html('Συμπληρώστε όλα τα πεδία');
        }
    });
    if (isValid == false) {
        e.preventDefault();
    }
});
