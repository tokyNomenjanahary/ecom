<template>
      <div v-if="errors !== ''" class="alert alert-danger" role="alert">
    {{ errors }}
  </div>
  <form class="row g-3" @submit.prevent="updateCustomer">
    <div class="col-12">
      <label for="inputAddress" class="form-label">Nom</label>
      <input
        type="text"
        class="form-control"
        id="name"
        placeholder="Votre nom"
        v-model="customer.name"
      />
    </div>
    <div class="col-12">
      <label for="inputAddress2" class="form-label">Télephone</label>
      <input
        type="text"
        class="form-control"
        id="phone"
        placeholder="+XX XXX XXX XX"
        v-model="customer.phone"
      />
    </div>
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="is_favourite" v-model="customer.is_favourite"/>
        <label class="form-check-label" for="gridCheck"> Favoris ? </label>
      </div>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </div>
  </form>
</template>

<script>
import { onMounted } from '@vue/runtime-core';
import useCustomers from '../services/customerServices.js'
export default {
  props: {
    id: {
      required: true,
      type: String
    }
  },
  setup (props) {

    const { getCustomer, customer, errors, saveCustomerUpdate } = useCustomers();

    onMounted(getCustomer(props.id));

    const updateCustomer = async () => {
      await saveCustomerUpdate(props.id)
    }

    return {
      customer,
      getCustomer,
      updateCustomer,
      errors
    }
  }
}
</script>