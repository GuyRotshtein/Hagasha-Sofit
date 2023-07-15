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
(g=>{let h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});const d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: "AIzaSyAlQTuJhg4tUJ1YQqO_JdHAjo7cQ8sdqZk",
    v: "weekly",
    // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
    // Add other bootstrap parameters as needed, using camel case.
});
let map;
let location_global;
function getLocation(callback) {
    if (navigator.geolocation) {
        const lat_lng = navigator.geolocation.getCurrentPosition(function (position) {
            const user_position = {};
            user_position.lat = position.coords.latitude;
            user_position.lng = position.coords.longitude;
            callback(user_position);

            fetch("https://api.openweathermap.org/data/2.5/weather?lat="+ user_position.lat+"&lon="+user_position.lng+"&units=metric&appid=14d415b6653f524f309d8d3300b0e89e",{})
                .then(response => response.text())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));

            initMap(user_position);
        },function error(msg) {alert('Please enable your GPS position feature.');},{ enableHighAccuracy: true, timeout: 10 * 1000 * 1000, maximumAge: 0 });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
getLocation(function(lat_lng){});

async function initMap(user_position) {
    const { Map } = await google.maps.importLibrary("maps");

    map = new Map(document.getElementById("googleMap"), {
        center: { lat: user_position.lat, lng: user_position.lng },
        zoom: 12,
    });
}

