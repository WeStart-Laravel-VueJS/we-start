<script setup>
import axios from 'axios';
import { onMounted } from 'vue';


const props = defineProps({
    id: {
        type: String
    }
})

onMounted(() => {
    axios.get('https://dummyjson.com/posts/'+props.id)
    .then(res => {
        // console.log(res);
        document.title = res.data.title
    })
})

</script>

<template>
    <section class="py-12 text-center">
        <h1>Post Title</h1>
        <p></p>
    </section>
</template>

<style lang="scss" scoped>

</style>