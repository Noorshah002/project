<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Artify</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            color: black;
            margin: 0;
            padding: 0;
        }
        .faq-container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .faq-header {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .faq-search {
            text-align: center;
            margin-bottom: 20px;
        }
        .faq-search input {
            width: 60%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .faq-item {
            background: #f9f9f9;
            border-radius: 10px;
            margin-bottom: 15px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            color: black;
        }
        .faq-item:hover {
            background: #e6e6e6;
        }
        .faq-question {
            font-size: 1.2em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 1;
            color: black;
        }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            padding: 0 15px;
            transition: max-height 0.3s ease, padding 0.3s ease;
            font-size: 1em;
            color: black;
            position: relative;
            z-index: 1;
        }
        .faq-item.active .faq-answer {
            max-height: 200px; 
            padding: 15px;
            color: black;
        }
        .icon {
            transition: transform 0.3s ease;
        }
        .faq-item.active .icon {
            transform: rotate(45deg);
        }
        .faq-contact {
            text-align: center;
            margin-top: 30px;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="faq-container">
        <div class="faq-header">Frequently Asked Questions</div>
        <div class="faq-search">
            <input type="text" id="faq-search" placeholder="Search for a question...">
        </div>
        <div class="faq-item">
            <div class="faq-question">How can I place an order? <i class="fa fa-plus icon"></i></div>
            <div class="faq-answer">You can place an order by selecting your items, adding them to the cart, and proceeding to checkout.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">What payment methods do you accept? <i class="fa fa-plus icon"></i></div>
            <div class="faq-answer">We accept Cash on Delivery (COD) and online card payments.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">How long does delivery take? <i class="fa fa-plus icon"></i></div>
            <div class="faq-answer">Delivery takes 3-5 business days, depending on your location.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Can I return a product? <i class="fa fa-plus icon"></i></div>
            <div class="faq-answer">Yes, you can return products within 7 days of delivery. The item must be unused and in its original packaging.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Do you offer international shipping? <i class="fa fa-plus icon"></i></div>
            <div class="faq-answer">Currently, we only ship within the country. International shipping will be available soon.</div>
        </div>
        <div class="faq-item">
            <div class="faq-question">How can I track my order? <i class="fa fa-plus icon"></i></div>
            <div class="faq-answer">Once your order is shipped, you will receive a tracking number via email.</div>
        </div>
        <div class="faq-contact">
            If you have more questions, contact us at <strong>support@artify.com</strong>
        </div>
    </div>

    <script>
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', () => {
                item.classList.toggle('active');
            });
        });
        document.getElementById('faq-search').addEventListener('input', function() {
            let searchText = this.value.toLowerCase();
            document.querySelectorAll('.faq-item').forEach(item => {
                let question = item.querySelector('.faq-question').textContent.toLowerCase();
                if (question.includes(searchText)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
