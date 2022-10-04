const form = document.querySelector(".type-box"),
inputFiled = form.querySelector(".input-info"),
sendBtn = form.querySelector("button"),
chatArea = document.querySelector(".chat-area");

form.onsubmit = (a)=>{
    a.preventDefault();
}

sendBtn.onclick = () =>{
    let xhr = new XMLHttpRequest(); //object
        xhr.open("POST", "php/chat-insert.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    inputFiled.value= ""; //leaves the message box balnk once the message is send to the server
                }
            }
        }
        //send data to php using Ajax
        let formData = new FormData(form);
        xhr.send(formData); //send form data to php
}

setInterval(() =>{
    //Ajax
    let xhr = new XMLHttpRequest(); //object
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chatArea.innerHTML = data;
            }
        }
    }
    //send data to php using Ajax
    let formData = new FormData(form);
    xhr.send(formData); //send form data to php
}, 500);

