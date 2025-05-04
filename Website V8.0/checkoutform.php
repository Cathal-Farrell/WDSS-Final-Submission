<?php 
    require_once 'include/DefaultHeader.php';
    require_once 'include/NavBar.php';
?>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/checkout.css">
    <script>
        // JavaScript function to show an alert when the form is submitted
        // event.preventDefault() learned from StackOverflow comment: https://stackoverflow.com/a/8664680
        function showAlert(event) {
            event.preventDefault();  // Prevent the form from submitting
            alert("Your product(s) have been purchased! - You will be redirected to the homepage.");

            window.location.href = "index.php";  
        }
    </script>
</head>

<body>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form onsubmit="showAlert(event)">
                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Dean Cullen" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="Dean@gmail.com" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="TuDublin 13 Road, Blanch" required>
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Dublin" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="county">County</label>
                                    <input type="text" id="county" name="county" placeholder="Dublin" required>
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="D15 D30" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="Dean Cullen" required>
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="2343-1224-5443-2567" required>
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="October" required>
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2026" required>
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="648" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Pay Now" class="btn">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
