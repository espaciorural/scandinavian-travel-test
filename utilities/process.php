<?php
session_start();
include 'conf.php';
$error = 0;

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor del correo electrónico del formulario
    $email = $_POST['email'];

    // Verificar si el correo electrónico ya existe en la tabla user
    $checkQuery = "SELECT * FROM user WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // El correo electrónico ya existe
        $row = mysqli_fetch_assoc($checkResult);
        $idUser = $row['id'];
    } else {
        // Obtener los demás valores del formulario
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $phonePrefix = $_POST['phonePrefix'];
        $phoneNumber = $_POST['phoneNumber'];
        $billingShipping = isset($_POST['billing-shipping']) ? 1 : 0;

        // Insertar datos en la tabla user
        $insertQuery = "INSERT INTO scandinavian_user (first_name, last_name, email, address, country, state, zip, phone_prefix, phone_number, billing_shipping)
                      VALUES ('$firstName', '$lastName', '$email', '$address', '$country', '$state', '$zip', '$phonePrefix', '$phoneNumber', '$billingShipping')";

        // Ejecutar la consulta de inserción
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            $idUser = mysqli_insert_id($conn);
        } else {
            $error = 1;
            echo "Error al insertar datos: " . mysqli_error($conn);
        }
    }

}
if ($error==0)
{
    if((int)($_POST['amount']) === 700) {
        $amount = (int)$_POST['amount'];

        // Realizar la inserción en la tabla purchases
        $insertPurchaseQuery = "INSERT INTO scandinavian_purchases (user_id, status)
                               VALUES ('$idUser', 'pending')"; // Puedes cambiar 'pending' según tus necesidades

        $insertPurchaseResult = mysqli_query($conn, $insertPurchaseQuery);

        if (!$insertPurchaseResult) {
            $error = 1;
            echo "Error al insertar datos en la tabla purchases: " . mysqli_error($conn);
        } else {
            $purchaseId = mysqli_insert_id($conn);
        }

        // Datos para Rapyd
        $cancel_checkout_url = "https://www.example.com/scandinavian-test/cancel.php";
        $complete_checkout_url = "https://www.example.com/scandinavian-test/ok.php";
        $complete_payment_url = "https://www.example.com/scandinavian-test/utilities/result_payment.php";
        $error_payment_url = "https://www.example.com/scandinavian-test/utilities/result_payment.php";
        $country = "ES";
        $currency = "EUR";
        $language = "es";

        $path = "rapyd.php";
        include($path);

        $body = [
            "amount" => $amount,
            "country" => $country,
            "currency" => $currency,
            "complete_checkout_url" => $complete_checkout_url,
            "cancel_checkout_url" => $cancel_checkout_url,
            "complete_payment_url" => $complete_payment_url,
            "error_payment_url" => $error_payment_url,
            "language" => $language,
        ];

        
        try {
            $object = make_request('post', '/v1/checkout', $body);
            if ($object) {
                $redirect_url = $object["data"]["redirect_url"];
                $transactionId  = $object["data"]["id"];
                $_SESSION["transactionId"] = $transactionId;
                $status = $object["status"]["status"];
                // Realizar la actualización en la tabla purchases
                $updatePurchaseQuery = "UPDATE scandinavian_purchases SET transaction_id = '$transactionId' WHERE id = '$purchaseId'";
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
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>