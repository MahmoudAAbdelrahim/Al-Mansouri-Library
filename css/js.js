let lis =document.getElementById('lis');
let liss =document.getElementById('liss');
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

            function togglePasswordVisibility() {
    var passwordInput = document.getElementById("passwordInput");
    var passwordToggleIcon = document.querySelector(".password-toggle-icon i");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordToggleIcon.classList.remove("fa-eye");
        passwordToggleIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        passwordToggleIcon.classList.remove("fa-eye-slash");
        passwordToggleIcon.classList.add("fa-eye");
    }
}