document.addEventListener("DOMContentLoaded", function(event) { 

    let route = window.location.pathname;

    // seleccion del menu principal
    let menuItem = document.getElementsByClassName('item-menu');

    // for (let index = 0; index < menuItem.length; index++) {
    //     menuItem[index].addEventListener('click', () => {
    //         for (let j = 0; j < menuItem.length; j++) {
    //             menuItem[j].classList.remove('active');
    //         }
    //         menuItem[index].classList.add('active');
    //     });   
    // }
    
    for (let i = 0; i < menuItem.length; i++) {
        menuItem[i].classList.remove('active');
    }

    switch (route) {
        case '/':
            menuItem[0].classList.add('active');
        
            break;
        case '/habits':
            menuItem[1].classList.add('active');

            break;
        default:
            break;
    }

    // modal
    let modal = document.querySelector("#modal");
    let modalOverlay = document.querySelector("#modal-overlay");
    let closeButton = document.querySelector("#close-button");
    let openButton = document.querySelector(".open-button");

    

    closeButton.addEventListener("click", function() {
        modal.classList.toggle("closed");
        modalOverlay.classList.toggle("closed");
    });

    openButton.addEventListener("click", function() {
        modal.classList.toggle("closed");
        modalOverlay.classList.toggle("closed");
    });

});

function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("clock").innerText = time;
    document.getElementById("clock").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();
