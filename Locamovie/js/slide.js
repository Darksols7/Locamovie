//step 1: get DOM
let nextDom = document.getElementById('next');
let prevDom = document.getElementById('prev');

let carouselDom = document.querySelector('.carousel');
let SliderDom = carouselDom.querySelector('.carousel .list');
let thumbnailBorderDom = document.querySelector('.carousel .thumbnail');
let thumbnailItemsDom = thumbnailBorderDom.querySelectorAll('.item');
let timeDom = document.querySelector('.carousel .time');

thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
let timeRunning = 3000;
let timeAutoNext = 7000;

nextDom.onclick = function(){
    showSlider('next');    
}

prevDom.onclick = function(){
    showSlider('prev');    
}
let runTimeOut;
let runNextAuto = setTimeout(() => {
    next.click();
}, timeAutoNext)
function showSlider(type){
    let  SliderItemsDom = SliderDom.querySelectorAll('.carousel .list .item');
    let thumbnailItemsDom = document.querySelectorAll('.carousel .thumbnail .item');
    
    if(type === 'next'){
        SliderDom.appendChild(SliderItemsDom[0]);
        thumbnailBorderDom.appendChild(thumbnailItemsDom[0]);
        carouselDom.classList.add('next');
    }else{
        SliderDom.prepend(SliderItemsDom[SliderItemsDom.length - 1]);
        thumbnailBorderDom.prepend(thumbnailItemsDom[thumbnailItemsDom.length - 1]);
        carouselDom.classList.add('prev');
    }
    clearTimeout(runTimeOut);
    runTimeOut = setTimeout(() => {
        carouselDom.classList.remove('next');
        carouselDom.classList.remove('prev');
    }, timeRunning);

    clearTimeout(runNextAuto);
    runNextAuto = setTimeout(() => {
        next.click();
    }, timeAutoNext)
}
let currentIndex = 0;

function updateFocus() {
    const items = document.querySelectorAll('.carousel-item');
    items.forEach((item, index) => {
        item.classList.toggle('focus', index === currentIndex);
    });
}

function nextItem() {
    const carousel = document.getElementById('carousel');
    const items = carousel.getElementsByClassName('carousel-item');
    currentIndex = (currentIndex + 1) % items.length;
    const offset = -currentIndex * (items[0].offsetWidth + 20); // 20 é a margem horizontal
    carousel.style.transform = `translateX(${offset}px)`;
    updateFocus();
}

function prevItem() {
    const carousel = document.getElementById('carousel');
    const items = carousel.getElementsByClassName('carousel-item');
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    const offset = -currentIndex * (items[0].offsetWidth + 20); // 20 é a margem horizontal
    carousel.style.transform = `translateX(${offset}px)`;
    updateFocus();
}

// Inicializa o foco no primeiro item
updateFocus()

function updateFocus() {
    const items = document.querySelectorAll('.movies');
    items.forEach((item, index) => {
        item.classList.toggle('focus', index === currentIndex);
    });
}

function nextItem() {
    const carousel = document.getElementById('movies');
    const items = carousel.getElementsByClassName('movie');
    currentIndex = (currentIndex + 1) % items.length;
    const offset = -currentIndex * (items[0].offsetWidth + 20); // 20 é a margem horizontal
    carousel.style.transform = `translateX(${offset}px)`;
    updateFocus();
}

function prevItem() {
    const carousel = document.getElementById('movies');
    const items = carousel.getElementsByClassName('movie');
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    const offset = -currentIndex * (items[0].offsetWidth + 20); // 20 é a margem horizontal
    carousel.style.transform = `translateX(${offset}px)`;
    updateFocus();
}

// Inicializa o foco no primeiro item
updateFocus();