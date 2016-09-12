/**
 * Created by vulong on 29/07/2016.
 */

/*$(document).ready(function () {
    alert('a');
});*/

(function ($) {
    'use strict';

    var color_icon_button = $(".box-content").attr("data-icon-button");
    var color_icon_button_hover = $(".box-content").attr("data-icon-button-hover");

    $(".box-content").children("div").children().css("color",color_icon_button);
    $(".box-content").children("button").css("background-color",color_icon_button);

    $(".box-content").on("mouseenter",function () {
        $(this).children("div").children().css("color",color_icon_button_hover);
        $(this).children("button").css("background-color",color_icon_button_hover);
    }).on("mouseleave", function () {
        $(this).children("div").children().css("color",color_icon_button);
        $(this).children("button").css("background-color",color_icon_button);
    });

    $("#owl-demo").owlCarousel({

        navigation : false, // Show next and prev buttons
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true,
        pagination: false

        // "singleItem:true" is a shortcut for:
        // items : 1,
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });


    var owl = $("#owl-carousel-img");

    owl.owlCarousel({
        items : 6, //10 items above 1000px browser width
        itemsDesktop : [1000,5], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,3], // betweem 900px and 601px
        itemsTablet: [600,2], //2 items between 600 and 0
        itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
        pagination: false,

        autoPlay: true
    });

    // Custom Navigation Events
    $(".next").click(function(){
        owl.trigger('owl.next');
    });
    $(".prev").click(function(){
        owl.trigger('owl.prev');
    });


    $("#search-icon-fa").on("click",function () {
        if($("#search-2").css("visibility") == "hidden"){
            $("#search-2").css("visibility","visible");
            $(".search-field").focus();
            $(this).css({
                "background-color" : "#E8645A",
                "border-radius" : "5px",
                "box-shadow" : "0px 4px 0px 0px #e2534b"
            });
        }else{
            $("#search-2").css("visibility","hidden");
            $(this).css({
                "background-color" : "unset",
                "border-radius" : "unset",
                "box-shadow" : "unset"
            });
        }
    });


})(jQuery);