Αποτελέσματα Αναζήτησης :
<ul class = "searhResults">
<?php
    if( $searchResults ) {
        foreach( $searchResults as $res ){
            echo '<li class="bookSearchResults">';
            echo "$res";
            echo '</li>';

        }
    }
    else {
        echo '<li class = "noResult">No books found</li>';
    }
?>
</ul>
