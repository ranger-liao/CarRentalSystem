<?php
    // Initialise the session if session is yet to initialised
    if (!isset($_SESSION)) {
        session_start();
    }

    // Send confirmation mail to cx
    $name = $_POST['fname'];
    $visitor_email = $_POST['email'];
    $totalCost = $_SESSION['total'];
    $orderDetail = $_SESSION['details'];

    // Modify orderDetail string to fit email format
    $orderDetailsEmail = str_replace("<br>", "\r\n", $orderDetail);

    $email_subject = "Hertz-UTS: Order Confirmation";
    $email_body = "Dear $name, \n\n".
    "Have a glance of your order totalling $ $totalCost.\n\n".
    "$orderDetailsEmail\n";
    
    $to = "$visitor_email";
    $headers = "From: Hertz-UTS@uts.edu.au \r\n";
    $headers .= "Reply To: Hertz-UTS@uts.edu.au \r\n";
    mail($to,$email_subject,$email_body,$headers);
?>

<?php
    include ("header.php");
?>

<section id="main">
    <h2>Thanks for Choosing Hertz-UTS</h2>
    <br>
    <p>Your order is now being processed. You will received a confirmation email soon. Cheers!</p>
    <br>
    <a href="index.php" class="btn">Back to Home Page</a>
    <br><br>
    <p><strong>Have a glance of your order totalling $<?php echo $_SESSION['total']?>:</strong></p>
    <p><?php echo $_SESSION['details']?></p>'
    
</section>
</div>

<?php
    include ("footer.php");
    
    // Destroy session once it is being checkout, clear all session variables including cart
    session_destroy();
?>