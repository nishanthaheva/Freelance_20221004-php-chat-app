const searchBar = document.querySelector(".user .search input"),
searchBtn = document.querySelector(".user .search button"),
usersList = document.querySelector(".user .list-user");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value= "";
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest(); //object
    xhr.open("POST", "php/search.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);

}

setInterval(() =>{
     //Ajax
     let xhr = new XMLHttpRequest(); //object
     xhr.open("GET", "php/users.php", true);
     xhr.onload = ()=>{
         if(xhr.readyState === XMLHttpRequest.DONE){
             if(xhr.status === 200){
                 let data = xhr.response;
                 if(!searchBar.classList.contains("active")){
                    usersList.innerHTML = data;
                 }
             }
         }
     }
     xhr.send();
}, 500);