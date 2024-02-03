const form = document.querySelector(".sign-up form"),
continueBtn = form.querySelector(".button input"),
err_msg = form.querySelector(".error-txt");

form.onsubmit = function(e) {
    e.preventDefault();
}
continueBtn.onclick = function(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/signup.php",true);
    xhr.onload = ()=>
    {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                }
                else{
                    err_msg.style.display = "block";
                    err_msg.textContent = data;
                }
            }
        }

    }
    let formData = new FormData(form);
    xhr.send(formData);
}