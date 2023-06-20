<template>
    <header>
      <nav class="flex justify-between items-center max-w-screen-xl mx-auto py-6">
        <div>
          <a href="">Logo</a>
        </div>

        <div>
          <ul class="flex">
            <li>
              <router-link active-class="aabb" class="mx-2 text-gray-800 hover:text-gray-500" to="/">Home</router-link>
            </li>
            <li>
              <router-link active-class="aabb" class="mx-2 text-gray-800 hover:text-gray-500" to="/posts">Posts</router-link>
            </li>
          </ul>
        </div>
      </nav>
    </header>
</template>

<style scoped>

.aabb {
  color: red;
}

</style>