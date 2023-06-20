<template>
    <div>
        <h1>Login Page</h1>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';

    onMounted(() => {
        localStorage.setItem('user', 'Mohammed');
    })
</script>

<style lang="scss" scoped>

</style>