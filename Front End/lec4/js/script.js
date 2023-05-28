let menu = document.getElementById('menu')
let openmenu = document.getElementById('openmenu')

// openmenu.addEventListener('click', function() {
//     alert(5)
// })

openmenu.onclick = function() {

    // console.log(menu.style.display);

    // if(menu.style.display == 'block') {
    //     menu.style.display = 'none'
    // }else {
    //     menu.style.display = 'block'
    // }

    menu.classList.toggle('open');
}