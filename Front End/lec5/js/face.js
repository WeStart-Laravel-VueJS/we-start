// document.getElementById('a').addEventListener('click', function(e) {
//     e.preventDefault()
// })

// document.querySelector('#span').onclick = () => {
//     // window.location.href = 'https://google.ps';
//     window.open('https://google.ps', 'blank')
// }

let btn = document.querySelector('.btn')
let more = document.querySelector('.facebox span')

btn.onclick = (e) => {
    e.preventDefault()
    more.style.display = 'block'
    // btn.remove()
    btn.style.display = 'none';
}

window.onkeyup = (e) => {

    if(e.keyCode == 77) {
        more.style.display = 'block'
        btn.style.display = 'none';
    }

    if(e.keyCode == 27) {
        more.style.display = 'none'
        btn.style.display = 'inline';
    }
}