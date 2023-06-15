export const product = {
    props: ['product', 'index'],
    template: `
    <div class="product">
        <div class="product-image">
            <img :src="product.thumbnail" alt="">
            <div class="overlay">
                <a href="#"><i class="far fa-heart"></i></a>
                <a href="#"><i class="fas fa-chain"></i></a>
            </div>
        </div>
        <div class="product-info">
            <h3>{{ product.title }}</h3>
            <div class="product-price">
                <span class="price">
                    {{ '$' + product.price }}
                </span>
                - 
                <span class="price">
                    {{ '$' + (product.price * quantity) }}
                </span>
            </div>
            
            <div class="action">
                <input min="1" v-model="quantity" type="number" name="">
                <button @click="addToCart(index, quantity)">Add to Cart</button>
            </div>
        </div>
    </div>
    `,
    data() {
        return {
            quantity: 1
        }
    },
    methods: {
        addToCart: function(index, quantity) {
            this.$emit('addcart', index, quantity)
            this.quantity = 1
        }
    }
}