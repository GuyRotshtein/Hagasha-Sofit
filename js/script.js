function validateForm(){
    let clothingName = document.addClothingForm.item.value;
    let clothingSize = document.addClothingForm.size.value;
    let clothingCloset = document.addClothingForm.closet.value;
    let clothingCategory = document.addClothingForm.category.value;
    let clothingBrand = document.addClothingForm.brand.value;
    let errorFlag = 0;

    //hiding all error texts on the page in case some were fixed
    document.getElementById(`invalidName`).style.display = `none`;
    document.getElementById(`invalidSize`).style.display = `none`;
    document.getElementById(`invalidBrand`).style.display = `none`;
    document.getElementById(`invalidCategory`).style.display = `none`;
    document.getElementById(`invalidCloset`).style.display = `none`;

    if (!clothingName) {
        window.setTimeout(function() { document.addClothingForm.item.focus(); },0);
        document.getElementById(`invalidName`).style.display = `block`;
        errorFlag = 1;
    }
    if (clothingSize == `default`){
        window.setTimeout(function() { document.addClothingForm.size.focus(); },0);
        document.getElementById(`invalidSize`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.addClothingForm.size.focus(); },0);
            errorFlag = 1;
        }
    }
    if (clothingCloset == `default`){
        window.setTimeout(function() { document.addClothingForm.closet.focus(); },0);
        document.getElementById(`invalidCloset`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.addClothingForm.closet.focus(); },0);
            errorFlag = 1;
        }
    }
    if (clothingCategory == `default`){
        window.setTimeout(function() { document.addClothingForm.category.focus(); },0);
        document.getElementById(`invalidCategory`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.addClothingForm.category.focus(); },0);
            errorFlag = 1;
        }
    }
    if (clothingBrand == `default`){
        window.setTimeout(function() { document.addClothingForm.brand.focus(); },0);
        document.getElementById(`invalidBrand`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.addClothingForm.brand.focus(); },0);
            errorFlag = 1;
        }
    }
    console.log(`final: ` +errorFlag);
    // if there is an error, don't submit the form
    if (errorFlag == 1){
        errorFlag = 0;
        return false
    }
    return true;
}

function getLocation(callback) {
    if (navigator.geolocation) {
        const lat_lng = navigator.geolocation.getCurrentPosition(function (position) {
            const user_position = {};
            user_position.lat = position.coords.latitude;
            user_position.lng = position.coords.longitude;
            callback(user_position);
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
getLocation(function(lat_lng){
    console.log(lat_lng);
});

function initMap() {
    const options = {
        zoom: 15,
        center: {lat: 33.933241, lng: -84.340288},
    };
    const map = new google.maps.Map(document.getElementById('map'), options);
    const marker = new google.maps.Marker({
        position: {lat: 33.933241, lng: -84.340288},
        map: map,
    });
}