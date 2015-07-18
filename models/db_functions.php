<?php
    //user functions
    include 'connect.php';

    //inserts user info into the database
    function  register_user($data)
    {
        $username = $data['username'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $hash = hash_fun($data['password']); //hash with salt at the end
        list($passhash,$salt) = explode("^",$hash);
        $success = mysql_query(
            "
            INSERT INTO
                users
            SET
                username = '$username',
                password = '$passhash',
                salt = '$salt',
                firstname = '$first_name',
                lastname = '$last_name',
                email = '$email'
            ;"
        );
        return $success;
    };

    //function used for hashing passwords
    function hash_fun($pass)
    {
        $salt = md5(time());
        $pass .=$salt ;
        $hash = hash('sha256', "$pass");
        return $hash.'^'.$salt;
    };

    //function for user authentication ; returns false on failure and userid on success
    function authenticate_user($data)
    {
        $username = $data['username'];
        $password = $data['password'];
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
                    uid
                FROM
                    users
                WHERE
                    username = $username AND password = $password
                ;"
                );
            if(mysql_num_rows($res)==1)
            {
                $user = mysql_fetch_array($res);
                return $user['uid'];
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
