let btn = document.getElementById('btn')
let more = document.getElementById('more');

btn.onclick = (e) => {
    e.preventDefault();
    // btn.remove();
    if(btn.innerHTML == 'See More') {
        btn.innerHTML = 'Show Less'
        more.style.display = 'inline';
    }else {
        btn.innerHTML = 'See More'
        more.style.display = 'none';
    }
    
}