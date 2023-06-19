<script setup>
  import Navbar from './components/Navbar.vue'
</script>

<template>
  
  <div>
    <Navbar />

    <main>
      <router-view></router-view>
    </main>

    <footer class="text-center py-5">
      <p>All Copyright reserved to Mohammed Naji &copy; {{ new Date().getFullYear() }}</p>
    </footer>
  </div>

</template>

<style lang="scss" scoped>

</style>