<script setup>
import { onMounted, ref } from 'vue';
import { useUserStore } from '../stores/user';
import Sidebar from '../components/Sidebar.vue';

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

const logout = () => user_store.logout()

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

            <Sidebar :user="user" @logout="logout" />

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
                            <td>{{ service.name_trans }}</td>
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