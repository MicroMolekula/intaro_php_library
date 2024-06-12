import { createRouter, createWebHistory } from 'vue-router'
import AppLayout from '@/views/Layout/AppLayout.vue'
import Main from '@/views/Main.vue'
import Registration from '@/views/Registration.vue'
import Auth from '@/views/Auth.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
      {
        path: '/',
        component: AppLayout,
        children: [
          {
            path: '/main',
            name: 'main',
            component: Main
          }
        ]
      },
      {
        path: '/reg',
        name:'reg',
        component: Registration
      },
      {
        path: '/auth',
        name:'auth',
        component: Auth
      }
  ]
})

export default router
