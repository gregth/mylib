<nav class="navbar navbar-default navbar-fixed-top" >
    <div class="wrapper container" >
        <ul class="nav navbar-nav">
            <li>
                <a href="index.php" >Αρχική</a>
            </li>
            <li>
                <a href="book.php" >Βιβλία</a>
            </li>
            <li>
                <form class="navbar-form navbar-left" action="book_search.php" method="post" enctype="multipart/form-data">
                    <input type ="text" name = "userQuery" class="form-control" placeholder = "Αναζήτηση">
                </form>
            </li>
        </ul>
        <div class=" navbar-right dropdown">
            <div><a href="add_book_cp.php" class="btn btn-danger" role="button">Προσθήκη Βιβλίου</a></div><?php
            if ( isset( $_SESSION[ 'userid' ] ) ) {
                ?>
                <div>
                    <button class="bar-btn btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><?php
                        echo $_SESSION[ 'username' ];
                        ?><span class="caret"> </span>
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
                </div><?php
            }
            else {
                ?><div class="btn-group">
                    <a type="button" class="btn btn-success" href="login.php" >Σύνδεση</a>
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="register.php">Εγγραφή</a></li>
                    </ul>
                </div><?php
            }
        ?></div>
    </div>
</nav>
