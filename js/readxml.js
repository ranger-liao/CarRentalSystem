var productsArray = []; //array to store XML info

function readCarsXML(xml) {
    var xmlResponse = xml.responseXML;
    var xmlProducts = xmlResponse.getElementsByTagName("Products");
    for (var i = 0; i < xmlProducts.length; i++) {
        var productID = xmlProducts[i].getElementsByTagName("ProductID")[0].childNodes[0].nodeValue;
        var category = xmlProducts[i].getElementsByTagName("Category")[0].childNodes[0].nodeValue;
        var availability = xmlProducts[i].getElementsByTagName("Availability")[0].childNodes[0].nodeValue;
        var brand = xmlProducts[i].getElementsByTagName("Brand")[0].childNodes[0].nodeValue;
        var model = xmlProducts[i].getElementsByTagName("Model")[0].childNodes[0].nodeValue;
        var modelYear = xmlProducts[i].getElementsByTagName("ModelYear")[0].childNodes[0].nodeValue;
        var mileage = xmlProducts[i].getElementsByTagName("Mileage")[0].childNodes[0].nodeValue;
        var fuelType = xmlProducts[i].getElementsByTagName("FuelType")[0].childNodes[0].nodeValue;
        var seats = xmlProducts[i].getElementsByTagName("Seats")[0].childNodes[0].nodeValue;
        var pricePerDay = xmlProducts[i].getElementsByTagName("PricePerDay")[0].childNodes[0].nodeValue;
        var description = xmlProducts[i].getElementsByTagName("Description")[0].childNodes[0].nodeValue;
        var carImage = xmlProducts[i].getElementsByTagName("CarImage")[0].childNodes[0].nodeValue;

        var products = new Object;
        products.productID = productID;
        products.category = category;
        products.availability = availability;
        products.brand = brand;
        products.model = model;
        products.modelYear = modelYear;
        products.mileage = mileage;
        products.fuelType = fuelType;
        products.seats = seats;
        products.pricePerDay = pricePerDay;
        products.description = description;
        products.carImage = carImage;

        productsArray.push(products);
    }
}