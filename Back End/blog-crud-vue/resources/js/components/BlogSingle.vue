<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
    id: {
        type: String
    }
})

const blog = ref()

onMounted(async () => {
    const prod = await axios.get(`/api/blogs/${props.id}`)
    blog.value = prod.data.data
    // .then(res => {
    //     blog.value = res.data.data;
    // })
})

</script>

<template>
    <div class="content text-center p-5" v-if="blog">
        <h1>{{ blog.title }}</h1>
        <img :src="'/images/'+blog.image" alt="">
        <div v-html="blog.body"></div>

    </div>
</template>

<style scoped>
.content img {
    height: 400px;
    width: 60%;
    object-fit: cover;
    margin: 20px 0;
}
</style>

//
