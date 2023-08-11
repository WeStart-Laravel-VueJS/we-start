<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
const route = useRoute();
const router = useRouter();

// const props = defineProps({
//     id: {
//         type: String
//     }
// })

const blog = ref({
    title: '',
    body : '',
    image: '',
    _method: 'put'
})

onMounted(() => {
    axios.get(`/api/blogs/${route.params.id}`)
    .then(res => {
        blog.value = res.data.data;
        blog.value._method = 'put'
    })
    // console.log(route.params.id);
    // console.log(props.id);
})

const updateData = () => {
    axios.post(`/api/blogs/${route.params.id}`, blog.value, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
    })
    .then((res) => {
        router.push('/')
    })
}

const handleFileChange = (event) => {
    blog.value.image = event.target.files[0];
    blog.value.prev_img = URL.createObjectURL(blog.value.image);
}

</script>

<template>
    <div class="p-5">
        <h1>Blog Edit</h1>
        <form @submit.prevent="updateData()">
            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control" v-model="blog.title" />
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control" @change="handleFileChange" />
                <img v-if="blog.image" :src="blog.prev_img ? blog.prev_img : '/images/' +blog.image" alt="">
            </div>

            <div class="mb-3">
                <label>Body</label>
                <textarea rows="4" class="form-control" v-model="blog.body"></textarea>
            </div>

            <button class="btn btn-success px-4">Add</button>
        </form>
    </div>
</template>

<style lang="scss" scoped>
    img {
        width: 10%;
        height: auto!important;
        border-radius:.5rem ;
        padding: 3px;
        border: 1px dashed #d7d7d7;
        margin-top: 5px;
    }
</style>

