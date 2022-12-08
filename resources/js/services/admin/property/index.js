import axios from "axios";
import { ref } from "vue";

export default function useProperty() {
  const properties = ref([])
  const property = ref([])
  const getProperties = async () => {
    try {
      let response = await axios.get('/api/properties')
      properties.value =  response.data
    } catch (error) {
      console.log(error)
    }
  }

  const getProperty = async (id) => {
    try {
      let response = await axios.get(`/api/properties/${id}`)
      property.value = response.data
    } catch (error) {
      
    }
  }

  const storeProperty = async (data) => {
    try {
      await axios.post('/api/properties/store', data);
    } catch (error) {
      console.log(error)
    }
  }

  const updateProperty = async (id) => {
    try {
      let response =  await axios.put(`/api/properties/${id}`, property.value);
      property.value = response.data
    } catch (error) {
      console.log(error)
    }
  }

  const destroyProperty = async (data) => {
    try {
      await axios.delete(`/api/properties/${data.id}`)
    } catch (error) {
      console.log(error)
    }
  }

  return {
    properties,
    property,
    storeProperty,
    getProperties,
    getProperty,
    destroyProperty,
    updateProperty
  }
}