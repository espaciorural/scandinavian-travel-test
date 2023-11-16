# scandinavian-travel-test
Technical test for Scandinavian Travel
## Prerequisites

Make sure you have the following components installed before getting started:

- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)

## Configuration

1. Clone this repository:
    git clone https://github.com/espaciorural/scandinavian-travel-test.git

2. Configure the database:

    - Create a database in MySQL.
    - Modify the `utilities/config.php` file with your database credentials.
    - Create two tables:

    CREATE TABLE `scandinavian_user` (
    `id` int(11) NOT NULL,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `address` varchar(255) NOT NULL,
    `country` varchar(255) NOT NULL,
    `state` varchar(255) NOT NULL,
    `zip` int(5) NOT NULL,
    `phone_prefix` int(2) NOT NULL,
    `phone_number` int(9) NOT NULL,
    `billing_shipping` tinyint(1) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    CREATE TABLE `scandinavian_purchases` (
    `id` int(11) NOT NULL,
    `transaction_id` varchar(255) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `status` varchar(255) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


3. Configure Rapyd
    - Modify the `utilities/rapyd.php` file with your rapyd credentials:
    1. access_key
    2. secret_key
        
    - Modify the `utilities/process.php` file with your own urls:
        complete_checkout_url
        cancel_checkout_url
        complete_payment_url
        error_payment_url
        country
        currency
        language


## Usage

1. Start the PHP server:

    php -S localhost:8000

2. Open your browser and navigate to `http://localhost:8000`.

3. For test, use this card number: 
    4462030000000000
    CVV: Any
    Exp. Date: Any future date
    Name: Any

    On the next screen you can simulate a successful or unsuccessful transaction

## Contributing

If you want to contribute to this project, follow these steps:

1. Fork the project.
2. Create a branch (`git checkout -b feature/new-feature`).
3. Make your changes and commit (`git commit -am 'Add new feature'`).
4. Push the branch (`git push origin feature/new-feature`).
5. Open a Pull Request.
