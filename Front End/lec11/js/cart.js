const { createApp } = Vue

createApp({
    data() {
        return {
            products: [],
            carts: []
        }
    },

    mounted: function() {
        axios.get('https://dummyjson.com/products?limit=4')
        .then(res => {
            this.products = res.data.products
        })

        this.carts = JSON.parse(localStorage.getItem('carts')) ?? []
    },
    methods: {
        addToCart: function(index) {
            let item = {
                id: this.products[index].id,
                title: this.products[index].title,
                price: this.products[index].price,
                thumbnail: this.products[index].thumbnail,
                quantity: 1,
                total: this.products[index].price * 1
            }
            this.carts.push( item );
        },

        deleteCart: function(index) {
            console.log(index);
            this.carts.splice(1, index)
        }
    },
    // watch: {
    //     carts: function() {
    //         localStorage.setItem('carts', JSON.stringify(this.carts))
    //     }
    // }
    watch: {
        carts: {
          handler() {
            localStorage.setItem('carts', JSON.stringify(this.carts))
          },
          deep: true
        }
      }
}).mount('.app')