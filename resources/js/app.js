require('./bootstrap')


import { createApp } from 'vue'
import router from './router'
import customerIndex from "./components/customerIndex.vue"
import AddToCart from "./components/products/addToCart.vue"
import navBarBasket from "./components/products/navBarBasket.vue"
import shoppingCart from "./components/products/shoppingCart.vue"
import Toaster from "@meforma/vue-toaster"
import adminSidebar from "./components/admin/layouts/adminSidebar.vue"
import adminNavBar from "./components/admin/layouts/adminNavBar.vue"
import productForm from "./components/admin/product/productForm.vue"
import paymentCreate from "./components/payment/paymentCreate.vue"

const app = createApp({
  components: {
    customerIndex,
    AddToCart,
    navBarBasket,
    shoppingCart,
    adminSidebar,
    adminNavBar,
    productForm,
    paymentCreate
  }
})
app.use(router)
app.use(Toaster).provide('toast', app.config.globalProperties.$toast)
app.mount('#app')