/* js home page*/
$(document).ready(function () {
    let currentIndex = 0;
    let itemsPerView = getItemsPerView(); // Xác định số mục hiển thị theo kích thước màn hình
    const totalItems = $(".item-category").length;
    let maxIndex = Math.ceil(totalItems / itemsPerView) - 1;

    let isDragging = false;
    let startX, currentTranslate, prevTranslate, animationID;
    const carouselWrapper = $(".carousel-wrapper");

    function getItemsPerView() {
        let screenWidth = $(window).width();
        if (screenWidth <= 760) return 1;  // Mobile
        if (screenWidth >= 768 && screenWidth <= 1024) return 2; // Tablet
        return 3; // Desktop
    }

    function updateCarousel() {
        let screenWidth = $(window).width();
        let newTransform;
        
        if (screenWidth <= 760) {
            newTransform = -currentIndex * 112 + "%"; // Mobile
        } else if (screenWidth >= 768 && screenWidth <= 1024) {
            newTransform = -currentIndex * 108 + "%"; // Tablet
        } else {
            newTransform = -currentIndex * 103 + "%"; // Desktop
        }

        carouselWrapper.css("transform", "translateX(" + newTransform + ")");
    }

    $(".next").click(function () {
        if (currentIndex < maxIndex) {
            currentIndex++;
            updateCarousel();
        }
    });

    $(".prev").click(function () {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    // Xử lý kéo chuột
    carouselWrapper.on("mousedown", function (event) {
        isDragging = true;
        startX = event.pageX;
        prevTranslate = -currentIndex * $(".item-category").outerWidth(true);
        carouselWrapper.css("cursor", "grabbing");
    });

    $(document).on("mousemove", function (event) {
        if (!isDragging) return;

        let currentX = event.pageX;
        let diff = currentX - startX;
        currentTranslate = prevTranslate + diff;
        carouselWrapper.css("transform", `translateX(${currentTranslate}px)`);
    });

    $(document).on("mouseup", function (event) {
        if (!isDragging) return;
        isDragging = false;
        carouselWrapper.css("cursor", "grab");

        let movedBy = event.pageX - startX;
        if (movedBy < -5 && currentIndex < maxIndex) {
            currentIndex++;
        } else if (movedBy > 5 && currentIndex > 0) {
            currentIndex--;
        }

        updateCarousel();
    });
    
    $(document).on('scroll', function() {
        var menu = $('.menu');
        if ($(window).scrollTop() > 300) {
            menu.addClass('fixed');
        }
        if ($(window).scrollTop() === 0) {
            menu.removeClass('fixed');
        }
    });
    

    // Ngăn chặn chọn văn bản khi kéo
    carouselWrapper.on("dragstart", function (event) {
        event.preventDefault();
    });

    // Cập nhật giá trị khi resize màn hình
    $(window).resize(function () {
        itemsPerView = getItemsPerView();
        maxIndex = Math.ceil(totalItems / itemsPerView) - 1;
        updateCarousel();
    });

    // Gọi update lần đầu để đảm bảo hiển thị đúng khi tải trang
    updateCarousel();
});

/* end home page*/

/* js header page */
function open_menu_mobile(){
    $('.menu-m').addClass('active');
    $('.overlay-menu-m').addClass('active');
    $('body').addClass('stop-scroll');
}

function close_menu_mobile(){
    $('.menu-m').removeClass('active');
    $('.overlay-menu-m').removeClass('active');
    $('body').removeClass('stop-scroll');
}

$('.next-menu-level1').click(function(){
    $(this).siblings('.menu-level2').addClass('active');
})

$('.next-menu-level2').click(function(){
    $(this).siblings('.menu-level3').addClass('active');
})

$('.back-menu-level1').click(function(){
    $(this).parents('.menu-level2').removeClass('active');
})

$('.back-menu-level2').click(function(){
    $(this).parents('.menu-level3').removeClass('active');
})

// window scroll 
var header = $('header');
$(window).scroll(function () {
    if ($(window).scrollTop() > 196) {
        header.addClass('affix');
    } else {
        header.removeClass('affix');
    }
}); 
/* end header */

/* js footer page */
var btn_fixed = $('.back-to-top');

$(window).scroll(function () {
    if ($(window).scrollTop() > 800) {
        btn_fixed.addClass('show');
    } else {
        btn_fixed.removeClass('show');
    }
});

$('.back-to-top').on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '1000');
});

