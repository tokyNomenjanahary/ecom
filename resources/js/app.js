require('./bootstrap')

import { createApp } from 'vue'
import router from './router'
import customerIndex from "./components/customerIndex.vue"
import AddToCart from "./components/products/addToCart.vue"
import navBarBasket from "./components/products/navBarBasket.vue"
import shoppingCart from "./components/products/shoppingCart.vue"
import Toaster from "@meforma/vue-toaster"

const app = createApp({
  components: {
    customerIndex,
    AddToCart,
    navBarBasket,
    shoppingCart
  }
})
app.use(router)
app.use(Toaster).provide('toast', app.config.globalProperties.$toast)
app.mount('#app')