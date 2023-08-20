<script setup>

import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
const route = useRoute();
import { useUserStore } from '../stores/user';
import Sidebar from '../components/Sidebar.vue';

const user_store = useUserStore()
const user = useUserStore().user.value.user


onMounted(() => {

    console.log(route.params.id);

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

            <Sidebar :user="user" />

            <!-- info -->
            <div class="table col-span-9 gap-4">
                name
price
description
discount
discount_type
category_id
                <form @submit.prevent="login" action="#" method="post" autocomplete="off">
                    <div class="space-y-2">
                        <div>
                            <label for="email" class="text-gray-600 mb-2 block">English Name</label>
                            <input type="email" name="email" id="email"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="youremail.@domain.com">
                            <!-- <small v-if="errors.email" class="text-red-600">{{ errors.email[0] }}</small> -->
                        </div>
                        <div>
                            <label for="password" class="text-gray-600 mb-2 block">Password</label>
                            <input type="password" name="password" id="password"
                                class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:ring-0 focus:border-primary placeholder-gray-400"
                                placeholder="*******">
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember"
                                class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                            <label for="remember" class="text-gray-600 ml-3 cursor-pointer">Remember me</label>
                        </div>
                        <a href="#" class="text-primary">Forgot password</a>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">Login</button>
                    </div>
                </form>

            </div>
            <!-- ./info -->

        </div>
        <!-- ./account wrapper -->
    </div>
</template>

<style lang="scss" scoped>

</style>