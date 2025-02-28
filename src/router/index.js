import Vue from 'vue'
import Router from 'vue-router'
import Login from '@/views/auth/Login.vue'
import HomePage from '@/views/HomePage.vue'
import Register from '@/views/auth/Register.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Landing',
      component: () => import('@/views/Landing.vue')
    },
    {
      path: '/home',
      name: 'Home',
      component: HomePage
    },
    {
      path: '/about',
      name: 'About',
      component: () => import('@/views/About.vue')
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    }
  ]
})