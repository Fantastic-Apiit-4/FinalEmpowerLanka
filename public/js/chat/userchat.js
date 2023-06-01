const form = document.querySelector('.type_text');

const txtbtn = form.querySelector('button');
const txtcontent = form.querySelector('.text_content');
const chatarea = document.querySelector('.chat_box');

form.onsubmit = (e)=>{
    e.preventDefault();
}

txtbtn.onclick =()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST",'/addchat',true);
    xhr.onload = ()=>{
      if(xhr.readyState===XMLHttpRequest.DONE){
          if(xhr.status === 200){
            txtcontent.value = "";
            scrollonNewText();
           
          }
      }
    }
    var formData = new FormData(form);
    xhr.send(formData);
};
chatarea.onmouseenter = ()=>{
    chatarea.classList.add('active');
}
chatarea.onmouseleave = ()=>{
    chatarea.classList.remove('active');
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST",'/refresh',true);
    xhr.onload = ()=>{
      if(xhr.readyState===XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              chatarea.innerHTML = data;
              if(!chatarea.classList.contains('active')){
                scrollonNewText();
              }
              
              
          }
      }
    }
    var formData = new FormData(form);
    xhr.send(formData);
},500);

function scrollonNewText(){
    chatarea.scrollTop = chatarea.scrollHeight;
}


/* side panel */


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

const getusers = ()=> {
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
};


getusers();