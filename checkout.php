<?php
    include ("header.php");
    
    // Initialise the session if session is yet to initialised
    if (!isset($_SESSION)) {
        session_start();
    }

    // Selected Product Total Cost - Update variable only if the data is POSTed 
    if ((isset($_POST['totalCost'])) && ($_POST['totalCost'] != '')) {
        $cost = $_POST['totalCost'];

        // Create total session variable if not yet created
        if (empty($_SESSION['total'])) {
            $_SESSION['total'] = '';
        }
        $_SESSION['total'] = $cost;

    }
    else {
        $cost = '0 (No car selected!)';
    }

    // Selected Product Details - Update variable only if the data is POSTed 
    if ((isset($_POST['productInCart'])) && ($_POST['productInCart'] != '')) {
        $detail = $_POST['productInCart'];
    
        // Create details session variable if not yet created
        if (empty($_SESSION['details'])) {
            $_SESSION['details'] = '';
        }
        $_SESSION['details'] = $detail;
    
    }
?>

<section id="main">
    <h2>Checkout - Customer Details and Payment</h2>
    <p>Please fill in your details. <span class="required">*</span> indicates required field. </p>
    <div class="contact-form">
        <h2>Payment Due: <span class="required">$<?php echo $cost?></span></h2><br><br>
        <form name="book" method="post" action="booking_form_handler.php" onSubmit="return validate()">

            <!-- <label>NAME</label> -->
            <input class="form-control" name="fname" type="text" id="fname" placeholder="Your First Name *" required><br>
            <input class="form-control" name="lname" type="text" id="lname" placeholder="Your Last Name *" required><br>
            <!-- <label>E-MAIL</label> -->
            <input class="form-control" name="email" type="email" id="email" placeholder="Your Email *" required><br>
            <!-- <label>ADDRESS</label> -->
            <input class="form-control" name="address1" type="text" id="address1" placeholder="Your Address Line 1 *" required><br>
            <input class="form-control" name="address2" type="text" id="address2" placeholder="Your Address Line 2"><br>
            <input class="form-control" name="city" type="text" id="city" placeholder="Your City *" required><br>
            <select class="form-control" name="state" id="state" placeholder="Your State *" required>
                <option value="NSW">New South Wales</option>
                <option value="VIC">Victoria</option>
                <option value="ACT">Australian Capital Territory</option>
                <option value="QL">Queensland</option>
                <option value="NT">Northern Territory</option>
                <option value="WA">Western Australia</option>
                <option value="SA">South Australia</option>
                <option value="TAS">Tasmania</option>
            </select><br>
            <input class="form-control" name="postcode" type="number" id="postcode" placeholder="Your Postcode *" min="0000" max="9999" required><br>
            <!-- <label>PAYMENT METHOD</label> -->
            <select class="form-control" name="payment" id="payment" placeholder="Your Payment Method *" required>
                <option value="MASTER">MasterCard</option>
                <option value="VISA">Visa</option>          
                <option value="AMERICAN">American Express</option>
                <option value="UNION">Union Pay</option>
                <option value="CASH">Cash</option>
                <option value="BANK">Bank Transfer</option>
            </select><br>

            <input class="submitbutton" type="submit" name="Submit" value="BOOK NOW">
            <input class="submitbutton" type="reset" name="Reset" value="RESET">
        </form>

    </div>
</section>
</div>
<script>var selectedProduct = <?php echo '["' . implode('", "', $_SESSION['cart']) . '"]';?>;</script>
<script src="./js/validation.js"></script>

<?php
	include ("footer.php");
?>