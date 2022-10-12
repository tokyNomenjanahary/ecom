<template>
  <a href="/shopping-cart" class="nav-link">
    <span>{{ CartCount }}</span>
    <svg
      fill="none"
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      viewBox="0 0 24 24"
      stroke="currentColor"
      class="-mt-px w-5 h-5 text-gray-400"
      width="20"
    >
      <path
        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
      ></path>
    </svg>
  </a>
</template>

<script setup>
  import { onMounted, ref } from "vue";
  import useProduct from "../../services/products/index.js";
  const emitter = require("tiny-emitter/instance");
  const CartCount = ref(0);
  emitter.on("cartUpdated", (count) => (CartCount.value = count));
  const { getCartCount } = useProduct();
  onMounted(async () => {
    CartCount.value = await getCartCount();
  });
</script>
