import axios from "axios"
import { ref } from "vue"

export default function useProduct() {
  const products = ref([])
  const product = ref([])
  const cartCount = ref(0)
  const getProducts = async () => {
    let response = await axios.get('/api/products')
    products.value = response.data.cartContent
    cartCount.value = response.data.cartCount
    return products
  }

  // ajouter un produit dans le pannier
  const add = async (productId) => {
    let response = await axios.post('/api/products', {
      productId: productId
    })
    return response.data.count
  }
  const getCartCount = async () => {
    let response = await axios.get('/api/product/count')
    return response.data.count
  }

  const increaseQuantity = async (id) => {
    let response = await axios.get('/api/product/increase/' + id)
  }

  const decreaseQuantity = async (id) => {
    let response = await axios.get('/api/product/decrease/' + id)
  }

  const removeItemFromcartList = async (id) => {
    let response = await axios.delete('/api/products/' + id)
  }

  return {
    add,
    getCartCount,
    products,
    getProducts,
    increaseQuantity,
    decreaseQuantity,
    removeItemFromcartList,
    cartCount,
    product
  }
}