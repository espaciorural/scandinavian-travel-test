<?php
session_start();
include 'utilities/utils.php';
$transactionId = $_SESSION["transactionId"];
$userData = getUserDataFromTransactionId($transactionId);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Scandinavian Travel Test</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Google Fonts - Inter -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <!-- Archivo CSS personalizado para la prueba -->
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="container mt-3">
        <h1 class="text-center primary">Yes, you’ve successfully ordered!</h1>
        <p class="text-center">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.
        </p>
        <!-- Pasos de compra -->
        <div class="step-container">
            <ul class="step d-flex flex-nowrap">
                <li class="step-item">
                    <a href="#!" class="">Your Details</a>
                </li>
                <li class="step-item">
                    <a href="#!" class="">Payment</a>
                </li>
                <li class="step-item active">
                    <a href="#!" class="">Confirmation</a>
                </li>
            </ul>
        </div>

        <div class="info-container">
            <div class="row h-100 pt-70">
                <div class="col-md-12">
                    <img src="assets/background-check.png" alt="Background Image" class="background-image">
                    <img src="assets/check-icon.png" alt="Check Icon" class="overlay-image">
                </div>
            </div>
            <div class="row mt-100">
                <div class="col-md-12">
                    <h2 class="text-center">Thanks a lot for putting up this order, <?=$userData['first_name']?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Your order <b><?=$transactionId?></b> has successfully been placed. You’ll fin all the details about your order below, and we’ll send you an email with more information. In the meantime, you can view our blog to learn more about Iceland.
                    </p>
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-md-12">
                    <p class="text-center">
                        Questions? Suggestions? <br />
                        <b>Shoot us an email.</b>
                    </p>
                </div>
            </div>
            <div class="row mt-10 order-info">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-10 mb-3 title">
                            Order Review
                        </div>
                        <div class="col-2 mb-3 text-right">
                            <i id="deployment-summary" class="fa-solid fa-arrow-down button"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mb-3">
                            Tesla Model 3
                        </div>
                        <div class="col-3 mb-3 text-right">
                            $ 700
                        </div>
                    </div>
                </div>
            </div>
            <div id="summary" class="row mt-10 order-info">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-10 mb-3 title">
                            Check out Summary
                        </div>
                        <div class="col-2 mb-3 text-right">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mb-3">
                            Subtotal
                        </div>
                        <div class="col-3 mb-3 text-right">
                            $ 685
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mb-3">
                            Discount
                        </div>
                        <div class="col-3 mb-3 text-right">
                            $ --
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mb-3">
                            Extra fee
                        </div>
                        <div class="col-3 mb-3 text-right">
                            $ 12
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mb-3">
                            Tax
                        </div>
                        <div class="col-3 mb-3 text-right">
                            $ 3,03
                        </div>
                    </div>
                    <div class="row line">
                        <div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9 mb-3 title">
                            Total
                        </div>
                        <div class="col-3 mb-3 text-right title">
                            $ 700
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-10">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-block">View Our Blog</button>
                </div>
            </div>
            <div class="row mt-20">
                <div class="col-md-12 text-center">
                    <img src="assets/logo.png" alt="Logo" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

            <!-- jQuery y Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            <!-- Tu código jQuery para la interacción y envío del formulario iría aquí -->
            <script>
                $(document).ready(function() {
                    $('#summary').hide();
                    $('#deployment-summary').click(function() {
                        $('#summary').slideToggle('slow');
                        $(this).toggleClass('fa-arrow-down fa-arrow-up');
                    });
                });
            </script>

</body>

</html>