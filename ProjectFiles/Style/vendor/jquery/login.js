// Get the modal
var modal = document.getElementById('login-modal');

var modaltwo = document.getElementById('register-modal');

var modaladmin = document.getElementById('admin-modal');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
