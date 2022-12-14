import axios from "axios";
import { ref } from "vue";

export default function useProduct () {
  const products = ref([])
  const product = ref([])

  const getProducts = async () => {
    try {
      let response = await axios.get('/api/admin/products')
      products.value = response.data
    } catch (error) {
      console.log(error)
    }
  }


  const storeProduct = async (product) => {
    try {
      await axios.post('/api/product/store', product)
    } catch (error) {
      console.log(error)
    }
  }

  const getProduct = async (id) => {
    try {
      let response = await axios.get(`/api/admin/products/${id}`)
      product.value = response.data
    } catch (error) {
      console.log(error)
    }
  }

  const getSearchResults = async (query) => {
    try {
      let response = await axios.post('/api/products/search', query)
      products.value = response.data
    } catch (error) {
      console.log(error)
    }
  }

  const storeProductImage = async (query) => {
    try {
      await axios.post('/api/products/img', query)
    } catch (error) {
      console.log(error)
    }
  }

  return {
    getProducts,
    products,
    product,
    storeProduct,
    storeProductImage,
    getProduct,
    getSearchResults
  }
}
