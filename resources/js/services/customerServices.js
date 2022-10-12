import axios from "axios";
import { ref } from "vue";
import router from '../router/index.js';

export default function useCustomers() {
  const customers = ref([]);
  const customer = ref([]);
  const errors = ref('');
  const getCustomers = async () => {
    try {
      let response = await axios.get('/api/customers')
      customers.value = response.data.data;
    } catch (error) {
      console.log(error)
    }
  }

  const createCustomer = async (data) => {
    errors.value =''
    try {
      await axios.post('/api/customers', data)
      router.push({ name: 'customers.index' })
    } catch (error) {
      const createCustomerErrors = error.response.data.errors;
      errors.value = createCustomerErrors;
    }
  }

  const getCustomer = async (id) => {
    try {
      let response = await axios.get('/api/customers/' + id)
      customer.value = response.data.data
    } catch (error) {
      console.log(error)
    }
  }

  const saveCustomerUpdate = async (id) => {
    errors.value =''
    try {
      await axios.put('/api/customers/' + id, customer.value)
      router.push({ name: 'customers.index' })
    } catch (error) {
      const createCustomerErrors = error.response.data.errors;
      errors.value = createCustomerErrors;
    }
  }

  const destroyCustomer = async (id) => {
    if (!window.confirm('confirmer la suppression')) return
    await axios.delete('/api/customers/' + id, customer.value)
    await getCustomers()
  }

  return {
    customers,
    getCustomers,
    customer,
    getCustomer,
    createCustomer,
    saveCustomerUpdate,
    destroyCustomer,
    errors
  }
}