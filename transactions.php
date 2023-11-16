<?php
session_start();
include 'utilities/utils.php';
$transactions = getTransactions();
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

    <!-- dataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <!-- Archivo CSS personalizado para la prueba -->
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="container mt-3" style="max-width:100%">
        <h1 class="text-center primary">Transactions</h1>
        <p class="text-center">
            List of transactions
        </p>

        <div class="info-container" style="max-width:100%">

            <div class="row">
                <div class="col-md-12">
                    <table id="transactionsTable" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Transaction ID</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($transactions as $transaction) : ?>
                            <tr>
                                <td><?= $transaction['id'] ?></td>
                                <td><?= $transaction['transaction_id'] ?></td>
                                <td><?= $transaction['first_name'] ?> <?= $transaction['last_name'] ?></td>
                                <td class="<?= getStatusClass($transaction['status']) ?>"><?= getStatusText($transaction['status']) ?></td>
                                <td><?= $transaction['created_at'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

            <!-- Tu código jQuery para la interacción y envío del formulario iría aquí -->
            <script>
                $(document).ready(function() {
                    $('#transactionsTable').DataTable();
                });
            </script>

</body>

</html>