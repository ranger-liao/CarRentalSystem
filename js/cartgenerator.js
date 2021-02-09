// use AJAX to load XML file and save to array
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
	if (this.readyState == 4 && this.status == 200) {
		// Read data from xml and store to array
		readCarsXML(this);

		// Update Cart if product is added
		if (selectedProduct != '') {
			updateCart(productsArray, selectedProduct);
		}
	}
};
xhttp.open("GET", "xml/cars.xml", true);
xhttp.send();

var productDetailsInString = '';
function updateCart(productsArray, selectedProduct) {
	// Removing empty cart message
	document.getElementById('emptyCartMessage').setAttribute('style', 'display: none;');

	// Adding cart table title row
	document.getElementById('cart').innerHTML = '<tr><th><strong>Product Image</strong></th><th><strong>Vehicle</strong></th><th><strong>Price Per Day</strong></th><th><strong>Rental Days</strong></th><th><strong>Actions</strong></th></tr>'

	// Adding cart table selected products rows
	for (var i = 0; i < selectedProduct.length; i++) {
		for (var j = 0; j < productsArray.length; j++) {
			if (productsArray[j].productID == selectedProduct[i]) {
				document.getElementById('cart').innerHTML += '<tr><td><img src="images/cars/' + productsArray[j].carImage + '"></td><td>' + productsArray[j].modelYear + '-' + productsArray[j].brand + '-' + productsArray[j].model + '</td><td class=price value="' + productsArray[j].pricePerDay + '">' + '$' + productsArray[j].pricePerDay + '</td><td><input type="number" id="daysInput" class="days" name="days" value="1" min="1"></td><td><a href="delete_cart.php?id=' + productsArray[j].productID + '" class="btn">DELETE</a></td></tr>';

				productDetailsInString += 'Model: ' + productsArray[j].modelYear + '-' + productsArray[j].brand + '-' + productsArray[j].model + '<br>' + 'Mileage: ' + productsArray[j].mileage + '<br>' + 'Fuel-Type: ' + productsArray[j].fuelType + '<br>' + 'Seats: ' + productsArray[j].seats + '<br>' + 'Price Per Day: ' + productsArray[j].pricePerDay + '<br>' + 'Description: ' + productsArray[j].description + '<br><br>';
			}
		}
	}
	document.getElementById('productInCart').setAttribute('value', productDetailsInString);
}

function calculateTotalCost() {
	var prices = document.querySelectorAll('.price');
	var days = document.querySelectorAll('.days');
	var total = 0;

	for (var i = 0; i < prices.length; i++) {
		total += (prices[i].getAttribute('value') * days[i].value);
	}
	return total;
}

function checkInput() {
	if (selectedProduct == '') {
		alert('No car has been reserved');
		window.location.href = "products.php";
		return false;
	}
	else {
		// Validate the rental days where min rental days is 1, else user can click delete
		var isInputsValid = true;
		var rentalDaysInput = document.querySelectorAll('.days');
		for (var i = 0; i < rentalDaysInput.length; i++) {
			if (rentalDaysInput[i].value > 0) {
				isInputsValid = true;
			}
			else {
				isInputsValid = false;
				break;
			}
		}

		if (isInputsValid) {
			document.getElementById('totalCost').setAttribute('value', calculateTotalCost());
			return true;
		}
		else {
			alert('Minimum one (1) day of rental is required.');
			return false;
		}
	}
}