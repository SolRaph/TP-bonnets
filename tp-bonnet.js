let modal = document.querySelector("#modal");
let btnmodal = document.querySelector("#openmodal");
let close = document.querySelector("#close");

btnmodal.addEventListener("click", ()=> {
    modal.showModal()
})
close.addEventListener("click", ()=> {
    modal.close()
})
