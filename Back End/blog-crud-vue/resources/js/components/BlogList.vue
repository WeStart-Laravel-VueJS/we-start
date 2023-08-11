<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import Swal from 'sweetalert2'


const blogs = ref([]);

onMounted(() => {
    axios.get('/api/blogs')
    .then((res) => {
        blogs.value = res.data.data
    })
})

const deleteBlog = (id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
        axios.delete('/api/blogs/'+id)
        .then(res => {
            blogs.value = blogs.value.filter(blog => blog.id != id)
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        })
    }
    })
}

</script>

<template>
    <div class="p-5">
        <h1>All Blogs</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="blog in blogs" :key="blog.id">
                    <td>{{ blog.id }}</td>
                    <td><img width="100" :src="`images/${blog.image}`" alt=""></td>
                    <td>{{ blog.title }}</td>
                    <td>
                        <router-link class="btn btn-warning btn-sm" :to="`/blog/${blog.id}`">Show</router-link>
                        <router-link class="btn btn-primary btn-sm mx-2" :to="`/blog/${blog.id}/edit`">Edit</router-link>
                        <button @click="deleteBlog(blog.id)" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style lang="scss" scoped>

</style>
