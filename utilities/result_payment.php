<?php
session_start();
include 'conf.php';
$transactionId = $_SESSION["transactionId"];

$path = "rapyd.php";
include($path);

try {
    $object = make_request('get', '/v1/checkout/'.$transactionId);
    if ($object) {
        $redirect_url = $object["data"]["redirect_url"];
        $status = $object["data"]["payment"]["status"];
        // Realizar la actualización en la tabla purchases
        $updatePurchaseQuery = "UPDATE scandinavian_purchases SET status = '$status' WHERE transaction_id = '$transactionId'";
        $updatePurchaseResult = mysqli_query($conn, $updatePurchaseQuery);

        if (!$updatePurchaseResult) {
            $error = 1;
            echo "Error al actualizar el estado en la tabla purchases: " . mysqli_error($conn);
        }
        header("Location: $redirect_url");
        exit();
    } else {
        echo "La respuesta de la API es nula";
    }
} catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}