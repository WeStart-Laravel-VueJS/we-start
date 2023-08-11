<script setup>
// import axios from "axios";
import { ref } from "vue";
import { useRouter } from 'vue-router';
const router = useRouter();

const blog = ref({
    title: '',
    body : '',
    image: ''
})

const errors = ref({})

// 127.0.0.1:8000
const storeData = () => {
    axios.post('/api/blogs', blog.value, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
    })
    .then(res => {
        router.push('/');
    })
    .catch((error)=> {
        errors.value = error.response.data.errors
    })
}

const handleFileChange = (event) => {
    blog.value.image = event.target.files[0];
}

</script>

<template>
    <div class="p-5">
        <h1>Blog Create</h1>
        <form @submit.prevent="storeData()">
            <div class="mb-3">
                <label>Title</label>
                <input type="text" class="form-control" :class="{'is-invalid' : errors.title}" v-model="blog.title" />
                <small v-if="errors.title" class="invalid-feedback">{{ errors.title[0] }}</small>
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" class="form-control" @change="handleFileChange" />
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

</style>
