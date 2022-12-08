<template>
  <div class="card-body">
    <form @submit.prevent="saveProduct">
      <div class="mb-3">
        <label class="form-label" for="name">Nom</label>
        <input
          type="text"
          class="form-control"
          id="name"
          name="name"
          v-model="form.name"
          placeholder="Nom du produit"
        />
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Choisir une categorie</label>
        <select
          id="category"
          class="form-select"
          name="category"
          v-model="form.category_id"
        >
          <!-- <option disabled>Choisir une categorie</option> -->
          <option
            v-for="category in categories"
            :key="category.id"
            :value="category.id"
            v-text="category.name"
          ></option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label" for="price">Prix</label>
        <input
          type="number"
          class="form-control"
          id="price"
          name="price"
          v-model="form.price"
          placeholder="153.51 $"
        />
      </div>
      <div class="mb-3">
        <label class="form-label" for="description">Description</label>
        <textarea
          id="description"
          name="description"
          v-model="form.description"
          class="form-control"
          placeholder="Decrivez votre produit"
        ></textarea>
      </div>
      <div class="mb-3">
        <input class="form-control" type="file" multiple />
      </div>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
  </div>
</template>

<script setup>

  import { onMounted, reactive } from "@vue/runtime-core";
  import useCategory from "../../../services/admin/category/index.js";
  import useProduct from "../../../services/admin/product/index.js";

  const { getCategories, categories } = useCategory();
  const { storeProduct } = useProduct();
  const form = reactive({
    name: '',
    category_id: null,
    description: '',
    product_images: [],
    price: null
  })

  const saveProduct = async () => {
    // console.log({...form})
    await storeProduct({...form})
    form.category_id = null
    form.description = ''
    form.name = ''
    form.price = null
  }

  onMounted(async () => {
    await getCategories();
  });
</script>