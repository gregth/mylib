$( function( ) {
    var input = $( "#instant-search" );
    var r = $( ".add-book-list" );
    var prompt = $( '.prompt' );
    input.keyup( function( e ) {
        var userQuery = input.val();
        $.ajax( { 
            type: 'GET',
            dataType: 'json', 
            url: 'searchBooksJSON.php',
            data: { query: userQuery },
            success: function( response ) {
                r.empty();
                prompt.empty();
                if ( response[ 'empty' ] ) {
                    prompt.html( '<li class="list-group-item">Κανένα βιβλίο με αυτούς τους όρους αναζήτησης.<br/>' + 
                        'Δοκιμάστε άλλη αναζήτηση ή προσθέστε εσείς το βιβλίο.<br/>' + 
                        '<a href="add_book.php?red=add_book_cp">Προσθήκη στοιχείων νέου βιβλίου</a></li>'
                    );
                } 
                else { 
                    prompt.html( '<div class="list-group-item">' +
                        'Aν κανένα βιβλίο δεν αντιστοιχεί σε αυτό που ψάχνετε, προσθέστε εσείς τα στοιχεία του.' +
                        '<br/><a href="add_book.php?red=add_book_cp">Προσθήκη στοιχείων νέου βιβλίου</a></li>' 
                    );
                    $.each( response[ 'books' ], function( i, book ) {
                        var content = '<div id="books" class="panel panel-default"><h2 class="panel-heading">' + book.title + '</h2>' +
                            '<div class="row">' +
                                '<div class=" col-md-4">' + 
                                    '<div class="image-wrapper">' +
                                        '<img src="' + book.img + '" />' +
                                    '</div>' +
                                '</div>' +
                                '<div class="details col-md-8">' + 
                                    '<p class="description">' + book.description + '</p>' +
                                    '<a  class="btn btn-danger" href="book.php?bid=' + book.bid + '">Επιλογή</a>' +
                                '</div>' +
                            '</div></div>';
                        r.html( content );
                 });   
               }
            }
        });
    });
});


$( function( ) {
    var input = $( "#books-instant-search" );
    var r = $( "#books-results" );
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

                    r.html( '<li class="list-group-item">Κανένα βιβλίο με αυτούς τους όρους αναζήτησης.</li>' );
                } 
                else { 
                    $.each( response[ 'books' ], function( bid, book ) {
                        var content = '<div id="books" class="panel panel-default"><h2 class="panel-heading">' + book.title + '</h2>' +
                            '<div class="row">' +
                                '<div class=" col-md-4">' + 
                                    '<div class="image-wrapper">' +
                                        '<img src="' + book.img + '" />' +
                                    '</div>' +
                                '</div>' +
                                '<div class="details col-md-8">' + 
                                    '<p class="description">' + book.description + '</p>' +
                                    '<a  class="btn btn-default" href="book.php?bid=' + book.bid + '">Δείτε περισσότερα</a>' +
                                '</div>' +
                            '</div></div>';
                        r.html( content );
                     });   
               }
            }
        });
    });
});
