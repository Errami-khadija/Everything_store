
    function showNotification(message, type) {
        toastr.options = {
            closeButton: false,
            progressBar: true,
            positionClass: "toast-bottom-right",
            showDuration: 300,
            hideDuration: 1000,
            timeOut: 5000,
            extendedTimeOut: 1000,
        };

        toastr.clear(); 


        if (type === "success") {
            toastr.success(message, "", { className: "toast-success" });
        } else {
            toastr.error(message, "", { className: "toast-error" });
        }
    }

// ================== products filter ====================== //

$(document).ready(function () {

    // initialize Isotope
    var $grid = $('.row.products-row').isotope({
        itemSelector: '.col-lg-3',
        layoutMode: 'fitRows'
    });

    // filter items on button click
    $('.filters').on('click', 'a', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });

});

document.addEventListener("DOMContentLoaded", function () {
    const openButton = document.querySelector(".cart");
    const cartButton = document.querySelector(".cart-mobile");
    const add = document.querySelector(".add-to-cart");
    const cartSection = document.querySelector(".shopping-cart");

    // Function to toggle the visibility of the shopping cart section
    function toggleCart() {
        cartSection.classList.toggle("show-cart");
    }

    // Event listener for the open button
    openButton.addEventListener("click", toggleCart);

    // Event listener for the cart button (same functionality as openButton)
    cartButton.addEventListener("click", toggleCart);

    // Event listener for the add button
    add?.addEventListener("click", toggleCart);
});


const scrollers = document.querySelectorAll(".scroller");

// If a user hasn't opted in for recuded motion, then we add the animation
if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    addAnimation();
}

function addAnimation() {
    scrollers.forEach((scroller) => {
        // add data-animated="true" to every `.scroller` on the page
        scroller.setAttribute("data-animated", true);

        // Make an array from the elements within `.scroller-inner`
        const scrollerInner = scroller.querySelector(".scroller__inner");
        const scrollerContent = Array.from(scrollerInner.children);

        // For each item in the array, clone it
        // add aria-hidden to it
        // add it into the `.scroller-inner`
        scrollerContent.forEach((item) => {
            const duplicatedItem = item.cloneNode(true);
            duplicatedItem.setAttribute("aria-hidden", true);
            scrollerInner.appendChild(duplicatedItem);
        });
    });
}


let calcScrollValue = () => {
    let scrollProgress = document.getElementById("progress");
    let porogressValue = document.getElementById("progress-value");
    let pos = document.documentElement.scrollTop;
    let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrollValue = Math.round((pos * 100) / calcHeight);
    if (pos > 100) {
        scrollProgress.style.display = "grid";
    }
    else {
        scrollProgress.style.display = "none";
    }
    scrollProgress.addEventListener("click", () => {
        document.documentElement.scrollTop = 0;
    });
    scrollProgress.style.background = `conic-gradient(#1F1F1F ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
};
window.onscroll = calcScrollValue;
window.onload = calcScrollValue;


$('.owl-carousel.testimonial').owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 8000,
    responsive: {
        0: {
            items: 1
        },
        750: {
            items: 1
        },
        1000: {
            items: 2
        }
    }
})

// ---------------- preloader -------------------- //

var loader = document.getElementById("preloader");
window.addEventListener("load", function () {
    loader.style.display = "none";
})



function rotateIcon(iconId) {
    const icon = document.getElementById(iconId);
    icon.classList.toggle('rotated');
}

//   ------------- numbers counter -----------------//

$(document).ready(function () {
    $(".counter").counterUp({
        delay: 10,
        time: 1200,
    });
});


// ------------- End of numbers counter -----------------//

// ============== start shopping cart and Checkout============== //
