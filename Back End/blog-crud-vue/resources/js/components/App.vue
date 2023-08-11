<template>
    <div>
        <div class="container my-5">
            <nav class="navbar navbar-expand-lg bg-dark text-white d-flex justify-content-between align-items-center py-3 px-5" data-bs-theme="dark">
                <router-link class="navbar-brand" to="/">Home</router-link>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link" to="/" active-class="active">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/blog/create" active-class="active">Add New Blog</router-link>
                    </li>
                </ul>
            </nav>

            <router-view></router-view>
        </div>
    </div>
</template>
