const body = document.getElementsByTagName("body")[0];
console.log()
var lst_advertise = [];
body.childNodes.forEach(child => {
    if(child.className === "presentation"){
        child.childNodes.forEach(childd => {
           if(childd.className === "pannel"){
               childd.childNodes.forEach(childdd => {
                   if(childdd.className === "grid_row"){
                       childdd.childNodes.forEach(el => {
                           lst_advertise.push(el);
                       })
                   }
               });
           }
        });
    }
});
lst_advertise.forEach(el => {
   el.addEventListener("click", () => {
       document.cookie = "advertise="+el.dataset.id;
       window.location.href="http://localhost:8080/C_annonce/index/"+el.dataset.id;
   });
   console.log("setup");
});

function getCookie(name){
    if(document.cookie.length === 0)
        return null;
    const regSepCookie = new RegExp('(; )', 'g');
    const cookies = document.cookie.split(regSepCookie);
    for(let i = 0; i < cookies.length; i++){
        const regInfo = new RegExp('=', 'g');
        const infos = cookies[i].split(regInfo);
        if(infos[0] === name){
            return unescape(infos[1]);
        }
    }
    return null;
}