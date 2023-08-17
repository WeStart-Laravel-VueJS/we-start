<script setup>
import { onMounted, ref } from 'vue';
import { useUserStore } from '../stores/user';

const user_store = useUserStore()
const user = useUserStore().user.value.user

const myservices = ref([])

onMounted(() => {
    // console.log(user_store.user.value.token);
    // send axios to server to get user services
    let config = {
        headers: {'Authorization': `Bearer ${user_store.user.value.token}`},
    }
    axios.get('/user/services', config)
    .then(res => {
        myservices.value = res.data.data
    })
})

</script>

<template>
    <div>
        <!-- breadcrumb -->
        <div class="container py-4 flex items-center gap-3">
            <a href="../index.html" class="text-primary text-base">
                <i class="fa-solid fa-house"></i>
            </a>
            <span class="text-sm text-gray-400">
                <i class="fa-solid fa-chevron-right"></i>
            </span>
            <p class="text-gray-600 font-medium">My Services</p>
        </div>
        <!-- ./breadcrumb -->

        <!-- account wrapper -->
        <div class="container grid grid-cols-12 items-start gap-6 pt-4 pb-16">

            <!-- sidebar -->
            <div class="col-span-3">
                <div class="px-4 py-3 shadow flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <img src="../assets/images/avatar.png" alt="profile"
                            class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="text-gray-600">Hello,</p>
                        <h4 class="text-gray-800 font-medium">{{ user.name }}</h4>
                    </div>
                </div>

                <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
                    <div class="space-y-1 pl-8">
                        <a href="#" class="relative text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-regular fa-address-card"></i>
                            </span>
                            Manage account
                        </a>
                        <a href="#" class="relative hover:text-primary block capitalize transition">
                            Profile information
                        </a>
                        <a href="#" class="relative hover:text-primary block capitalize transition">
                            Manage addresses
                        </a>
                        <a href="#" class="relative hover:text-primary block capitalize transition">
                            Change password
                        </a>
                    </div>

                    <div class="space-y-1 pl-8 pt-4">
                        <a href="#" class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-solid fa-box-archive"></i>
                            </span>
                            My order history
                        </a>
                        <a href="#" class="relative hover:text-primary block capitalize transition">
                            My returns
                        </a>
                        <a href="#" class="relative hover:text-primary block capitalize transition">
                            My Cancellations
                        </a>
                        <a href="#" class="relative hover:text-primary block capitalize transition">
                            My reviews
                        </a>
                    </div>

                    <div class="space-y-1 pl-8 pt-4">
                        <a href="#" class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-regular fa-credit-card"></i>
                            </span>
                            Payment methods
                        </a>
                        <a href="#" class="relative hover:text-primary block capitalize transition">
                            voucher
                        </a>
                    </div>

                    <div class="space-y-1 pl-8 pt-4">
                        <router-link to="/my-services" class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fas fa-star"></i>
                            </span>
                            My Services
                        </router-link>
                    </div>

                    <div class="space-y-1 pl-8 pt-4">
                        <a href="#" class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            My wishlist
                        </a>
                    </div>

                    <div class="space-y-1 pl-8 pt-4">
                        <button @click="logout" class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fas fa-arrow-right-from-bracket"></i>
                            </span>
                            Logout
                        </button>
                    </div>

                </div>
            </div>
            <!-- ./sidebar -->

            <!-- info -->
            <div class="table col-span-9 gap-4">

                <router-link class="bg-primary text-white p-2 inline-block mb-4 px-5 hover:bg-red-400 transition-all" to="/user/services">Add new Service</router-link>

                <table class="min-w-full shadow leading-normal">
                    <thead>
                        <tr class="order-b-2 border-gray-200 bg-gray-800 text-white text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="service in myservices" :key="service.id">
                            <td>{{ service.id }}</td>
                            <td>{{ service.name }}</td>
                            <td><img width="80" :src="service.image" alt=""></td>
                            <td>{{ service.price }}</td>
                            <td>{{ service.discount }} - {{ service.discount_type }}</td>
                            <td>
                                <template v-if="service.status == 1">
                                    <small class="bg-green-400 rounded text-white px-1 pb-[2px]">Active</small>
                                </template>
                                <template v-else>
                                    <small class="bg-red-400 rounded text-white px-1 pb-[2px]">Closed</small>
                                </template>
                            </td>
                            <td>{{ service.category.name_trans }}</td>
                            <td>
                                <router-link :to="'/user/services/'+service.id" class="bg-green-500 p-1 px-2 rounded text-white mx-2"><i class="fas fa-edit"></i></router-link>
                                <button class="bg-red-500 p-1 px-2 rounded text-white"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!-- ./info -->

        </div>
        <!-- ./account wrapper -->
    </div>
</template>

<style lang="scss" scoped>
table th, table td {
    padding: 10px;
}
</style>