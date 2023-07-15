window.onload = function(){
    const ulFrag = document.createDocumentFragment();
    const headerFrag = document.createElement('header');
    headerFrag.classList.add('d-flex','flex-wrap','p-3','border-bottom','bg-white','sticky-top');
    if(window.innerWidth >= 900){
        headerFrag.classList.add('justify-content-start');
    } else {
        headerFrag.classList.add('justify-content-center');
    }
    const logo = document.createElement('a');
    logo.classList.add('d-flex','align-items-center','mb-3','text-decoration-none','headerLogo');
    if (window.location.href.indexOf("index") > -1){
        logo.href = `#`;
    } else {
        logo.href = `./index.php`;
    }
    const logoImage = document.createElement('div');
    logoImage.setAttribute('id','logoImage');
    logo.appendChild(logoImage);
    const logoText = document.createElement('span');
    logoText.classList.add('fs-4','px-1');
    logoText.innerHTML = 'ShopBook';
    logo.appendChild(logoText);
    headerFrag.appendChild(logo);
    ulFrag.appendChild(headerFrag);
    document.body.insertBefore(ulFrag,document.body.firstChild);
};
window.onresize = updateLayout;
function updateLayout(){
    let windowWidth = window.innerWidth;
    if (windowWidth >= 1200){
        document.getElementsByTagName('ul')[0].classList.remove('justify-content-center');
    }
    if (windowWidth < 1200){
        document.getElementsByTagName('ul')[0].classList.add('justify-content-center');
    }
    if(windowWidth >= 900){
        document.getElementsByTagName('header')[0].classList.remove('justify-content-center');
        document.getElementsByTagName('header')[0].classList.add('justify-content-start');
        if (window.location.href.indexOf("index") > -1){
            document.getElementsByTagName('ul')[0].classList.add('list-group-horizontal');
            document.getElementsByTagName('ul')[0].classList.remove('list-group-flush');
        }
        return;
    }
    document.getElementsByTagName('header')[0].classList.remove('justify-content-start');
    document.getElementsByTagName('header')[0].classList.add('justify-content-center');
    if (window.location.href.indexOf("index") > -1){
        document.getElementsByTagName('ul')[0].classList.remove('list-group-horizontal');
        document.getElementsByTagName('ul')[0].classList.add('list-group-flush');

    }

}