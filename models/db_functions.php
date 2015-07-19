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
<<<<<<< HEAD
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
=======
        $stmt = mysqli_prepare($db,
            "INSERT INTO users SET username = ? , password = ? , salt = ? , first_name = ? , last_name = ? , email = ? ");
        mysqli_stmt_bind_param($stmt,"ssssss",$username,$passhash,$salt,$first_name,$last_name,$email);
        mysqli_stmt_execute($stmt);
        $success = mysqli_affeted_rows($db);
>>>>>>> kalimeris_mylib/master
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
        $email = $data['email'];
        $password = $data['password'];
        //getting the salt
        $stmt = mysqli_prepare($db,
            "SELECT salt FROM users WHERE email = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt,"s",$email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt,$salt);
        if (mysqli_stmt_num_rows($stmt))
        {
  //          $tmp = mysql_fetch_array($res);
    //        $salt = $tmp['salt'];
            mysqli_stmt_fetch($stmt); 
            $password = hash('sha256',"$password"."$salt");
            //adding salt to given pass hashing and checking if the resulting hash is the same as the original
<<<<<<< HEAD
            $res = mysql_query(
                "
                SELECT
                    uid
                FROM
                    users
                WHERE
                    email = '$email' AND password = '$password'
                ;"
                );
            var_dump( $email );
            if ( $res == false ) {
                return false;
            }
            else if(mysql_num_rows($res)==1)
=======
            mysqli_stmt_close($stmt);
            $stmt = mysql_query($db,
                "SELECT uid FROM users WHERE email = ? AND password = ?");
            mysqli_stmt_bind_param($stmt,"ss",$email,$password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt,$user);
            if(mysqli_stmt_num_rows($stmt))
>>>>>>> kalimeris_mylib/master
            {
                mysqli_fetch_($stmt);
                mysqli_stmt_close($stmt);
                return $user;
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
