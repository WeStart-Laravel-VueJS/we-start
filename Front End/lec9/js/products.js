window.onload = () => {

    getAllCategories();
    getAllProducts();

}

let getAllCategories = () => {
    let categories = document.querySelector('.categories')
    axios.get('https://dummyjson.com/products/categories')
    .then(res => {
        let all = `<a onclick="filterCategory(event)" href="https://dummyjson.com/products">All Products </a>`
        categories.innerHTML += all
        res.data.forEach(el => {
            let title = el.split('-').map(el => {
                return el.replace( el.charAt(0), el.charAt(0).toUpperCase() );
            }).join(' ')

            let a = `<a onclick="filterCategory(event)" href="https://dummyjson.com/products/category/${el}">${title}</a>`

            categories.innerHTML += a
        });
    })
}



function getAllProducts(url = 'https://dummyjson.com/products', skip = 0) {
    let products = document.querySelector('.products .result')
    
    let pages = document.querySelector('.pagination')

    document.querySelector('.lds-roller').style.display = 'block'
    products.innerHTML = ''
    axios.get(url+`?skip=${skip}&limit=12`)
    .then(res => {
        document.querySelector('.lds-roller').style.display = 'none'
        let page_number = 0
        res.data.products.forEach(el => {
            let product = `<div class="product">
            <img src="${el.thumbnail}" alt="">
            <div class="content">
                <div class="title">
                    <h3>${el.title}</h3>
                    <strong>${el.price}$</strong>
                </div>
                <p>${el.description}</p>
                <a href="https://dummyjson.com/products/${el.id}">Read More</a>
            </div>
            </div>`

            page_number = Math.ceil(res.data.total / res.data.limit)

            // console.log(page_number);

            

            products.innerHTML += product
        });

        if(pages.innerHTML == '') {
            for(let i = 1 ; i <= page_number ; i++) {
                pages.innerHTML += `<a class="${i == 1 ? 'active' : ''}" onclick="showPage(event,${i-1})">${i}</a>`
            }
        }
        
    })
}

function filterCategory(e) {
    e.preventDefault()

    let url = e.target.href
    if(e.target.parentElement.querySelector('.active')) {
        e.target.parentElement.querySelector('.active').classList.remove('active');
    }

    // console.log(e.target.innerHTML != 'All Products ');
    if(e.target.innerHTML != 'All Products ') {
        e.target.classList.add('active')
    }
    
    getAllProducts(url)
}




function showPage(e, page) {
    let url = 'https://dummyjson.com/products';
    let skip = page * 12;

    if(e.target.parentElement.querySelector('.active')) {
        e.target.parentElement.querySelector('.active').classList.remove('active');
    }
    e.target.classList.add('active');

    getAllProducts(url, skip)
}