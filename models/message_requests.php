<?php
    function getRequests( $senterId,  $receiverId ) {
        global $db;
        $query =
            'SELECT
                transactions.uid,
                transactions.bcid,
                transactions.state,
                transactions.time,
                bcopies.bcid
            FROM
               transactions CROSS
               JOIN bcopies ON bcopies.bcid = transactions.bcid
            WHERE
                transactions.uid = ? AND
                bcopies.uid = ? AND
                transactions.state = "request"
            ORDER BY
                transactions.time DESC
            ';
        $stmt = mysqli_prepare( $db, $query );
        mysqli_stmt_bind_param( $stmt, 'ii', $senterId, $receiverId );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt, $uid, $bcid, $state, $time, $bcid );
        $requests = [];
        while ( mysqli_stmt_fetch( $stmt ) ) {
            $request[ 'uid' ] = $uid;
            $request[ 'bcid' ] = $bcid;
            $request[ 'state' ] = $state;
            $request[ 'time' ] = $time;
            $request[ 'bcid' ] = $bcid;
            $requests[] = $request;
        }
        return $requests;

    }
?>
