<nav class="navbar navbar-default navbar-fixed-top" >
    <div class="wrapper container" >
        <ul class="nav navbar-nav">
            <li>
                <a href="index.php" ><span class="glyphicon glyphicon-home" area-hidden="true"></span> Αρχική</a>
            </li>
            <li>
                <a href="book.php" ><span class="glyphicon glyphicon-book"></span> Βιβλία</a>
            </li>
            <li>
                <form class="navbar-form navbar-left" action="book_search.php" method="post" enctype="multipart/form-data">
                    <input type ="text" name = "userQuery" class="form-control" placeholder = "Αναζήτηση">
                </form>
            </li>
        </ul><?php
            if ( isset( $_SESSION[ 'userid' ] ) ) {
                ?>
                <ul class="navbar-nav navbar-right dropdown">
                    <button class="bar-btn btn btn-danger dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php
                        echo $_SESSION[ 'username' ];
                        ?><span class="caret"></span>
                    </button>
                    <ul class=" dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="activity.php">Δραστηριότητα</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="profiler.php?uid=<?php
                             echo $_SESSION[ 'userid'  ];
                             ?>">Προφίλ</a>
                        </li>
                        <li><a href="logout.php">Αποσύνδεση</a></li>
                     </ul>
                </ul><?php
            }
            else {
                ?><li id="login"><a href="login.php">Σύνδεση / Εγγραφή</a></li><?php
            }
        ?></ul>
    </div>
</nav>
