import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue'),
      meta: {
        title: 'HomePageeeeeee'
      }
    },
    {
      path: '/posts',
      name: 'posts',
      component: () => import('../views/PostsView.vue'),
      meta: {
        title: 'Posts Page'
      }
    },
    {
      path: '/posts/:id',
      name: 'single_post',
      props: true,
      component: () => import('../views/SinglePostView.vue')
    }

    ,
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/DashboardView.vue'),
      meta: {
        title: 'Dashboard',
        auth: true
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue'),
      meta: {
        title: 'login'
      }
    },
  ]
})

router.beforeEach((to, from) => {
  // console.log(to.meta.title);
  document.title = to.meta.title

  let user = localStorage.getItem('user')
  // console.log(user);
  if(to.meta.auth && user == null) {
    router.push('/login')
  }

})

export default router
