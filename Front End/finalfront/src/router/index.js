import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

import { useUserStore } from '../stores/user'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/shop',
      name: 'shop',
      component: () => import('../views/ShopView.vue')
    },
    {
      path: '/about-us',
      name: 'about_us',
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/contact-us',
      name: 'contact_us',
      component: () => import('../views/ContactView.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue'),
      meta: {
        Guest: true
      }
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/RegisterView.vue')
    },
    {
      path: '/account',
      name: 'account',
      component: () => import('../views/AccountView.vue'),
      meta: {
        Auth: true
      }
    },
    {
      path: '/my-services',
      name: 'my_services',
      component: () => import('../views/MyServicesView.vue'),
      meta: {
        Auth: true
      }
    },
    {
      path: '/my-wishlist',
      name: 'my_wishlist',
      component: () => import('../views/MyWishlistView.vue'),
      meta: {
        Auth: true
      }
    },
    {
      path: '/my-orders',
      name: 'my_orders',
      component: () => import('../views/MyOrdersView.vue'),
      meta: {
        Auth: true
      }
    },
    {
      path: '/user/services/:id?',
      name: 'user_service',
      component: () => import('../views/UserServiceView.vue'),
      meta: {
        Auth: true
      }
    },
    {
      path: '/category/:slug',
      name: 'show_category',
      component: () => import('../views/ShowCategoryView.vue'),
      props: true
    },
    {
      path: '/service/:slug',
      name: 'show_service',
      component: () => import('../views/ShowServiceView.vue'),
      props: true
    },
    {
      path: '/:path(.*)',
      name: 'not_found',
      component: () => import('../views/NotFoundView.vue')
    },
    // {
    //   path: '/about',
    //   name: 'about',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../views/AboutView.vue')
    // }
  ]
})

router.beforeEach(to => {
  // console.log(to.meta.Auth);
  if(to.meta.Auth) {
    const user_store = useUserStore();
    if(!user_store.user.value) {
      router.push('/login');
    }
  }

  if(to.meta.Guest) {
    const user_store = useUserStore();
    if(user_store.user.value) {
      router.push('/');
    }
  }
})

export default router
