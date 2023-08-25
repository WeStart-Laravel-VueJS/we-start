<script setup>
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";

const route = useRoute()

const props = defineProps({
    slug: String
})

const category = ref({});

onMounted(() => {
    // console.log(route.params.slug);
    console.log(props.slug);

    axios.get('/category/'+props.slug)
    .then(res => {
        if (res && res.data){
            category.value = res.data.data 
        }
    })
})

const final_price = (service) => {
    return service.discount_type == 'fixed' ? service.price - service.discount : service.price - (service.price * (service.discount / 100)) 
}
</script>


<template>
    <div>
        <div class="text-center mb-20">
            <h1 class="text-3xl mt-10 font-medium text-gray-800 uppercase mb-6">{{ category.name }}</h1>
            <img class="mx-auto" :src="category.image" alt="">
        </div>
        
        <!-- new arrival -->
        <div v-if="category.services && category.services.length > 0" class="container pb-16">
            <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">All Services</h2>
            <div class="grid grid-cols-4 gap-6">
                <div v-for="service in category.services" :key="service.id" class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        <img :src="service.image" alt="product 1" class="w-full img-category">
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center 
                        justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="view product">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                            <a href="#"
                                class="text-white text-lg w-9 h-8 rounded-full bg-primary flex items-center justify-center hover:bg-gray-800 transition"
                                title="add to wishlist">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <router-link :to="'/service/'+service.slug">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">{{ service.name_trans }}</h4>
                        </router-link>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <template v-if="service.discount">
                                <p class="text-xl text-primary font-semibold">${{ final_price(service) }}</p>
                                <p class="text-sm text-gray-400 line-through">$
                                    {{ service.price }}
                                </p>
                            </template>
                            <template v-else>
                                <p class="text-xl text-primary font-semibold">${{ service.price }}</p>
                            </template>
                            
                        </div>
                        <div class="flex items-center">
                            <div class="flex gap-1 text-sm text-yellow-400">
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                                <span><i class="fa-solid fa-star"></i></span>
                            </div>
                            <div class="text-xs text-gray-500 ml-3">(150)</div>
                        </div>
                    </div>
                    <a href="#"
                        class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add
                        to cart</a>
                </div>
                
            </div>
        </div>
        <!-- ./new arrival -->
    </div>
</template>

<style lang="scss" scoped>

</style>