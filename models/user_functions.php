<?php
    //Retur fail if it fails registering the user, otherwise returns the user id
    require 'image_upload.php';
    function  register_user($data)
    {
        global $db;
        $username = $data['username'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $path = imageUpload( 'data/profile_imgs/', 'profileimg' );
        $hash = hash_fun($data['password']); //hash with salt at the end
        list($passhash,$salt) = explode("^",$hash);
        $stmt = mysqli_prepare($db,
            "INSERT INTO users SET username = ? , password = ? , salt = ? , firstname = ? , lastname = ? , email = ?, profileimg = ? ");
        mysqli_stmt_bind_param($stmt,"sssssss",$username,$passhash,$salt,$first_name,$last_name,$email, $path );
        mysqli_stmt_execute($stmt);
        if ( mysqli_affected_rows($db) != 1 ) {
            return false;
        }
        else {
            return mysqli_insert_id( $db );
        }
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
        global $db;
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
            mysqli_stmt_fetch($stmt);
            $password = hash('sha256',"$password"."$salt");
            //adding salt to given pass hashing and checking if the resulting hash is the same as the original
            mysqli_stmt_close($stmt);
            $stmt = mysqli_prepare($db,
                "SELECT uid, username, email FROM users WHERE email = ? AND password = ?");
            mysqli_stmt_bind_param($stmt,"ss",$email,$password);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt, $uid, $username, $email);
            if(mysqli_stmt_num_rows($stmt))
            {
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
                $user = [ 'userid' => $uid, 'username' => $username, 'email' => $email ];
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
    // collects user data an returns them  in array form
    function getUserData ( $uid ) {
        global $db;
        $stmt = mysqli_prepare($db,
            "SELECT username , firstname , lastname , email, profileimg FROM users WHERE uid = ? LIMIT 1");
        mysqli_stmt_bind_param( $stmt, "s", $uid  );
        mysqli_stmt_execute( $stmt);
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt , $username, $firstname, $lastname, $email, $img );
        if ( mysqli_stmt_fetch($stmt) == NULL ) {
            return false;
        }
        $retData = [ 'userid' => $uid, 'username' => $username, 'firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'img' => $img ];
        return $retData;
    }

?>
