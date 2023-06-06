let products = [
    {
        title: 'Product 1',
        price: 100,
        features: 'Feature 1, Feature 2, Feature 3',
        content: 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, itaque.',
        reviews: [
            {
                star: 4,
                text: 'dddddd'
            },
            {
                star: 2,
                text: 'dddddd'
            },
            {
                star: 5,
                text: 'dddddd'
            },
            {
                star: 4,
                text: 'dddddd'
            },
        ]
    },
    {
        title: 'Product 2',
        price: 100,
        features: 'Feature 11, Feature 22, Feature 33',
        content: 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, itaque.'
    },
    {
        title: 'Product 3',
        price: 100,
        features: 'Feature 111, Feature 222, Feature 333',
        content: 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, itaque.',
        reviews: [
            {
                star: 4,
                text: 'aaaa'
            },
            {
                star: 2,
                text: 'aaaaaa'
            },
            {
                star: 5,
                text: 'aaaa'
            },
            {
                star: 1,
                text: 'aaaa'
            },
        ]
    },
    {
        title: 'Product 4',
        price: 100,
        features: 'Feature 1, Feature 2, Feature 3, Feature 3, Feature 3',
        content: 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, itaque.'
    }
]

let wrapper = document.querySelector('.wrapper');

products.forEach(el => {

    // let parent = document.createElement('div');
    // let title = document.createElement('h2');
    // let price = document.createElement('strong');

    // title.innerHTML = el.title;
    // price.innerHTML = el.price;

    // parent.appendChild(title)
    // parent.appendChild(price)

    let features = el.features.split(',').map(el => `<span>${el}</span>`).join('');

    let rev_avg = 0 
    if(el.reviews) {
        let rev = el.reviews
        .filter(el => el.star >= 3)

        let count = rev.length;

        rev = rev.reduce((prev, el) => {
            return prev + el.star;
        }, 0)

        rev_avg = (rev / count).toFixed(2);
    }
    
    // <i>${rev_avg ? rev_avg : 'Not rated yet'}</i>

    let item = `
    <div class="product">
        <h2>${el.title}</h2>
        <strong>${el.price}$</strong>
        <i>${rev_avg || 'Not rated yet'}</i>
        ${features}
        <p>${el.content}</p>
        <button class="del">x</button>
    </div>
    `

    wrapper.innerHTML += item;
    // wrapper.appendChild(parent)

})


// let btns = document.querySelectorAll('.wrapper .product button');

// btns.forEach(btn => {
//     btn.onclick = () => {
//         btn.parentElement.remove();
//     }
// })

let wrapper2 = document.querySelector('.wrapper')

wrapper2.onclick = (e) => {
    if(e.target.classList.contains('del')) {
        if(confirm('Are you sure?!')) {
            e.target.parentElement.remove();
        }
        
    }
}