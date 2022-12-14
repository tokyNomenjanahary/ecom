import axios from "axios"
import { ref } from "vue"
import router from "../../../router/index.js"

export default function useCategory() {
  const categories = ref([])
  const properties = ref([])

  const getCategories = async () => {
    try {
      let response = await axios.get('/api/categories')
      categories.value = response.data.data
    } catch (error) {
      console.log(error)
    }
  }

  const addCategory = async (category) => {
    try {
      await axios.post('/api/categories', category)
    } catch (error) {
      console.log(error)
    }
  }

  const destroyCategory = async (id) => {
    try {
      console.log(category.value)
      await axios.delete('/api/categories/' + id, category.value )
      await getCategories()
    } catch (error) {
      console.log(error)
    }
  }

  const getCategory = async (id) => {
    try {
      let response = await axios.post(`/api/product/categories`, id)
      properties.value = response.data
    } catch (error) {
      console.log(error)
    }
  }


  return {
    getCategories,
    getCategory,
    categories,
    properties,
    addCategory,
    destroyCategory
  }
}