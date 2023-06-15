const { createApp } = Vue
import { product } from './product.js'

createApp({
    components: {
        product
    },
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
        addProductToCart: function(index, quantity) {

            let cart = this.carts.find(cart => cart.id === this.products[index].id)

            if(cart) {
                cart.quantity = cart.quantity + quantity;
                // cart.total = cart.total + (cart.price * quantity );
            }else {
                let item = {
                    id: this.products[index].id,
                    title: this.products[index].title,
                    price: this.products[index].price,
                    thumbnail: this.products[index].thumbnail,
                    quantity: quantity,
                    // total: this.products[index].price * quantity
                }
                this.carts.push( item );
            }

            
        },
        deleteCart: function(index) {
            console.log(index);
            // this.carts.splice(1, index)
            this.carts.splice(index, 1)
            
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
    },
    computed: {
        cartTotal: function() {
            let total = 0;
            this.carts.forEach(el => total += el.quantity * el.price)
            return total;
        }
    }
}).mount('.app')