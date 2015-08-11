<?php
    if ( !empty( $errors ) ) {
        ?><div class="row">
            <div class="col-md-7">
                <div class="panel alert warning-alert ">
                    <ul class="errors"><?php
                        foreach( $errors as $error ) {
                            ?><li><?php
                            echo $error
                            ?></li> <?php
                        }
                    ?></ul>
                </div>
            </div>
        </div><?php
    }
?>
