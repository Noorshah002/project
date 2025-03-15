<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            width: 800px; /* Adjusted width */
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            position: relative;
        }

        .card {
            background: black; /* Card color changed to black */
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 340px; /* ATM card width */
            height: 214px; /* ATM card height */
            margin-right: 20px; /* Space between card and form */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            top: 20px; /* Card position adjusted slightly down */
        }

        .card h2 {
            margin: 0;
            font-size: 24px;
        }

        .card p {
            margin: 10px 0;
            font-size: 18px;
        }

        .card .chip {
            width: 50px;
            height: 40px;
            background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/EMV_chip.svg/1200px-EMV_chip.svg.png') no-repeat center;
            background-size: contain;
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .card .bank-logo {
            width: 60px;
            height: 40px;
            background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Habib_Bank_Logo.svg/1280px-Habib_Bank_Logo.svg.png') no-repeat center;
            background-size: contain;
            position: absolute;
            bottom: px;
            right: 20px;
        }

        .payment-details {
            width: 60%; /* Form takes the remaining space */
        }

        .payment-details h3 {
            margin-bottom: 10px;
            font-size: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .input-group input, .input-group select {
            width: 90%; /* Reduced width */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .input-group select {
            width: 43%; /* Adjusted width for select fields */
            display: inline-block;
        }

        .input-group select:first-child {
            margin-right: 4%;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            background: black;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .btn.cancel {
            background: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Premium Card -->
    <div class="card">
        <div class="chip"></div>
        <h2>PREMIUM</h2>
        <p id="cardNumberDisplay">1234 5678 9012 3456</p>
        <p id="cardHolderName">CARDHOLDER NAME</p>
        <p>12/24</p>
        <div class="bank-logo"></div>
    </div>

    <!-- Payment Details -->
    <div class="payment-details">
        <h3>Payment Details</h3>
        <form id="paymentForm">
            <div class="input-group">
                <label>CARD NUMBER</label>
                <input type="text" id="cardNumber" maxlength="16" placeholder="1234 5678 9012 3456" oninput="updateCardNumber()">
                <span class="error" id="cardNumberError"></span>
            </div>

            <div class="input-group">
                <label>CARDHOLDER NAME</label>
                <input type="text" id="cardHolder" placeholder="CARDHOLDER NAME" oninput="updateCardHolderName()">
                <span class="error" id="cardHolderError"></span>
            </div>

            <div class="input-group">
                <label>EXPIRY DATE</label>
                <select id="expiryMonth">
                    <option value="">Month</option>
                    <?php for ($i = 1; $i <= 12; $i++) { echo "<option value='$i'>$i</option>"; } ?>
                </select>
                <select id="expiryYear">
                    <option value="">Year</option>
                    <?php $year = date("Y"); for ($i = 0; $i < 10; $i++) { echo "<option value='".($year + $i)."'>".($year + $i)."</option>"; } ?>
                </select>
                <span class="error" id="expiryError"></span>
            </div>

            <div class="input-group">
                <label>CVV</label>
                <input type="text" id="cvv" maxlength="4" placeholder="123">
                <span class="error" id="cvvError"></span>
            </div>
        </form>

        <!-- Buttons -->
        <div class="buttons">
            <button type="button" class="btn cancel" onclick="cancelPayment()">CANCEL</button>
            <button type="button" class="btn" onclick="validatePayment()">CONFIRM AND PAY $123</button>
        </div>
    </div>
</div>

<script>
// Function to update cardholder name
function updateCardHolderName() {
    const cardHolderName = document.getElementById("cardHolder").value.toUpperCase();
    document.getElementById("cardHolderName").innerText = cardHolderName || "CARDHOLDER NAME";
}

// Function to update card number
function updateCardNumber() {
    const cardNumber = document.getElementById("cardNumber").value;
    document.getElementById("cardNumberDisplay").innerText = cardNumber || "1234 5678 9012 3456";
}

function validatePayment() {
    let isValid = true;

    // Cardholder Name Validation (Only letters)
    let cardHolder = document.getElementById("cardHolder").value;
    let nameRegex = /^[A-Za-z\s]+$/;
    if (!nameRegex.test(cardHolder)) {
        document.getElementById("cardHolderError").innerText = "Enter a valid name";
        isValid = false;
    } else {
        document.getElementById("cardHolderError").innerText = "";
    }

    // Card Number Validation (16 digits only)
    let cardNumber = document.getElementById("cardNumber").value;
    let cardRegex = /^[0-9]{16}$/;
    if (!cardRegex.test(cardNumber)) {
        document.getElementById("cardNumberError").innerText = "Enter a valid 16-digit card number";
        isValid = false;
    } else {
        document.getElementById("cardNumberError").innerText = "";
    }

    // Expiry Date Validation
    let expiryMonth = document.getElementById("expiryMonth").value;
    let expiryYear = document.getElementById("expiryYear").value;
    if (expiryMonth === "" || expiryYear === "") {
        document.getElementById("expiryError").innerText = "Select expiry date";
        isValid = false;
    } else {
        document.getElementById("expiryError").innerText = "";
    }

    // CVV Validation (3 or 4 digits)
    let cvv = document.getElementById("cvv").value;
    let cvvRegex = /^[0-9]{3,4}$/;
    if (!cvvRegex.test(cvv)) {
        document.getElementById("cvvError").innerText = "Enter a valid CVV";
        isValid = false;
    } else {
        document.getElementById("cvvError").innerText = "";
    }

    if (isValid) {
        showPaymentSuccess();
    }
}

// Custom Payment Success Alert using SweetAlert2
function showPaymentSuccess() {
    Swal.fire({
        title: "Payment Successful!",
        text: "Your payment of $123 has been processed successfully.",
        icon: "success",
        confirmButtonText: "OK"
    });
}

// Cancel Payment Function
function cancelPayment() {
    Swal.fire({
        title: "Payment Cancelled",
        text: "Your payment has been cancelled.",
        icon: "error",
        confirmButtonText: "OK"
    });
}
</script>

</body>
</html>