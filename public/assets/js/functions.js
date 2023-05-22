let s_alert = document.querySelector('.alert_');

// set cookies
function setCookie(cookieName, cookieValue, daysToExpire) {
    var date = new Date();
    date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
    var expires = "expires=" + date.toUTCString();
    document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
}

function setTheme(theme) {
    setCookie('selected-theme', theme, 30); // Example: Setting cookie for 30 days
    location.reload();
}

function hideAlert() {
    if (s_alert) {
        s_alert.remove();
    }
}
setTimeout(hideAlert, 2000);
