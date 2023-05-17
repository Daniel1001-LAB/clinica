// Header Scroll
let nav = document.getElementById("navbar");
window.onscroll = function() {
    if(document.documentElement.scrollTop > 100){
        nav.classList.add("header-scrolled");
    }else{
        nav.classList.remove("header-scrolled");
    }
}

// nav hide
let navBar = document.querySelectorAll(".nav-link");
navBar.forEach(function(elem) {
    elem.addEventListener("click", function() {
        let nav = document.getElementById("navbar");
        nav.classList.add("hidden");
    });
});
