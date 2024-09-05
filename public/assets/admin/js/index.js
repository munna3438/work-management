// dropdown

$(".dropdown_head").click(function (e) {
    $(".accordion").find(".dropdown_head").removeClass("active");
    $(this).addClass("active");
    if ($(this).parent().find(".dropdown_inner").hasClass("show")) {
        $(this).parent().find(".dropdown_inner").removeClass("show").slideUp();
    } else {
        $(".accordion").find(".dropdown_inner").removeClass("show").slideUp();
        $(this)
            .parent()
            .find(".dropdown_inner")
            .toggleClass("show")
            .slideToggle();
    }
});

// hide alert
$(".hide_area").click(function () {
    $(this).parent().hide();
});
