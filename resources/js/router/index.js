import { createRouter, createWebHistory } from "vue-router";
import CustomerIndex from "../components/customerIndex.vue";
import CustomerCreate from "../components/customerCreate.vue";
import CustomerEdit from "../components/customerEdit.vue";
import AdminHome from "../components/admin/adminHome.vue";
import ClientIndex from "../components/admin/client/clientIndex.vue";
import CategoryIndex from "../components/admin/category/categoryIndex.vue";
import ProductIndex from "../components/admin/product/productIndex.vue";
import ProductCreate from "../components/admin/product/productCreate.vue";
import ProductShow from "../components/admin/product/productShow.vue";
import PropertyIndex from "../components/admin/property/propertyIndex.vue";

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
  },
  {
    path: '/admin/home',
    name: 'admin.home',
    component: AdminHome
  },
  {
    path: '/admin/clients',
    name: 'admin.clients',
    component: ClientIndex
  },
  {
    path: '/admin/products',
    name: 'admin.products',
    component: ProductIndex
  },
  {
    path: '/admin/products/create',
    name: 'admin.products.create',
    component: ProductCreate
  },
  {
    path: '/admin/products/:id',
    name: 'admin.products.show',
    component: ProductShow,
    props: true
  },
  {
    path: '/admin/categories',
    name: 'admin.categories',
    component: CategoryIndex
  },
  {
    path: '/admin/properties',
    name: 'admin.properties',
    component: PropertyIndex
  }
]

export default createRouter({
  history: createWebHistory(),
  routes
})