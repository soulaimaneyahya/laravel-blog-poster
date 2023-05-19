$(document).ready(function () {
    var profileDropDownNavbar = $("#profileDropDownNavbar");
    var toggleAppearanceMenu = $("#toggleAppearanceMenu");

    // accounts
    $(".profileDropDownNavbarLink").click(function () {
        profileDropDownNavbar.toggleClass("hidden block");
        toggleAppearanceMenu.addClass("hidden").removeClass("block");
    });

    // appearance
    $("#toggleAppearance").click(function () {
        toggleAppearanceMenu.toggleClass("hidden block");
        profileDropDownNavbar.addClass("hidden").removeClass("block");
    });

    // posts
    $(".postActionsDotsDropdownDots").click(function () {
        var postId = $(this).data('id');
        $("#postActionsDotsDropdown-" + postId).toggleClass("hidden block");
    });
});
