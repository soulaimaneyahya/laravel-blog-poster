// data-dropdown-toggle="postActionsDotsDropdown"
// aria-labelledby="postActionsDotsDropdownButton"
$(document).ready(function () {
    // accounts
    $(".profileDropDownNavbarLink").click(function () {
        // $("#profileDropDownNavbar").toggle(); // block, none
        $("#profileDropDownNavbar").toggleClass("hidden");
        $("#profileDropDownNavbar").toggleClass("block");

        // hide appearance
        $("#toggleAppearanceMenu").addClass("hidden");
        $("#toggleAppearanceMenu").removeClass("block");
    });

    // appearance
    $("#toggleAppearance").click(function () {
        $("#toggleAppearanceMenu").toggleClass("hidden");
        $("#toggleAppearanceMenu").toggleClass("block");

        // hide accounts
        $("#profileDropDownNavbar").addClass("hidden");
        $("#profileDropDownNavbar").removeClass("block");
    });

    // posts
    $(".postActionsDotsDropdownDots").click(function () {
        // $("#postActionsDotsDropdown-" + $(this).data('id')).toggle(); // block, none
        $("#postActionsDotsDropdown-" + $(this).data('id')).toggleClass("hidden");
        $("#postActionsDotsDropdown-" + $(this).data('id')).toggleClass("block");
    });
});
