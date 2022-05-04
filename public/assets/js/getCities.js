zipcode.addEventListener('keyup', () => {
    if(zipcode.value.length == 5){
        fetch('/controllers/ajaxDate-controller.php?zipcode='+zipcode.value)
        .then(response => response.json())
        .then(cities => {
            let htmlContent = '';
            cities.forEach(city => {
                htmlContent += `<option value = "${city.id}">${city.name}</option>`;
            });
            displayValue.innerHTML = htmlContent;
            
        })
    }
    
    
} )