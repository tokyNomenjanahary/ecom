<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-4">
        <div class="card mb-4">
          <div
            class="
              card-header
              d-flex
              justify-content-between
              align-items-center
            "
          >
            <h5 class="mb-0">Ajouter une catégorie</h5>
          </div>
          <div class="card-body">
            <form @submit.prevent="saveCategory">
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                  >Nom</label
                >
                <input
                  type="text"
                  class="form-control"
                  v-model="form.name"
                  id="basic-default-fullname"
                  placeholder="Categorie"
                />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname"
                  >Propriétés</label
                >
                <div class="">
                  <div class="form-control dropdown-toggle position-relative" @click="toggle">
                   Choisir
                  </div>
                  <div class="list-group" v-show="showPropertyList">
                    <label class="list-group-item" v-for="property in properties" :key="property.id">
                      <input class="form-check-input me-1" type="checkbox" :value="property.id" v-model="form.checkedProperty">
                      {{ property.name }}
                    </label>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-8">
        <div class="card mb-4">
          <div
            class="
              card-header
              d-flex
              justify-content-between
              align-items-center
            "
          >
            <h5 class="mb-0">Toutes les catégories</h5>
          </div>
          <div class="card-body">
            <ul class="list-group">
              <li
                v-for="category in categories"
                :key="category.id"
                class="
                  list-group-item
                  d-flex
                  justify-content-between
                  align-items-center
                "
              >
                {{ category.name }}
                <div class="row g-0 align-items-center">
                  <div class="col pb-1" @click="deleteCategory(category.id)">
                    <i class="bx bx-trash me-1"></i>
                  </div>
                  <span class="badge bg-primary col">{{ category.products.length }}</span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { inject } from "vue";
import { onMounted, reactive, ref } from "@vue/runtime-core";
import useCategory from "../../../services/admin/category/index.js";
import useProperty from "../../../services/admin/property/index.js"

const toast = inject('toast')
const { properties, getProperties } = useProperty()

const { getCategories, categories, category, addCategory, destroyCategory } =
  useCategory();
const form = reactive({
  name: "",
  checkedProperty: []
});
const showPropertyList = ref(false)
const saveCategory = async () => {
  await addCategory({ ...form });
  await getCategories();
  form.name = ''
  form.checkedProperty = []
  showPropertyList.value = false
  toast.success('La catégorie a été ajoutée avec succès.')
};
const deleteCategory = async (id) => {
  await destroyCategory(id);
  toast.success('La catégorie a été supprimée avec succès.')
};
const toggle = () => {
  showPropertyList.value = !showPropertyList.value
}



onMounted(async () => {
  await getCategories();
  await getProperties();
});
</script>
<style>
  .dropdown-toggle::after {
    position: absolute;
    top: 20px;
    right: 20px;
  }
</style>