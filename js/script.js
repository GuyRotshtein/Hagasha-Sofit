function validateForm(){
    let clothingName = document.addClothingForm.item.value;
    let clothingSize = document.addClothingForm.size.value;
    let clothingCloset = document.addClothingForm.closet.value;
    let clothingCategory = document.addClothingForm.category.value;
    let errorFlag = 0;

    //hiding all error texts on the page in case some were fixed
    document.getElementById(`invalidName`).style.display = `none`;
    document.getElementById(`invalidSize`).style.display = `none`;
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
    let activePic = document.querySelector('.carousel-item.active img');
    let pictureSrc =  activePic.getAttribute('src').replace('./uploads/clothing/', '');

    document.getElementById('pictureInput').value = pictureSrc;
    // if there is an error, don't submit the form
    if (errorFlag == 1){
        errorFlag = 0;
        return false;
    }

    return true;
}
function validateRegisterForm(){
    let userFName = document.registerForm.userFName.value;
    let userLName = document.registerForm.userLName.value;
    let userMail = document.registerForm.userMail.value;
    let userPass = document.registerForm.userPass.value;
    let userPhone = document.registerForm.userPhone.value;
    let userGender = document.registerForm.userGender.value;
    let userCountry = document.registerForm.userCountry.value;
    let userFavColor = document.registerForm.userColor.value;
    let errorFlag = 0;

    //hiding all error texts on the page in case some were fixed
    document.getElementById(`invalidUserFName`).style.display = `none`;
    document.getElementById(`invalidUserLName`).style.display = `none`;
    document.getElementById(`invalidUserMail`).style.display = `none`;
    document.getElementById(`invalidUserPass`).style.display = `none`;
    document.getElementById(`invalidUserPhone`).style.display = `none`;
    document.getElementById(`invalidUserCountry`).style.display = `none`;
    document.getElementById(`invalidUserGender`).style.display = `none`;
    document.getElementById(`invalidUserFavColor`).style.display = `none`;

    if (!userFName || userFName == '') {
        window.setTimeout(function() { document.registerForm.userFName.focus(); },0);
        document.getElementById(`invalidUserFName`).style.display = `block`;
        errorFlag = 1;
    }
    if (!userLName || userLName == ''){
        window.setTimeout(function() { document.registerForm.userLName.focus(); },0);
        document.getElementById(`invalidUserLName`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.registerForm.userLName.focus(); },0);
            errorFlag = 1;
        }
    }
    if (!userMail || userMail == ''){
        window.setTimeout(function() { document.registerForm.userMail.focus(); },0);
        document.getElementById(`invalidUserMail`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.registerForm.userMail.focus(); },0);
            errorFlag = 1;
        }
    }
    if (!userPass || userPass == ''){
        window.setTimeout(function() { document.registerForm.userPass.focus(); },0);
        document.getElementById(`invalidUserPass`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.registerForm.userPass.focus(); },0);
            errorFlag = 1;
        }
    }
    if (!userPhone || userPhone == ''){
        window.setTimeout(function() { document.registerForm.userPhone.focus(); },0);
        document.getElementById(`invalidUserPhone`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.registerForm.userPhone.focus(); },0);
            errorFlag = 1;
        }
    }
    if (!userCountry || userCountry == ''){
        window.setTimeout(function() { document.registerForm.userCountry.focus(); },0);
        document.getElementById(`invalidUserCountry`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.registerForm.userCountry.focus(); },0);
            errorFlag = 1;
        }
    }
    if (!userGender || userGender == ''){
        window.setTimeout(function() { document.registerForm.userGender.focus(); },0);
        document.getElementById(`invalidUserGender`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.registerForm.userGender.focus(); },0);
            errorFlag = 1;
        }
    }
    if (!userFavColor || userFavColor == 'default'){
        window.setTimeout(function() { document.registerForm.userColor.focus(); },0);
        document.getElementById(`invalidUserFavColor`).style.display = `block`;
        if (errorFlag == 0){
            window.setTimeout(function() { document.registerForm.userColor.focus(); },0);
            errorFlag = 1;
        }
    }

    let activePic = document.querySelector('.carousel-item.active img');
    let pictureSrc =  activePic.getAttribute('src').replace('./uploads/user_pictures/', '');
    console.log(pictureSrc);
    document.getElementById('userPicture').value = pictureSrc;

    if (errorFlag == 1){
        errorFlag = 0;
        return false;
    }

    return true;
}
(g=>{let h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});const d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: "AIzaSyAlQTuJhg4tUJ1YQqO_JdHAjo7cQ8sdqZk",
    v: "weekly",
});

