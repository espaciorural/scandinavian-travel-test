<?php

include 'conf.php';

function getUserDataFromTransactionId($transactionId)
{
    global $conn;

    // Consultar datos del usuario asociado al ID de compra
    $query = "SELECT u.* FROM scandinavian_user u
              INNER JOIN scandinavian_purchases p ON u.id = p.user_id
              WHERE p.transaction_id = '$transactionId'";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }

    return null;
}

function getTransactions() {

    global $conn;

    $query = "SELECT purchases.id, purchases.transaction_id, users.first_name, users.last_name, purchases.status, purchases.created_at
          FROM scandinavian_purchases AS purchases
          INNER JOIN scandinavian_user AS users ON purchases.user_id = users.id";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    return null;

}

function getStatusClass($status) {
    switch ($status) {
        case 'CLO':
            return 'table-success'; 
        case 'ERR':
            return 'table-danger';  
        default:
            return '';       
    }
}

function getStatusText($status) {
    switch ($status) {
        case 'CLO':
            return 'SUCCESS'; 
        case 'ERR':
            return 'ERROR';   
        default:
            return $status;  
    }
}


?>