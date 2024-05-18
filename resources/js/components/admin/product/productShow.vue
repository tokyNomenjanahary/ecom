<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col mb-4 order-0">
          <div class="p-3"><!-- Class="card" -->
            <div class="row">
              <div class="col-4">
                <img
                  class="card-img-top rounded-0"
                  :src="product.image_url"
                  alt="Card image cap"
                />
              </div>
              <div class="col-8">
                <h5 v-text="product.name" class="mb-1"></h5>
                <small class="text-muted mb-2" v-text="product.category.name"></small>
                <p v-text="product.description" class="my-3 text-justify"></p>
                <div class="row g-o align-items-end">
                  <div class="col-10">
                    <div v-for="property in product.properties" :key="property.id">
                      <strong class="form-label my-2">{{ property.name + ' disponibles' }} :   </strong>
                      <div class="row g-0 my-2">
                        <div class="w-auto" v-for="value in product.property_values" :key="value.id">
                          <span class="w-auto badge badge-center bg-success me-1" v-if="property.id == value.property_id" v-text="value.name"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-2 mb-2">
                    <button type="button" class="btn rounded-pill btn-icon btn-outline-danger me-1" @click="deleteProduct(product)">
                      <span class="tf-icons bx bx-trash"></span>
                    </button>
                    <button type="button" class="btn rounded-pill btn-icon btn-outline-primary me-1" @click="test">
                      <span class="tf-icons bx bx-edit-alt"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</template>

<script setup>
import { inject } from "vue";
import { onBeforeMount, onMounted } from '@vue/runtime-core';
import useProduct from '../../../services/admin/product/index.js';
    const toast = inject('toast');
    const props = defineProps({
        id: {
          required: true,
          type: String
        }
    })

    const { getProduct, product, destroyProduct } = useProduct();

    const deleteProduct = async (product) => {
      await destroyProduct(product)
      toast.success('Le produit a été supprimé avec succès.')
    }

    onBeforeMount(async () => {
      await getProduct(props.id)
    })
</script>

<style>
.text-justify {
  text-align: justify;
}
</style>