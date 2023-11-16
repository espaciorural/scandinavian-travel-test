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
    <h1 class="text-center primary">Prueba de Development</h1>
    <p class="text-center">
        Proceso de checkout integrado con Rapyd en su modo de test.<br />
        La información colectada debe ser guardada en una base de datos.
    </p>
    <!-- Pasos de compra -->
    <div class="step-container">
        <ul class="step d-flex flex-nowrap">
            <li class="step-item active">
                <a href="#!" class="">Your Details</a>
            </li>
            <li class="step-item">
                <a href="#!" class="">Payment</a>
            </li>
            <li class="step-item">
                <a href="#!" class="">Confirmation</a>
            </li>
        </ul> 
    </div>

    <div class="form-container">
        <form id="formularioCompra" action="utilities/process.php" method="POST">
            <h2 class="mb-4">Billing Address</h2>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First Name:</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="lastName">Last Name:</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="prepend input-group-text"><i class="fa-regular fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="input-group-append">
                        <span class="input-group-text append"><i id="emailIcon" class=""></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Street Address:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="country">Country:</label>
                    <select class="form-control" id="country" name="country" required>
                        <option value="spain">Spain</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="state">State:</label>
                    <select class="form-control" id="state" name="state" required>
                        <option value="madrid">Madrid</option>
                        <option value="asturias">Asturias</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="zip">Zip / Postal Code:</label>
                    <select class="form-control" id="zip" name="zip" required>
                        <option value="29600">29600</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone">Phone number:</label>
                    <div class="input-group">
                        <select class="custom-select col-3" id="phonePrefix" name="phonePrefix" required>
                            <option value="1">US</option>
                            <option value="44">UK</option>
                            <option value="34">ES</option>
                        </select>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="input-group">
                    <div class="ml-1 mt-2">
                        <input type="checkbox" id="billing-shipping" name="billing-shipping">
                    </div>
                    <div class="ml-2 text-checkbox">
                        <label class="form-check-label" for="billing-shipping">
                            My billing and shipping address are the same
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-row mt-4">
                <!-- Columna para la imagen del logo -->
                <div class="col-md-4 mb-3">
                    <img src="assets/logo.png" alt="Logo" class="img-fluid">
                </div>
                <!-- Columna para el botón "Pay Now" -->
                <div class="col-md-8 mb-3">
                    <input type="hidden" name="amount" value="700">
                    <button type="submit" class="btn btn-primary btn-block">Pay Now <i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Tu código jQuery para la interacción y envío del formulario iría aquí -->
<script>
    $(document).ready(function () {
        $('#email').on('input', function () {
            validateEmail();
        });
    });

    function validateEmail() {
        var emailInput = $('#email');
        var icon = $('#emailIcon');

        // Expresión regular para validar el formato de correo electrónico
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(emailInput.val())) {
            // Formato de correo válido, muestra el ícono de éxito
            icon.removeClass().addClass('fa fa-check text-success');
        } else {
            // Formato de correo no válido, muestra el ícono de error
            icon.removeClass().addClass('fa fa-times text-danger');
        }
    }
</script>

</body>
</html>
