$( function( ) {
    var input = $( "#instant-search" );
    var r = $( "#books" );
    input.keyup( function( e ) {
        var userQuery = input.val();
        $.ajax( { 
            type: 'GET',
            dataType: 'json', 
            url: 'searchBooksJSON.php',
            data: { query: userQuery },
            success: function( response ) {
                r.empty();
                if ( response[ 'empty' ] ) {

                    r.html( '<li class="list-group-item">Κανένα βιβλίο με αυτούς τους όρους αναζήτησης. <br/> Δοκιμάστε άλλη αναζήτηση ή προσθέστε εσείς το βιβλίο.<br/><a href="add_book.php?red=add_book_cp">Προσθήκη στοιχείων νέου βιβλίου</a></li>'
                    );
                } 
                else { 
                    r.append( '<li class="list-group-item">Aν κανένα βιβλίο δεν αντιστοιχεί σε αυτό που ψάχνετε, προσθέστε εσείς τα στοιχεία του.<br/> <a href="add_book.php?red=add_book_cp">Προσθήκη στοιχείων νέου βιβλίου</a></li>' );
                    $.each( response[ 'books' ], function( i, book ) {
                        r.append( 
                            '<li class="list-group-item">' +
                                '<div class="row">' +
                                    '<div class="card col-md-4">' +
                                        '<img src="' + book[ 'img' ] +  '"/>' +
                                    '</div>' +                                                                                                                             
                                    '<div class="details col-md-8">' +
                                        '<h2>' + book[ 'title' ] + '</h2>' +
                                        '<p class="description">' + book[ 'description' ]  + '</p>' +
                                        '<a href="add_book_cp.php?bid=' + book[ 'bid' ] + '</a>' +
                                    '</div>' +
                                '</div>' +
                            '</li>'
                        );
                 });   
               }
            }
        });
    });
});
