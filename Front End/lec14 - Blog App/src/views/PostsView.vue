<script setup>
import { onMounted, reactive, ref } from 'vue';
import axios from 'axios';

const posts = ref([]);
// const posts = reactive();
const loading = ref(true)

onMounted(() => {
    axios.get('https://dummyjson.com/posts')
    .then(res => {
        // console.log(res.data.posts);
        posts.value = res.data.posts
        loading.value = false
    })
})

const filterText = (text) => {
    return text.split(/\s+/).slice(0, 10).join(" ") + ' ...';
}
</script>

<template>
    <section class="py-12 text-center">
        <h1 class="text-lg">All Posts</h1>
        <div v-if="loading">Content Loading...</div>
        
        <div class="flex justify-center flex-wrap">
            <div class="w-1/3 mb-6" v-for="post in posts" :key="post.id">
                <div class="border p-5 h-[100%] mx-3">
                    <h2 class="text-3xl bold">
                        <router-link :to="'/posts/' + post.id">{{ post.title }}</router-link>
                    </h2>
                    <p>{{ filterText(post.body) }}</p>
                </div>
            </div>
        </div>

    </section>
</template>

<style lang="scss" scoped>

</style>