let globalTemp = 0;
let slot1Array = [];
let slot2Array = [];
let slot3Array = [];
let slot4Array = [];
let slot5Array = [];
let slot6Array = [];
let selectedClothes = [];

function displayWeather(data){
    console.log(data);
    globalTemp = Math.round(parseFloat(data.main.temp));
    const temperature = Math.round(parseFloat(data.main.temp)).toString();
    const ulFrag = document.createDocumentFragment();
    const cityCol = document.createElement('div');
    cityCol.classList.add('col','pt-3');
    const cityRow = document.createElement('div');
    cityRow.classList.add('row')
    const city = document.createElement('h2');
    city.innerHTML = data.name;
    cityRow.appendChild(city);
    cityCol.appendChild(cityRow);

    const weatherRow = document.createElement('div');
    weatherRow.classList.add('row');
    const imageCol = document.createElement('div');
    imageCol.classList.add('col-4','d-flex','justify-content-center','pe-0')
    const weatherIcon = document.createElement('img');
    weatherIcon.src = `https://openweathermap.org/img/wn/`+ data.weather[0].icon +`@2x.png`;
    weatherIcon.setAttribute('id','weatherImage');
    weatherIcon.setAttribute('title',data.weather[0].description);
    weatherIcon.setAttribute('alt',data.weather[0].description);
    imageCol.appendChild(weatherIcon);
    weatherRow.appendChild(imageCol);
    const weatherDescCol = document.createElement('div');
    weatherDescCol.classList.add('col-8','d-flex','flex-column','justify-content-center','ps-0');
    const temperatureCol = document.createElement('div');
    temperatureCol.classList.add('col','d-flex','align-items-end')
    const temperatureText = document.createElement('h2');
    temperatureText.classList.add('d-inline');
    temperatureText.innerHTML = temperature;
    const temperatureSign = document.createElement('p');
    temperatureSign.innerHTML = '&#8451;';
    temperatureCol.appendChild(temperatureText);
    temperatureCol.appendChild(temperatureSign);
    weatherDescCol.appendChild(temperatureCol);

    const detailsCol = document.createElement('div');
    detailsCol.classList.add('col');
    const weatherDetails = document.createElement('h5');
    weatherDetails.classList.add('text-secondary');

    let date = new Date;
    let hour = date.getHours();
    hour = (hour < 10 ? "0" : "") + hour;
    let min  = date.getMinutes();
    min = (min < 10 ? "0" : "") + min;

    weatherDetails.innerHTML = hour + `:` + min + `<br>` +data.weather[0].description;
    detailsCol.appendChild(weatherDetails);
    weatherDescCol.appendChild(detailsCol);
    weatherRow.appendChild(weatherDescCol);
    cityCol.appendChild(weatherRow);
    ulFrag.appendChild(cityCol);
    document.getElementById('weatherPanel').appendChild(ulFrag);

    fetch("./js/includes/categories.json")
        .then(response=> response.json())
        .then(data => generateRecommendation(data));
}

