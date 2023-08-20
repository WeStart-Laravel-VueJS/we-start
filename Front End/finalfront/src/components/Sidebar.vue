<script setup>

    defineProps(['user'])

</script>

<template>
    <!-- sidebar -->
    <div class="col-span-3">
                <router-link to="/account" class="px-4 py-3 shadow flex items-center gap-4">
                    <div class="flex-shrink-0">
                        <img src="../assets/images/avatar.png" alt="profile"
                            class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                    </div>
                    <div class="flex-grow">
                        <p class="text-gray-600">Hello,</p>
                        <h4 class="text-gray-800 font-medium">{{ user.name }}</h4>
                    </div>
                </router-link>

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
                        <router-link to="my-orders" class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-solid fa-box-archive"></i>
                            </span>
                            My orders
                        </router-link>
                        <!-- <a href="#" class="relative hover:text-primary block capitalize transition">
                            My returns
                        </a>
                        <a href="#" class="relative hover:text-primary block capitalize transition">
                            My Cancellations
                        </a>
                        <a href="#" class="relative hover:text-primary block capitalize transition">
                            My reviews
                        </a> -->
                    </div>

                    <!-- <div class="space-y-1 pl-8 pt-4">
                        <a href="#" class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-regular fa-credit-card"></i>
                            </span>
                            Payment methods
                        </a>
                        <a href="#" class="relative hover:text-primary block capitalize transition">
                            voucher
                        </a>
                    </div> -->

                    <div class="space-y-1 pl-8 pt-4">
                        <router-link to="/my-services" class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fas fa-star"></i>
                            </span>
                            My Services
                        </router-link>
                    </div>

                    <div class="space-y-1 pl-8 pt-4">
                        <router-link to="/my-wishlist" class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            My wishlist
                        </router-link>
                    </div>

                    <div class="space-y-1 pl-8 pt-4">
                        <button @click="$emit('logout')" class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fas fa-arrow-right-from-bracket"></i>
                            </span>
                            Logout
                        </button>
                    </div>

                </div>
            </div>
            <!-- ./sidebar -->
</template>