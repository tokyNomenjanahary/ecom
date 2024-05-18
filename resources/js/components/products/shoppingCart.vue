<template>
  <table class="table align-items-center">
    <thead>
      <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix unitaire</th>
        <th>Prix total</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="product in products" :key="product.id">
        <td class="w-25">
          {{ product.name }}
          <span class="badge bg-danger text-end" v-on:click.prevent="remove(product.id)">retirer</span>
        </td>
        <td class="w-25">
          <span class="fs-2" v-on:click.prevent="decrease(product.id)">
            -
          </span>
          <span class="fs-5">{{ product.quantity }}</span>
          <span class="fs-4" v-on:click.prevent="increase(product.id)">
            +
          </span>
        </td>
        <td class="w-25">{{ formatPrice(product.price) }}</td>
        <td class="w-25">
          {{ formatPrice(product.price * product.quantity) }}
        </td>
      </tr>
    </tbody>
  </table>
  <div class="row align-items-center justify-content-end mt-5">
    <a class="btn btn-secondary col-2 rounded-0 bg-dark" href="/checkout">
      PASSER A LA CAISSE
    </a>
    <div class="col-3">
      Total : {{ totalPrice }}
    </div>
  </div>
</template>

<script setup>
import { onMounted, computed } from "vue";
import useProduct from "../../services/products/index.js";
import { formatPrice } from "../../helpers/helpers.js";

const emitter = require("tiny-emitter/instance");
const { 
        products,
        getProducts,
        increaseQuantity,
        decreaseQuantity,
        removeItemFromcartList,
        cartCount
      } = useProduct();

const totalPrice = computed(() => {
  let price = Object.values(products.value)
  .reduce((prev, product) => prev += product.price * product.quantity, 0);
  return formatPrice(price)
})

const increase = async (id) => {
  await increaseQuantity(id)
  await getProducts();
  emitter.emit('cartUpdated', cartCount.value);
}

const decrease = async (id) => {
  await decreaseQuantity(id)
  await getProducts();
  emitter.emit('cartUpdated', cartCount.value);
}

const remove = async (id) => {
  await removeItemFromcartList(id)
  await getProducts();
  emitter.emit('cartUpdated', cartCount.value);
}

onMounted(async () => {
  await getProducts();
});
</script>