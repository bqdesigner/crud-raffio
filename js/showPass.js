// Show password
var showPass = document.getElementById('view-pass');
showPass.onclick = function () {
    var x = document.getElementById('senha');
    if (x.type === "password") {
        x.type = "text";
        showPass.style.opacity = ".5";
    } else {
        x.type = "password";
        showPass.style.opacity = "1";
    }
}
