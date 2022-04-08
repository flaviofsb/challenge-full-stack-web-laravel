import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  
  {
    path: '/',
    name: 'AlunosConsulta',
    component: () => import('../views/AlunosConsulta.vue')
  }
  ,
  {
    path: '/cadastro',
    name: 'Cadastro',
    component: () => import('../views/Cadastro.vue')
  }
  ,
  {
    path: '/edicao',
    name: 'AlunosEdicao',
    component: () => import('../views/AlunosEdicao.vue')
  }
]

const router = new VueRouter({
  routes
})

export default router
