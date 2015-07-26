<?php

    //Use: Specify an array with keys, an the function will return an array with the values of GET varaivle with mentioned keys, if they are not empty
    function fetchGetParamsByKeys( $keys ) {
        $results = [];
        foreach ( $keys as $key ) {
            if ( !empty ( $_GET[ $key ] ) )
                $results[ $key ] = $_GET[ $key ];
        }
        return $results;
    }

    //$getParamsKeys: An optionall array, specifying the string keys of the values of  GET variable  thath should be in the returned url
    //If user specifies the same key in params, then get value will be replaced
    function createUrl( $base, $params = [], $getParamsKeys = [] ) {
        $getParams = fetchGetParamsByKeys( $getParamsKeys );
        $finalParams = array_merge( $getParams, $params );
        $url = $base . '?';
        foreach ( $finalParams as $key => $value ) {
            $url .= $key . '=' . $value . '&';
        }
        //Trim last &
        $url = rtrim( $url, "&" );
        return $url;

    }

    //Redirects to a specified page depending on the value of $_GET[ 'ref' ]. If no $_GET[ redirects to $deafult path.
    //Specidy an array with params to be appended at the end of the redirection url
    //case = 'noref'
    function redirect( $path, $params = [], $getParamsKeys = [], $case = 'noref' ) {

        //If user has specified a custom path for redirection
        if ( $case == 'force' ) {
            $path = createUrl( $path, $params, $getParamsKeys );
            header( 'Location: ' . $path );
            die();
        }
        //If ref is set at current page, you know where you should redirect
        if ( isset( $_GET[ 'ref' ] )  ) {
            switch ( $_GET[ 'ref' ] ) {
                case 'add_book':
                    $getParamsKeys[] = 'authors';
                    $path = createUrl( 'add_book.php', $params, $getParamsKeys );
                    break;
                case 'add_book_cp':
                    $getParamsKeys[] = 'bid';
                    $path = createUrl( 'add_book_cp.php', $params, $getParamsKeys );
                    break;
                case 'profile':
                    array_push( $getParamsKeys, 'uid' );
                    $path = createUrl( 'profiler.php', $params, $getParamsKeys );
                    break;
                default:
                    $path = createUrl( $path, $params, $getParamsKeys );
            }
            header( 'Location: ' . $path );
            die();
        }
        $path = createUrl( $path, $params, $getParamsKeys );
        header( 'Location: ' . $path );
        die();
    }
?>


