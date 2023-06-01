
let wave1 = document.getElementById("wave1");
let wave2 = document.getElementById("wave2");
let wave3 = document.getElementById("wave3");
let wave4 = document.getElementById("wave4");
let hamburger = document.getElementById("ham");
let header = document.getElementById("cont");

window.addEventListener("scroll",function(){
    let val = window.scrollY;
    wave1.style.backgroundPositionX = 400+val*4+"px";
    wave2.style.backgroundPositionX = 300+val*-4+"px";
    wave3.style.backgroundPositionX = 200+val*2+"px";
    wave4.style.backgroundPositionX = 100+val*-2+"px";
})

window.addEventListener("scroll", reveal);

function reveal(){
    var houdini = document.querySelectorAll('.houdini');
    for (let i=0;i<houdini.length;i++){
        var winHeight = window.innerHeight;
        var houdiniTop = houdini[i].getBoundingClientRect().top;
        var houdiniPoint = 80;

        if (houdiniTop<winHeight-houdiniPoint){
            houdini[i].classList.add('houdini_deactive');
        }
        else{
            houdini[i].classList.remove('houdini_deactive');
        }
    }
}


hamburger.addEventListener("click",function(){
    hamburger.classList.toggle("on");
    header.classList.toggle("extended");
})