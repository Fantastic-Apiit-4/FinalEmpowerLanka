const form = document.querySelector('#likeform');
const likebtn = form.querySelector('#likebtn');

form.onsubmit = (e)=>{
    e.preventDefault();
}

likebtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST",'/likepost',true);
    xhr.onload = ()=>{
      if(xhr.readyState===XMLHttpRequest.DONE){
          if(xhr.status === 200){
            console.log("added")
          }
      }
    }
    var formData = new FormData(form);
    xhr.send(formData);
};