/* end footer */

/* js single page */
$('.big-slide').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.thumb-slide'
});

$('.thumb-slide').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.big-slide',
    dots: false,
    arrows: false,
    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 1280,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 5
            }
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 3
            }
        },
    ]
});


$('.product-related-slide').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    responsive: [
        {
            breakpoint: 1280,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 610,
            settings: {
                slidesToShow: 2
            }
        },
    ]
});

$('.custom-prev').click(function(){
    var slide = $(this).data('slide');
    $('.' + slide).slick('slickPrev');
});

$('.custom-next').click(function(){
    var slide = $(this).data('slide');
    $('.' + slide).slick('slickNext');
});


$('.tab_button').click(function(){
    $('.tab_button').removeClass('active');
    $(this).addClass('active');
    var target = $(this).data('tab-target');
    $('.tab-content .tab-pane').removeClass('show active');
    $(target).addClass('show active');
});

/* end single */

/* archive-product-detail */
// đóng mở menu
$( document ).ready(function() {
function toggleSubmenuCategory(className) {
    const allSubmenus = document.getElementsByClassName("openClose");
    const submenu = document.getElementsByClassName(className);

    // Nếu submenu đang mở, đóng nó lại
    let isCurrentlyOpen = submenu.length > 0 && window.getComputedStyle(submenu[0]).display === "block";

    // Đóng tất cả submenu
    for (let i = 0; i < allSubmenus.length; i++) {
        allSubmenus[i].style.display = "none";
    }

    // Nếu submenu được chọn trước đó không mở, mở nó
    if (!isCurrentlyOpen) {
        for (let i = 0; i < submenu.length; i++) {
            submenu[i].style.display = "block";
        }
    }
}


// chọn button
document.addEventListener("DOMContentLoaded", function() {
    const buttons = document.querySelectorAll(".filterProduct .col-8 button");

    buttons.forEach(button => {
        button.addEventListener("click", function() {
            buttons.forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
        });
    });
});

// js xem thêm
document.addEventListener("DOMContentLoaded", function() {
    const toggleBtn = document.querySelector(".toggle-text");
    const textContent = document.querySelector(".text-content");

    toggleBtn.addEventListener("click", function() {
        if (textContent.classList.contains("expanded")) {
            textContent.classList.remove("expanded");
            toggleBtn.textContent = "Xem thêm";
        } else {
            textContent.classList.add("expanded");
            toggleBtn.textContent = "Thu gọn";
        }
    });
});


function changeTab(selectedTab) {
    const tabSorts = document.querySelectorAll(".tabSort");
const indicator = document.querySelector(".tab-indicator");
    tabSorts.forEach(tabSort => tabSort.classList.remove("active"));
    selectedTab.classList.add("active");

    // Di chuyển thanh chỉ báo dưới tab
    const tabRect = selectedTab.getBoundingClientRect();
    const tabsRect = document.querySelector(".tabSorts").getBoundingClientRect();
    indicator.style.width = `${tabRect.width}px`;
    indicator.style.transform = `translateX(${tabRect.left - tabsRect.left}px)`;
}

// Cập nhật vị trí mặc định của thanh chỉ báo ban đầu
window.onload = () => {
    const activeTab = document.querySelector(".tabSort.active");
    changeTab(activeTab);
};


// đóng mở megamenucategory

document.getElementById("categoryMegaMenuBtn").addEventListener("click", function() {
    document.getElementById("categoryMegaMenu").classList.add("show");
});

document.getElementById("closeMegaMenu").addEventListener("click", function() {
    document.getElementById("categoryMegaMenu").classList.remove("show");
});

// Đóng menu khi click ra ngoài
document.addEventListener("click", function(event) {
    let menu = document.getElementById("categoryMegaMenu");
    let button = document.getElementById("categoryMegaMenuBtn");
    if (!menu.contains(event.target) && !button.contains(event.target)) {
        menu.classList.remove("show");
    }
});
})
/* end*/