let map;
function getLocation(callback) {
    if (document.getElementsByClassName('homePage') !== null){
        if (navigator.geolocation ) {
            const lat_lng = navigator.geolocation.getCurrentPosition(function (position) {
                const user_position = {};
                user_position.lat = position.coords.latitude;
                user_position.lng = position.coords.longitude;
                callback(user_position);
                if (document.getElementById('googleMap') !== null){
                fetch("https://api.openweathermap.org/data/2.5/weather?lat="+ user_position.lat+"&lon="+user_position.lng+"&units=metric&appid=14d415b6653f524f309d8d3300b0e89e",{})
                    .then(response => response.json())
                    .then(data => displayWeather(data))
                    .catch(error => console.log('error', error));

                initMap(user_position);
                }
            },function error(msg) {alert('Please enable your GPS position feature.');},{ enableHighAccuracy: true, timeout: 10 * 1000 * 1000, maximumAge: 0 });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
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

function tidyArray(array,favColor){
    let favColorExists = 0;
    if (array.length > 1){
        array.forEach(function (arrayItem) {
            if (parseInt(arrayItem.color_id) == favColor || (typeof(arrayItem.secondary_color_id) !== 'undefined' && parseInt(arrayItem.secondary_color_id))){
                favColorExists = 1;
            }
            // console.log(arrayItem.color_id);
        });
        if (favColorExists == 1){
            for (var i = array.length; i--;) {
                if ((typeof(array[i].secondary_color_id) !== 'undefined')){
                    if (parseInt(array[i].color_id) != favColor && parseInt(array[i].secondary_color_id) != favColor) array.splice(i, 1);
                } else {
                    if (parseInt(array[i].color_id) != favColor) array.splice(i, 1);
                }
            }
        }
    }
    return array;
};

function pickRandomClothing(array){
    const selectedClothing = array[Math.floor(Math.random()*array.length)];
    return selectedClothing;
};

const getClothes  = async (data)=>{
    let response = await fetch('recommendation.php', {});
    const result = await response.json();
    const allowedCats = [];
    for (const key in data.categories){
        let tempCat = data.categories[key];
        if(globalTemp > tempCat.catMinTemp && globalTemp < tempCat.catMaxTemp){
            allowedCats.push(tempCat.catId);
        }
    }

    for (const key in result.clothes) {
        let clothCat = parseInt(result.clothes[key].category_id);
        if (allowedCats.indexOf(clothCat) !== -1) {
            if (clothCat == 1) {
                slot1Array.push(result.clothes[key]);
            }
            if (clothCat === 4 || clothCat === 8) {
                slot2Array.push(result.clothes[key]);
            }
            if (clothCat == 2 || clothCat == 3) {
                slot3Array.push(result.clothes[key]);
            }
            if (clothCat == 5) {
                slot4Array.push(result.clothes[key]);
            }
            if (clothCat == 6) {
                slot5Array.push(result.clothes[key]);
            }
            if (clothCat == 7) {
                slot6Array.push(result.clothes[key]);
            }
        }
    }

    slot1Array = tidyArray(slot1Array, result.fav_color[0]);
    slot3Array = tidyArray(slot3Array, result.fav_color[0]);
    slot4Array = tidyArray(slot4Array, result.fav_color[0]);
    slot5Array = tidyArray(slot5Array, result.fav_color[0]);

    if (slot1Array.length>0){selectedClothes.push(pickRandomClothing(slot1Array));}
    if (slot2Array.length>0){selectedClothes.push(pickRandomClothing(slot2Array));}
    if (slot3Array.length>0){selectedClothes.push(pickRandomClothing(slot3Array));}
    if (slot4Array.length>0){selectedClothes.push(pickRandomClothing(slot4Array));}
    if (slot5Array.length>0){selectedClothes.push(pickRandomClothing(slot5Array));}
};

async function generateRecommendation(data) {
    selectedClothes.length = 0;
    await getClothes(data);
    const recWindow = document.getElementById('');

    const recommendationWindow = document.getElementById('rec_clothes');
    const ulFrg = document.createDocumentFragment();
    selectedClothes.forEach(function (arrayItem) {
        const card = document.createElement('div');
        card.classList.add('card','bg-transparent','border-0');
        const cardImg = document.createElement('img');
        cardImg.src='./uploads/clothing/'+arrayItem.clothing_picture;
        cardImg.classList.add('card-img','object-fit-contain');
        cardImg.setAttribute('alt',arrayItem.clothing_name);
        cardImg.setAttribute('title',arrayItem.clothing_name);

        const cardLink = document.createElement('a');
        cardLink.href = './clothing.php?clothing_id='+arrayItem.clothing_id;
        cardLink.appendChild(cardImg);
        const cardOverlay = document.createElement('div');
        cardOverlay.classList.add('card-img-overlay')
        cardLink.appendChild(cardOverlay);
        card.appendChild(cardLink);
        ulFrg.appendChild(card);
    });
    recommendationWindow.innerHTML="";
    recommendationWindow.appendChild(ulFrg);
};

function insertJSONdata(data){
    if (document.addClothingForm) {
        const ulFrag = document.createDocumentFragment();
        let clothingCategory = document.addClothingForm.category;
        const editCategory = clothingCategory.value;
        const defaultCategory = document.createElement('option');
        defaultCategory.value ='default';defaultCategory.innerHTML = 'Select a category';
        if (document.getElementById('editSwitch').innerHTML != 'true'){
            defaultCategory.selected = true;
        }
        defaultCategory.disabled = true;
        ulFrag.appendChild(defaultCategory);

        for(const key in data.categories){
            const closetOption = document.createElement('option');
            closetOption.value=data.categories[key].catId;
            closetOption.innerHTML=data.categories[key].catName;
            if (document.getElementById('editSwitch').innerHTML == 'true' && editCategory == data.categories[key].catId){
                    closetOption.selected = true;
            }
            ulFrag.appendChild(closetOption);
        }
        let selectedCategory = clothingCategory.value;
        clothingCategory.innerHTML = "";
        clothingCategory.appendChild(ulFrag);

        ulFrag.innerHTML = '';
        let clothingSize = document.addClothingForm.size;
        const editSize = clothingSize.value;
        const defaultSize = document.createElement('option');
        defaultSize.value ='default';
        defaultSize.innerHTML = 'Select a size';
        if (document.getElementById('editSwitch').innerHTML != 'true'){
            defaultSize.selected = true;
        }
        defaultSize.disabled = true;
        ulFrag.appendChild(defaultSize);
        for(const key in data.sizes){
            const sizeOption = document.createElement('option');
            sizeOption.value=data.sizes[key].size_id;
            sizeOption.innerHTML=data.sizes[key].size_code;
            if (document.getElementById('editSwitch').innerHTML == 'true' && editSize == data.sizes[key].size_id){
                sizeOption.selected = true;
            }
            ulFrag.appendChild(sizeOption);
        }
        clothingSize.innerHTML = "";
        clothingSize.appendChild(ulFrag);

        if (document.getElementById('editSwitch').innerHTML != 'true'){
            ulFrag.innerHTML = '';
            const defaultPicDiv = document.createElement('div');
            defaultPicDiv.classList.add('carousel-item','active');
            const defaultPicImg = document.createElement('img');
            defaultPicImg.src='./uploads/clothing/default.png';
            defaultPicImg.value = 'default';
            defaultPicImg.classList.add('d-block','w-100','object-fit-contain');
            defaultPicDiv.appendChild(defaultPicImg);
            ulFrag.appendChild(defaultPicDiv);
            for(const key in data.pictures){
                const pictureDiv = document.createElement('div');
                pictureDiv.classList.add('carousel-item','object-fit-contain');
                const pictureImg = document.createElement('img');
                pictureImg.classList.add('d-block','w-100','object-fit-contain');
                pictureImg.src = './uploads/clothing/' + data.pictures[key].clothing_picture;
                pictureDiv.appendChild(pictureImg);
                ulFrag.appendChild(pictureDiv);
            }
            const pictureCarousel = document.querySelector('.carousel-inner');
            pictureCarousel.innerHTML = "";
            pictureCarousel.appendChild(ulFrag);
        }
    }
    else if (document.registerForm) {

            const ulFrag = document.createDocumentFragment();
            ulFrag.innerHTML = '';
            const defaultPicDiv = document.createElement('div');
            const pictureValue = document.registerForm.userPicture.value;
            defaultPicDiv.classList.add('carousel-item','object-fit-fill','active');
            const defaultPicImg = document.createElement('img');
            if (document.getElementById('regSwitch').innerHTML == 'true'){
                defaultPicImg.src='./uploads/user_pictures/'+pictureValue;
                defaultPicImg.value = pictureValue;
            }
            else{
                defaultPicImg.src='./uploads/user_pictures/default.png';
                defaultPicImg.value = 'default';
            }
            defaultPicImg.classList.add('d-block','mx-auto','rounded-circle','card-img','register_image','py-2');
            defaultPicDiv.appendChild(defaultPicImg);
            ulFrag.appendChild(defaultPicDiv);

            for(const key in data.userPictures){
                if (document.getElementById('regSwitch').innerHTML == 'true' && pictureValue != data.userPictures[key].picture_name || document.getElementById('regSwitch').innerHTML != 'true')
                {
                    const pictureDiv = document.createElement('div');
                    pictureDiv.classList.add('carousel-item','object-fit-fill');
                    const pictureImg = document.createElement('img');
                    pictureImg.classList.add('d-block','mx-auto','rounded-circle','card-img','register_image','py-2');
                    pictureImg.src = './uploads/user_pictures/' + data.userPictures[key].picture_name;
                    pictureDiv.appendChild(pictureImg);
                    ulFrag.appendChild(pictureDiv);
                }
            }
            const pictureCarousel = document.querySelector('.carousel-inner');
            pictureCarousel.innerHTML = "";
            pictureCarousel.appendChild(ulFrag);
    }
};

fetch("./js/includes/categories.json")
    .then(response => response.json())
    .then(data => insertJSONdata(data));

window.onload=()=>{

}