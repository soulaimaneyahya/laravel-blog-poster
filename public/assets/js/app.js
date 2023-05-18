// Hide Alert After 9 Seconds

let s_alert = document.querySelector('.alert_');

function hideAlert() {
    if (s_alert) {
        s_alert.remove();
    }
}
setTimeout(hideAlert, 9000);
