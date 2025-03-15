<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            display: flex;
            justify-content: space-between;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .form-section, .summary-section {
            width: 48%;
            text-align: left;
        }
        h2 {
            font-size: 22px;
            color: #333;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .input-group input, .input-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-group input.error-border {
            border: 1px solid red;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background: #000;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #444;
        }
        .order-summary {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
        }
        .order-summary img {
            width: 70px;
            height: 70px;
            margin-right: 10px;
            border-radius: 5px;
        }
        .error {
            color: red;
            font-size: 14px;
        }
    </style> 
</head>
<body>
    <h1>Checkout</h1>
    <div class="container">
        <div class="form-section">
            <h2>Billing Details</h2>
            <form id="checkoutForm">
                <div class="input-group">
                    <label>Customer Name:</label>
                    <input type="text" id="customerName">
                    <span class="error" id="nameError"></span>
                </div>
                <div class="input-group">
                    <label>Order Date:</label>
                    <input type="date" id="orderDate">
                    <span class="error" id="dateError"></span>
                </div>
                <div class="input-group">
                    <label>Phone Number:</label>
                    <input type="text" id="phoneNumber">
                    <span class="error" id="phoneError"></span>
                </div>
                <div class="input-group">
                    <label>Address:</label>
                    <input type="text" id="address">
                    <span class="error" id="addressError"></span>
                </div>
                <div class="input-group">
                    <label>Delivery Type:</label>
                    <select id="deliveryType">
                        <option value="">Select Delivery Type</option>
                        <option value="Home Delivery">Home Delivery</option>
                        <option value="Pickup">Pickup</option>
                    </select>
                    <span class="error" id="deliveryError"></span>
                </div>
                <div class="input-group">
                    <label>Payment Type:</label>
                    <select id="paymentType">
                        <option value="">Select Payment Type</option>
                        <option value="COD">Cash on Delivery</option>
                        <option value="Card">Card Payment</option>
                    </select>
                    <span class="error" id="paymentError"></span>
                </div>
                <button type="button" class="btn" onclick="validateForm()">Place Order</button>
            </form>
        </div>
        <div class="summary-section">
            <h2>Order Summary</h2>
            <div class="order-summary">
                <p><img src="product.jpg" alt="Product"> Product Name</p>
                <p>Price: $50</p>
                <p>Quantity: 2</p>
                <p>Total: $100</p>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            let isValid = true;
            document.querySelectorAll('.error').forEach(el => el.innerText = "");
            document.querySelectorAll('.input-group input').forEach(el => el.classList.remove('error-border'));
            let name = document.getElementById("customerName").value.trim();
            let phone = document.getElementById("phoneNumber").value.trim();
            let phoneRegex = /^[0-9]{10}$/;
            if (name === "") {
                document.getElementById("nameError").innerText = "Enter a valid name";
                isValid = false;
            }
            if (!phoneRegex.test(phone)) {
                document.getElementById("phoneError").innerText = "Enter a valid 10-digit phone number";
                isValid = false;
            }
            if (isValid) {
                showAlert();
            }
        }
        // Custom SweetAlert Function
function showAlert() {
    Swal.fire({
        title: "Order Placed Successfully!",
        text: "Your order has been successfully placed. Redirecting to payment...",
        icon: "success",
        confirmButtonText: "OK"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "payment.php";
        }
    });
}

    </script>
</body>
</html>
