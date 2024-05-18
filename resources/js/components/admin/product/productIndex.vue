<template>
  <div class="container-xxl flex-grow-1 container-p-y pt-0">
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme w-100 mb-4" id="layout-navbar">
      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search by category -->
        <div class="navbar-nav align-items-center me-4 col-3">
          <div class="nav-item d-flex align-items-center">
            <select id="defaultSelect"
              class="form-select border-0 rounded-0 border-bottom"
              v-model="search.byCategory"
              @change="searchInproducts">
              <option value="">Selectionner un categorie</option>
              <option v-for="category in categories"
                :key="category.id"
                :value="category.id"
                v-text="category.name">
              </option>
            </select>
          </div>
        </div>
        <!-- /Search by category -->
        <!-- Search -->
        <div class="navbar-nav align-items-center w-100">
          <div class="nav-item d-flex align-items-center w-100 border-bottom">
            <input type="text"
              class="form-control border-0 shadow-none"
              placeholder="Search..."
             v-model="search.byName"
             @keyup="searchInproducts">
            <i class="bx bx-search fs-4 lh-0" @click="searchInproducts"></i>
          </div>
        </div>
        <!-- /Search -->
      </div>
    </nav>
    <div class="row align-items-center justify-content-between">
      <div class="col">
        <h5 class="pb-1 mb-4">Produits</h5>
      </div>
      <div class="w-auto">
        <h5 class="pb-1 mb-4">
          <router-link :to="{ name: 'admin.products.create' }" class="h5">
            <i class="bx bx-plus-medical me-1"></i>ajouter
          </router-link>
        </h5>
      </div>
    </div>
    <div class="row mb-5" v-if="products.length">
      <div v-for="product in products" :key="product.id" class="col-md-3 col-lg-3 mb-3">
        <div class="card h-100">
          <img
            class="card-img-top custom-card-img"
            :src="product.image_url"
            alt="Card image cap"
          />
          <div class="card-body p-2 d-flex flex-column justify-content-between">
            <h5 class="card-title" v-text="product.name"></h5>
            <p class="card-text" v-if="product.description.length > 50" v-text="product.description.slice(0, 50) + '...'">
            </p>
            <p class="card-text" v-else v-text="product.description">
            </p>
            <div class="row justify-content-between">
              <div class="w-auto">
                <p class="card-text" v-text="product.price + ' $'"></p>
              </div>
              <div class="w-auto">
                <router-link
                  :to="{ name: 'admin.products.show', params: { id: product.id } }"
                >
                  Voir <i class="bx bx-show"></i>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else class="text-center">
       <h3>Aucun resultat correspondant</h3>
       <h5>Oops! 😖</h5>
    </div>
  </div>
</template>
<script setup>
  import { onMounted, reactive } from "vue";
  import useCategory from "../../../services/admin/category/index.js";
  import useProduct from "../../../services/admin/product/index.js";

  const { getProducts, products, getSearchResults } = useProduct()
  const { getCategories, categories } = useCategory()

  const search = reactive({
    byName: '',
    byCategory: ''
  })

  const searchInproducts = async () => {
    await getSearchResults({...search})
  }

  onMounted(async () => {
    await getProducts()
    await getCategories()
  })

</script>