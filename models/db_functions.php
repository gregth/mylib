//user funtions
// may have syntax errors chekicng to do
<?php
    include 'connect.php';

    //inserts user info into the database
    register_user($data)
    {
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $POST['last_name'];
        $email = $POST['email'];
        $hash = hash_fun($_POST['password']); //hash with salt at the end
        list($passhash,$salt) = explode("^",$hash);
        $success = mysql_query(
            "
            INSERT INTO
                users
            SET
                username = '$username',
                password = '$passhash',
                salt = '$salt',
                first_name = '$first_name',
                last_name = '$last_name',
                email = '$email'
            ;"
        );
        return $success;
    };

    //function used for hashing passwords
    hash_fun($pass)
    {
        $salt = md5(time());
        $pass .=$salt ;
        $hash = hash('sha256', "$pass");
        return $hash.'^'.$salt;
    };
