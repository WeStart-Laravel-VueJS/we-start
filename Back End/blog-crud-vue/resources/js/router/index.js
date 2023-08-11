import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
        path: '/',
        name: 'home',
        component: () => import('../components/BlogList.vue')
    },
    {
        path: '/blog/create',
        name: 'create_blog',
        component: () => import('../components/BlogCreate.vue')
    },
    {
        path: '/blog/:id/edit',
        props: true,
        name: 'edit_blog',
        component: () => import('../components/BlogEdit.vue')
    },
    {
        path: '/blog/:id',
        props: true,
        name: 'single_blog',
        component: () => import('../components/BlogSingle.vue')
    },
    {
        path: '/:path(.*)',
        name: 'not_found',
        component: () => import('../components/NotFound.vue')
    }
  ]
})

export default router
