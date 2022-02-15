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
    var modal = document.querySelector("#modal");
    var modalOverlay = document.querySelector("#modal-overlay");
    var closeButton = document.querySelector("#close-button");
    var openButton = document.querySelector("#open-button");

    closeButton.addEventListener("click", function() {
        modal.classList.toggle("closed");
        modalOverlay.classList.toggle("closed");
    });

    openButton.addEventListener("click", function() {
        modal.classList.toggle("closed");
        modalOverlay.classList.toggle("closed");
    });

});

