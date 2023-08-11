<template>
    <div class="page_404">
        <h1>Page Not Found</h1>
        <router-link to="/">Homepage</router-link>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
    .page_404 {
        min-height: 300px;
        background: rgb(243, 243, 243);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        a {
           background: #0faabc;
            color: #fff;
            padding:.5rem 1.2rem;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
    }

</style>
