$('.typeahead').typeahead( {
    hint: true,
    highlight: true,
    minLength: 1
},
{
    name: 'states',
    source: function (query, syncResults, asyncResults) {
        $.ajax({
            type: 'POST',
            url: 'searchjs.php',
            data: { 'q' : query } ,
            //processData: false,
            //contentType: false
            dataType: 'json',
            success: function ( data ) {
                var obj = data
                var matches = []
                for (var i=0; i<obj.length; i++) {
                    matches[i] = obj[i].title;
                }
                console.log(matches)
                asyncResults(matches);
            },
            error: function(data){
            }
        });

    }
});

