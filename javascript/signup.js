const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error"); 

form.onsubmit = (a)=>{
    a.preventDefault();
}

continueBtn.onclick = ()=>{
    //Ajax
    let xhr = new XMLHttpRequest(); //object
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "users.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }
    //send data to php using Ajax
    let formData = new FormData(form);
    xhr.send(formData);
}



