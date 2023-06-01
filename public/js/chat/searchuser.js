const searchbar = document.querySelector('.user_dashboard .search_user input');
const sbtn = document.querySelector('.user_dashboard .search_user button');
const userlist = document.querySelector('.user_dashboard .user_list');

sbtn.onclick = ()=>{
    searchbar.classList.toggle('active');
    searchbar.focus();
    sbtn.classList.toggle('active');
    searchbar.value ="";
};

searchbar.onkeyup = ()=>{
    let searcheduser = searchbar.value; 
    if(searcheduser != ""){
        searchbar.classList.add("active");
    }
    else{
        searchbar.classList.remove("active");
        
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST",'/search',true);
    xhr.onload = ()=>{
      if(xhr.readyState===XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              userlist.innerHTML =data;
              console.log(data);
              
          }
      }
    }
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    xhr.send("s_user=" + searcheduser);
};

setInterval(function() {
    fetch('/chats')
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
        if(!searchbar.classList.contains("active")){
            userlist.innerHTML =data;
          }
      
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });
}, 500);