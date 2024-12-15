function togglePasswordVisibility() {

    var passwordInput = document.getElementById("passwordInput");
    var passwordToggleIcon = document.querySelector(".password-toggle-icon i");

    // @ts-ignore
    if (passwordInput.type === "password") {
        // @ts-ignore
        passwordInput.type = "text";
        // @ts-ignore
        passwordToggleIcon.classList.remove("fa-eye");
        // @ts-ignore
        passwordToggleIcon.classList.add("fa-eye-slash");
    } else {
        // @ts-ignore
        passwordInput.type = "password";
        // @ts-ignore
        passwordToggleIcon.classList.remove("fa-eye-slash");
        // @ts-ignore
        passwordToggleIcon.classList.add("fa-eye");
    }
};




// @ts-ignore
let lis =document.getElementById('lis');
// @ts-ignore
let liss =document.getElementById('liss');
// @ts-ignore
let input1 = document.getElementById('input1');

        lis?.addEventListener('click' ,function(){
          // @ts-ignore
          input1.classList.remove("hidde")});
          lis?.addEventListener('click' ,function(){
            // @ts-ignore
            lis.classList.add("hidde")});

          liss?.addEventListener('click' ,function(){
          // @ts-ignore
          input1.classList.add("hidde")});
          liss?.addEventListener('click' ,function(){
            // @ts-ignore
            lis.classList.remove("hidde")});
