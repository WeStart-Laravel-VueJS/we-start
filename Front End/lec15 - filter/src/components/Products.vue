<template>
    <div class="bg-white flex py-16  sm:py-24 max-w-screen-xl mx-auto">
        <div class="w-2/12 px-6">
            <h2 class="text-lg font-bold tracking-tight text-gray-900">
                Filter By Category
            </h2>
            <ul class="mt-4">
                <li v-for="(category, index) in categories" :key="index">
                    <label>
                        <input v-model="selected_categories" :value="category" type="checkbox" > {{ category }}
                    </label>
                </li>
            </ul>

            <hr class="my-8">

            <h2 class="text-lg mb-6 font-bold tracking-tight text-gray-900">
                Filter By Price
            </h2>
            
            <div class="flex justify-between">
                <label for="default-range" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Min</label> 
                <span>{{ min }}</span>
            </div>
            <input v-model="min" id="default-range" type="range" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" max="1000">


            <div class="flex justify-between">
                <label for="default-range" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Max</label> 
                <span>{{ max }}</span>
            </div>
            <input v-model="max" id="default-range" type="range" max="10000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" min="1000">
        </div>

        <div class="w-10/12">
            <div class="mx-auto max-w-2xl px-4  sm:px-6 lg:max-w-7xl lg:px-8">

                <div class="flex justify-between">
                    <div class="relative w-1/2">
                        <input v-model="search" type="text" class="border-2 rounded px-5 py-2 outline-none w-full">
                        <MagnifyingGlassIcon class="w-5 absolute right-2 top-3 text-gray-400"/>
                    </div>

                    <select v-model="orderby" class="border-2 rounded px-5 py-2">
                        <option value="ASC">ASC</option>
                        <option value="DESC">DESC</option>
                    </select>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    <ProductItem v-for="product in filteredProduct" :key="product.id" :product="product" />
                </div>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import ProductItem from './ProductItem.vue'
import { MagnifyingGlassIcon } from '@heroicons/vue/24/solid'
import { computed, onMounted, ref } from 'vue';
import axios from 'axios'

// const products = [
//     {
//         id: 1,
//         name: "Basic Tee",
//         href: "#",
//         imageSrc:
//             "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
//         imageAlt: "Front of men's Basic Tee in black.",
//         price: "$35",
//         color: "Black",
//     }
// ];

const products = ref([])
const categories = ref([])

// Init value for filter
const orderby = ref('ASC');
const search = ref('');
const selected_categories = ref([]);
const min = ref(0);
const max = ref(1000);



onMounted(() => {
    axios.get('https://dummyjson.com/products')
    .then(res => {
        products.value = res.data.products
    })

    axios.get('https://dummyjson.com/products/categories')
    .then(res => {
        categories.value = res.data
    })

    selected_categories.value = JSON.parse(localStorage.getItem('selected_categories'))
})

// const filteredProduct = () => {
//     // console.log('Run');
//     if(search.value.length > 0) {
//         products.value = products.value.filter(e => {
//             return e.title.toLowerCase().includes(search.value.toLowerCase())
//         })
//     }
// }


const filteredProduct = computed(() => {

    let result = products.value

    if(search.value.length > 0) {
        // result = products.value.filter(e => e.title.includes(search.value))
        result = products.value.filter(e => {
            return e.title.toLowerCase().includes(search.value.toLowerCase())
        })
    }

    if(orderby.value == 'DESC') {
        result.sort((a, b) => b.id - a.id)
    }

    if(selected_categories.value.length > 0) {
        result = result.filter(e => selected_categories.value.includes(e.category))
        localStorage.setItem('selected_categories', JSON.stringify(selected_categories.value))
    }else {
        localStorage.setItem('selected_categories', JSON.stringify([]))
    }


    if(min.value > 0) {
        result = result.filter(e => e.price > min.value)
    }

    if(max.value > 1000) {
        result = result.filter(e => e.price < max.value)
    }

    // if(max.value > 1000) {
    //     result = result.filter(e => e.price > max.value)
    // }

    return result
})

</script>