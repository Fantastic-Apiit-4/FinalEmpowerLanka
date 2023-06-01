const form = document.querySelector('.addcomment');

const cmtbtn = form.querySelector('.commentbtn');
const txtcontent = form.querySelector('#commenttxt');
const cmntbox = document.querySelector('#cmtbox');


form.onsubmit = (e)=>{
    e.preventDefault();
}

cmtbtn.onclick =()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST",'/addc',true);
    xhr.onload = ()=>{
      if(xhr.readyState===XMLHttpRequest.DONE){
          if(xhr.status === 200){
            txtcontent.value = "";
            getcomm();
           
          }
      }
    }
    var formData = new FormData(form);
    xhr.send(formData);
};

window.onload = ()=>{
    getcomm();
};

const getcomm = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST",'/getcomm',true);
    xhr.onload = ()=>{
      if(xhr.readyState===XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              cmntbox.innerHTML = data;
              
              
              
          }
      }
    }
    var formData = new FormData(form);
    xhr.send(formData);
};