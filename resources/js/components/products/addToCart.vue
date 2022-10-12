<template>
  <a href="#" class="btn btn-primary col mx-2" @click.prevent="addToCart"
    >ajouter au pannier
  </a>
</template>

<script setup>
import { inject } from "vue";
import axios from "axios";
import useProduct from "../../services/products/index.js";
const toast = inject('toast')
const productId = defineProps(["productId"]);
const emitter = require("tiny-emitter/instance");
const { add } = useProduct();
const addToCart = async () => {
  await axios.get("/sanctum/csrf-cookie");
  await axios
    .get("/api/user")
    .then(async (res) => {
      let count = await add(productId);
      emitter.emit('cartUpdated', count);
      toast.success('Produit ajouté')
    })
    .catch(() => {
      toast.error('Merci de vous connecter!')
    });
};
</script>