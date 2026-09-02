import { createRouter, createWebHistory } from 'vue-router'
import signin from '@/components/auth/signin.vue'
import signup from '@/components/auth/signup.vue'
import signout from '@/components/auth/signout.vue'
import dashboard from '@/components/pages/dashboard.vue'  
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
  {
      path: '/',
      name: 'auth.signin',
      component: signin,
  },{
      path: '/signup',
      name: 'auth.signup',
      component: signup,

  },{
    path: '/signout',
      name: 'auth.signout',
      component: signout,
  },{
    path: '/dashboard',
      name: 'pages.dashboard',
      component: dashboard, 
  },{
    path: '/:pathMatch(.*)*',
    name: 'notfound',
    component: dashboard,
  }
],
})

export default router
