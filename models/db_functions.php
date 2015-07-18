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

    //function for user authentication ; returns false on failure and userid on success
    authenticate_user($data)
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        //getting the salt
        $res = mysql_query(
            "
            SELECT
               salt
            FROM
                users
            WHERE
                username = '$username'
            LIMIT
                1
            ;"

        );
        if (mysql_num_rows($res)==1)
        {
            $tmp = mysql_fetch_array($res);
            $salt = $tmp['salt'];
            $password = hash('sha256',"$password"."$salt");
            //adding salt to given pass hashing and checking if the resulting hash is the same as the original
            $res = mysql_query(
                "
                SELECT
                    userid
                FROM
                    users
                WHERE
                    username = $username AND password = $password
                ;"
                );
            if(mysql_num_rows($res)==1)
            {
                $user = mysql_fetch_array($res);
                return $user['userid'];
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false ;
        }
    }


?>
