<script setup>
    import { ref } from 'vue'
    const title = ref('Welcome To Our Website');
    const text = ref('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint, dolorem.');
</script>

<template>
    <div>
        <section class="hero text-center">
            <h1>{{ title }}</h1>
            <p>{{ text }}</p>
            <a class="btn btn-dark px-4 mx-2" href="">All Posts</a>
            <a class="btn btn-outline-dark px-4 mx-2" href="">Contact Us</a>
        </section>

        <section class="py-12 text-center">
            <div class="max-w-screen-xl mx-auto">
                <h2>About Us</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet fugiat iure, deserunt quisquam similique voluptas at provident quo sint omnis repellendus excepturi iusto dolores explicabo sapiente tempore! Perferendis, quibusdam quo.</p>
            </div>
        </section>
    </div>
</template>

<style lang="scss" scoped>
    .hero{
        background: url(https://images.unsplash.com/photo-1685513733856-6770dd79a805?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1vZi10aGUtZGF5fHx8fGVufDB8fHx8fA%3D%3D&dpr=1&auto=format%2Ccompress&fit=crop&w=1799&h=594);
        padding: 100px 0;

        h1 {
            font-size: 50px;
        }
    }
</style>