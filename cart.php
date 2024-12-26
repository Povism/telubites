<!-- Kelas: SI-48-INT  -->
<!-- Kelompok: 01  -->
<!--Anggota Kelompok: -->
<!-- 1. Maya Radina Putri (102022400015)  -->
<!-- 2. Nadila Naurah Rayyani Himawan (102022400145) -->
<!-- 3. Muhammad Fazshyerra Pradichwa Raksaragana (102022440006)-->
<!-- 4. Muhammad Mumtaz (102022400299) -->
<!-- 5. Naufal Ghazika Fadhlurahman (102022440016)-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telu Bites Order Summary</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #FAEED2;
            color: #333;
            font-size: 16px;
            line-height: 1;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            margin-top: -20px;
        }

        .logo h1 {
            font-size: 2rem;
            font-weight: bold;
        }

        .logo span.tel {
            color: red;
        }

        .logo span.ubites {
            color: black;
        }

        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 20px 0;
        }

        .order-item {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 10px;
            margin: 10px 0;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .order-item img {
            width: 80px;
            height: 80px;
            border-radius: 10px;
            margin-right: 15px;
            object-fit: cover;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: bold;
            font-size: 1rem;
        }

        .item-price {
            color: red;
        }

        .quantity {
            display: flex;
            align-items: center;
        }

        .quantity button {
            border: none;
            background: none;
            font-size: 1.2rem;
            margin: 0 10px;
            cursor: pointer;
        }

        .quantity .minus {
            color: red;
        }

        .quantity .plus {
            color: black;
        }

        footer {
            background: white;
            border-top: 1px solid #ccc;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .footer-container {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-section {
            display: flex;
            flex-direction: column;
            font-size: 1.3rem;
            font-weight: bold;
            padding-bottom: 10px;
            margin-bottom: -4px;
        }

        .total-section .total-amount {
            color: red;
            font-size: 1.5rem;
            margin-top: 11px;
        }

        .buttons {
            display: flex;
            gap: 10px;
        }

        .buttons button {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            color: white;
        }

        .checkout {
            background-color: red;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <div>
                <img src="Images/Logo.png" alt="UBites Logo" style="width: 150px; margin-right: 1rem;">
            </div>
            <div class="logo">
                <h1><span class="u">WELCOME TO</span> <span class="tel">TEL</span>U BITES</h1>
            </div>
            <div class="profile">
                <img src="images/admin.jpg" alt="Profile">
                <p>Student</p>
            </div>
        </header>

        <h2>Your Cart</h2>

        <?php
        $items = [
            ['name' => 'Nasi Goreng Seafood', 'price' => 23000, 'image' => 'images/NasgorSeafood.png', 'quantity' => 1],
            ['name' => 'Soursop Juice', 'price' => 14000, 'image' => 'images/Juice.png', 'quantity' => 1],
            ['name' => 'Salad', 'price' => 23000, 'image' => 'images/Salad.png', 'quantity' => 1]
        ];

        $total = 0;
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
            echo "
            <div class='order-item'>
                <img src='{$item['image']}' alt='{$item['name']}'>
                <div class='item-details'>
                    <p class='item-name'>{$item['name']}</p>
                    <p class='item-price'>Rp <span class='price' data-unit-price='{$item['price']}'>" . number_format($item['price'], 0, ',', '.') . "</span></p>
                </div>
                <div class='quantity'>
                    <button class='minus'>−</button>
                    <span class='quantity-value'>{$item['quantity']}</span>
                    <button class='plus'>+</button>
                </div>
            </div>";
        }
        ?>

        <footer>
            <div class="footer-container">
                <div class="total-section">
                    <p>Total</p>
                    <p class="total-amount">Rp <span id="total-price"><?php echo number_format($total, 0, ',', '.'); ?></span></p>
                </div>
                <div class="buttons">
                    <button onclick="window.location.href='checkout.html'" class="checkout">Check Out</button>
                </div>
            </div>
        </footer>

    </div>

    <script>
        function formatRupiah(number) {
            return number.toLocaleString('id-ID');
        }

        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.order-item').forEach(item => {
                const unitPrice = parseInt(item.querySelector('.price').dataset.unitPrice);
                const quantity = parseInt(item.querySelector('.quantity-value').textContent);
                total += unitPrice * quantity;
            });
            document.getElementById('total-price').textContent = formatRupiah(total);
        }

        document.querySelectorAll('.order-item').forEach(item => {
            const minusButton = item.querySelector('.minus');
            const plusButton = item.querySelector('.plus');
            const quantityValue = item.querySelector('.quantity-value');
            const priceElement = item.querySelector('.price');

            minusButton.addEventListener('click', () => {
                let quantity = parseInt(quantityValue.textContent);
                if (quantity > 1) {
                    quantity--;
                    quantityValue.textContent = quantity;
                    const unitPrice = parseInt(priceElement.dataset.unitPrice);
                    priceElement.textContent = formatRupiah(unitPrice * quantity);
                    updateTotal();
                }
            });

            plusButton.addEventListener('click', () => {
                let quantity = parseInt(quantityValue.textContent);
                quantity++;
                quantityValue.textContent = quantity;
                const unitPrice = parseInt(priceElement.dataset.unitPrice);
                priceElement.textContent = formatRupiah(unitPrice * quantity);
                updateTotal();
            });
        });

        updateTotal();
    </script>
</body>
</html>
