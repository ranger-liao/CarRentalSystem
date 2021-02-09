// use AJAX to load XML file and save to array
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        // Read data from xml and store to array
        readCarsXML(this);
        // Display the cars in a nice tabular format using the above array
        updateUI();
    }
};
xhttp.open("GET", "xml/cars.xml", true);
xhttp.send();

function updateUI() {
    for (var i = 0; i < productsArray.length; i++) {
        document.getElementById('products').innerHTML += '<div class="product-card col-sm-12 col-md-6 col-lg-4"><img src="images/cars/' + productsArray[i].carImage + '" alt="car image"><h3>' + productsArray[i].brand + '-' + productsArray[i].model + '-' + productsArray[i].modelYear + '</h3><br>' + '<b>Mileage: </b>' + productsArray[i].mileage + '<br>' + '<b>Fuel Type:</b> ' + productsArray[i].fuelType + '<br>' + '<b>Seats: </b>' + productsArray[i].seats + '<br>' + '<b>Price Per Day: </b>' + productsArray[i].pricePerDay + '<br>' + '<b>Availability:</b> ' + productsArray[i].availability + '<br>' + '<b>Description:</b> ' + productsArray[i].description + '<br><a href="#" class="cartBtn" onclick="checkDetails(this)" data-product-id="' + productsArray[i].productID + '">Add To Cart</a></div>';
    }
}

// Use AJAX to check the availability of the car 
function checkDetails(id) {
    var productID = id.getAttribute('data-product-id');

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Clear data array before reading xml again to see if there is any new changes
            productsArray = [];
            // Read new data from xml in case of any changes and store to array
            readCarsXML(this);

            for (var i = 0; i < productsArray.length; i++) {
                if (productsArray[i].productID == productID) {
                    if (productsArray[i].availability == 'True') {
                        alert('Add to the cart successfully.');
                        // Redirect to Cart Page (Adding item to cart)
                        location.href = 'products_cart.php?id=' + productID;
                        break;
                    }
                    else {
                        alert('Sorry, the car is not available now. Please try other cars.');
                        break;
                    }
                }
            }
        }
    }
    xhttp.open("GET", "xml/cars.xml", true);
    xhttp.send();
}