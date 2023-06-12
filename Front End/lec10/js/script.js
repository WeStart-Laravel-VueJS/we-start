// let btn = document.querySelector('button');
// let p = document.querySelector('p');

// btn.onclick = () => {
//     p.innerHTML = parseInt(p.innerHTML) + 1;
//     // document.querySelector('p').innerHTML += parseInt(1);
// }

// $('button').click(() => {
//     $('p').text( parseInt($('p').text()) + 1 )
// })

// Option API
const { createApp } = Vue;

const app1 = createApp({
    data() {
        return {
            // count: 5,
            // product: {
            //     title: 'Product Name',
            //     price: 100
            // },
            // content: '<strong>dd</strong>'

            name: 'Ahmed',
            age: 20,
            password: '123',
            show: false,
            skills: ['HTML', 'CSS', 'JS', 'SASS', 'VUE', 'LARAVEL'],
            marks: {
                Math: 80,
                Java: 88,
                PHP: 91,
                Testing: 65
            },
            search: 'PHP'
        }
    },
    methods: {
        increment() {
            this.count++
            console.log('Done');
        },
        // updateSearch: function(e) {
        //     this.search = e.target.value
        // }
    }
})

app1.mount('.app1')

// createApp({
//     data() {
//         return {
//             count: 1
//         }
//     }
// }).mount('.app2')

