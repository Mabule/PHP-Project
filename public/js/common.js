const div_load = document.getElementById("onload");
window.addEventListener('load', ()=>{
    div_load.classList.add("fondu");
    div_load.style.zIndex = "-1";
})
