import { createRouter, createWebHistory } from "vue-router";
import CustomerIndex from "../components/customerIndex.vue"
import CustomerCreate from "../components/customerCreate.vue"
import CustomerEdit from "../components/customerEdit.vue"

const routes = [
  {
    path: '/home',
    name: 'customers.index',
    component: CustomerIndex
  },
  {
    path: '/customers/create',
    name: 'customers.create',
    component: CustomerCreate
  },
  {
    path: '/customers/:id/edit',
    name: 'customers.edit',
    component: CustomerEdit,
    props: true
  }
]

export default createRouter({
  history: createWebHistory(),
  routes
})