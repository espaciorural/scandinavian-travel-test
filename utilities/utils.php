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


?>