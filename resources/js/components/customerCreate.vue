<template>
  <div v-if="errors !== ''" class="alert alert-danger" role="alert">
    {{ errors }}
  </div>
  <form class="row g-3" @submit.prevent="saveCustomer">
    <div class="col-12">
      <label for="inputAddress" class="form-label">Nom</label>
      <input
        type="text"
        class="form-control"
        id="name"
        placeholder="Votre nom"
        v-model="form.name"
      />
    </div>
    <div class="col-12">
      <label for="inputAddress2" class="form-label">Télephone</label>
      <input
        type="text"
        class="form-control"
        id="phone"
        placeholder="+XX XXX XXX XX"
        v-model="form.phone"
      />
    </div>
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="is_favourite" v-model="form.is_favourite"/>
        <label class="form-check-label" for="gridCheck"> Favoris ? </label>
      </div>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
  </form>
</template>

<script>
import { reactive } from 'vue';
import useCustomers from '../services/customerServices.js';


export default {
  setup () {
    const form = reactive({
      name: '',
      phone: '',
      is_favourite: ''
    })

    const { createCustomer, errors } = useCustomers()

    const saveCustomer = async () => {
      await createCustomer({...form})
    }

    return {
      form,
      errors,
      saveCustomer
    }
  }
};
</script>
