//slider
new Swiper('.swiper', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    slidesPerView: 2,
    breakpoints: {
        100: {
            slidesPerView: 1,
        },
        751: {
            slidesPerView: 2,
        }
    },
});



//timer
var now = new Date();
var timeup = now.setSeconds(now.getSeconds() + 1800);


var counter = setInterval(timer, 1000);

function timer() {
    now = new Date();
    count = Math.round((timeup - now)/1000);
    if (now > timeup) {
        window.location = "/logout"; //or somethin'
        clearInterval(counter);
        return;
    }
    var seconds = Math.floor((count%60));
    var minutes = Math.floor((count/60) % 60);
    document.getElementById("timer").innerHTML = minutes + ":" + seconds;
}

// input
input1.onfocus = function() {
    x=document.getElementById('span1');
    x.classList.remove("hide");
};

input1.onblur = function() {
    x=document.getElementById('span1');
    x.classList.add("hide");
};


input2.onfocus = function() {
    x=document.getElementById('span2');
    x.classList.remove("hide");
};

input2.onblur = function() {
    x=document.getElementById('span2');
    x.classList.add("hide");
};


