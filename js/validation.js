function validate() {
    // If no car is added, redirect to product page and return false
    if (selectedProduct == '') {
        alert('No car has been reserved');
        window.location.href = "products.php";
        return false;
    }
    else {
        // If there is item added then continue to check email format
        var email = document.getElementById('email').value;
        // code snippet for email validation source: https://html.form.guide/best-practices/validate-email-address-using-javascript.html
        var format = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
        var result = format.test(email);
        if (result === false) {
            alert('Please enter a valid email address.')
        }
        return result;
    }
}