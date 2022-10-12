<template>
  <div class="d-grid gap-2">
    <router-link
      :to="{ name: 'customers.create' }"
      class="btn btn-outline-success mb-2"
      >Créer un client</router-link
    >
  </div>
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">Télephone</th>
        <th scope="col">Favori</th>
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="customer in customers" :key="customer.id">
        <td>{{ customer.name }}</td>
        <td>{{ customer.phone }}</td>
        <td>
          <span :class="{'bg-danger': customer.is_favourite}">
            {{ customer.is_favourite }}
          </span>
        </td>
        <td>
          <router-link
            :to="{ name: 'customers.edit', params: { id: customer.id } }"
            class="btn btn-outline-info rounded-0 mx-2"
          >
            Modifier
          </router-link>
          <button
            type="button"
            class="btn btn-outline-danger rounded-0"
            @click="deleteCustomer(customer.id)"
          >
            Supprimer
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import { onMounted } from "vue";
import useCustomers from "../services/customerServices.js";

export default {
  setup() {
    const { customers, getCustomers, destroyCustomer } = useCustomers();
    onMounted(getCustomers());

    const deleteCustomer = async (id) => {
      await destroyCustomer(id);
    };

    return {
      customers,
      deleteCustomer,
    };
  },
};
</script>