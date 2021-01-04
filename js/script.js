//------- Global Navigation -------//
! function(o) {
    "use strict";
    o("body").on("input propertychange", ".floating-label-form-group", function(i) { o(this).toggleClass("floating-label-form-group-with-value", !!o(i.target).val()) }).on("focus", ".floating-label-form-group", function() { o(this).addClass("floating-label-form-group-with-focus") }).on("blur", ".floating-label-form-group", function() { o(this).removeClass("floating-label-form-group-with-focus") });
    if (992 < o(window).width()) {
        var s = o("#mainNav").height();
        o(window).on("scroll", { previousTop: 0 }, function() {
            var i = o(window).scrollTop();
            i < this.previousTop ? 0 < i && o("#mainNav").hasClass("is-fixed") ? o("#mainNav").addClass("is-visible") : o("#mainNav").removeClass("is-visible is-fixed") : i > this.previousTop && (o("#mainNav").removeClass("is-visible"), s < i && !o("#mainNav").hasClass("is-fixed") && o("#mainNav").addClass("is-fixed")), this.previousTop = i
        })
    }
}(jQuery);

//------- Night Mode -------//
function nightMode() {
    var checkBox = document.getElementById("btnDarkMode");
    if (checkBox.checked == true) {
        $("#main-body").addClass("bg-dark");
        $("#main").addClass("bg-dark");
        $("#main").addClass("text-light");
        $("#text-colour").addClass("text-light");
        $(".accordion").addClass("text-light");
        $(".accordion-content").addClass("text-light");
        $("body").addClass("bg-dark");
    } else {
        $("#main-body").removeClass("bg-dark");
        $("#main").removeClass("bg-dark");
        $("#main").removeClass("text-light");
        $("#text-colour").removeClass("text-light");
        $(".accordion").removeClass("text-light");
        $(".accordion-content").removeClass("text-light");
        $("body").removeClass("bg-dark");
    }
}

//------- Filter Collapse -------//
$(window).resize(function() {
    var checkBox = document.getElementById("btnFilter");
    const width = Math.max(
        document.documentElement.clientWidth,
        window.innerWidth || 0
    )
    if (width <= 768) {
        checkBox.checked = false;
        $("#sidebar").removeClass("show");
        filterCollapse();
    } else {
        filterCollapse();
    }
});

function filterCollapse() {
    var checkBox = document.getElementById("btnFilter");
    if (checkBox.checked == false) {
        $("#mainItem").addClass("col-xl-12 col-lg-12 col-md-12 col-sm-12");
        $("[name='productlist']").removeClass("col-xl-4 col-lg-6 col-md-12");
        $("[name='productlist']").addClass("col-xl-3 col-lg-3 col-md-4 col-sm-6");
    } else {
        $("#mainItem").removeClass("col-xl-12 col-lg-12 col-md-12 col-sm-12");
        $("[name='productlist']").addClass("col-xl-4 col-lg-6 col-md-12");
        $("[name='productlist']").removeClass("col-xl-3 col-lg-3 col-md-4 col-sm-6");
    }
}

//------- Accordion -------//
$(".accordion").on("click", ".accordion-header", function() {
    $(this).toggleClass("active").next().slideToggle();
});

//------- Product Navigation -------//
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navProduct").style.top = "0";
    } else {
        document.getElementById("navProduct").style.top = "-300px";
    }
    prevScrollpos = currentScrollPos;
}

document.getElementsByClassName("navbar-toggler")[0].addEventListener("click", toogleClass);

function toogleClass() {
    document.getElementsByClassName("hamburger-menu")[0].classList.toggle('open')
}

function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}