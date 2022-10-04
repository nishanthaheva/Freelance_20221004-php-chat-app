const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error"); 

form.onsubmit = (a)=>{
    a.preventDefault();
}

continueBtn.onclick = ()=>{
    //Ajax
    let xhr = new XMLHttpRequest(); //object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                // console.log(data);
                if(data == "success"){
                    location.href = "users.php";
                }else{
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }
    //send data to php using Ajax
    let formData = new FormData(form);
    xhr.send(formData); //send form data to php
}