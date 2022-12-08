<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="row justify-content-between align-items-center">
        <div class="w-auto">
          <h5 class="card-header">Propriétés</h5>
        </div>
        <div class="w-auto">
          <a href="javascript:void(0);"
            data-bs-toggle="modal"
            data-bs-target="#modalForCreate"
            class="h5 card-header">
            <i class="bx bx-plus-medical me-1"></i>
            ajouter
          </a>
        </div>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr v-for="property in properties" :key="property.id">
              <td>
                <strong v-text="property.name"></strong>
              </td>
              <td class="row g-0 pe-0">
                <a class="col-3" href="javascript:void(0);"
                  @click="showEditPropertyModal(property.id)"
                  data-bs-toggle="modal"
                  data-bs-target="#modaForEdit"
                  >
                  <i class="bx bx-edit-alt me-1"></i></a>
                <a
                  class="col-3"
                  href="javascript:void(0);"
                  @click="deleteProperty(property)"
                  ><i class="bx bx-trash me-1 text-danger"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Vertically Centered Modal -->
    <div class="col-lg-4 col-md-6">
      <div class="mt-3">
        <!-- Modal create property -->
        <div class="modal fade" id="modalForCreate" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalForCreateTitle">Ajouter une propriété</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <form @submit.prevent="saveProperty">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="propertyName" class="form-label">Nom</label>
                      <input
                        type="text"
                        id="propertyName"
                        class="form-control"
                        placeholder="Enter Name"
                        v-model="form.name"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="propertyValues" class="form-label">Valeurs</label>
                      <div class="input-group">
                        <input type="text"
                          class="form-control"
                          placeholder="Recipient's username"
                          id="propertyValues"
                          v-model="form.tempValues">
                        <button class="btn btn-outline-primary" type="button" @click.prevent="addPropertyValue">Ajouter</button>
                      </div>
                    </div>
                  </div>
                  <div class="border rounded p-2 mb-3" v-if="form.propertyValues.length">
                    <div
                      class="btn rounded-pill btn-secondary me-2 mt-1 position-relative"
                      v-for="(value, i) in form.propertyValues"
                      :key="i"
                      >
                      {{ value }}
                      <strong 
                        class="badge badge-center rounded-pill bg-label-danger position-absolute custom-delete-position"
                        @click="removePropertyValue(value)">
                        X
                      </strong>
                    </div>
                  </div>
                  <div class="modal-footer p-0">
                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary m-0">Enregistrer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        <!-- Vertically Centered Modal -->
    <div class="col-lg-4 col-md-6">
      <div class="mt-3">
        <!-- Modal Edit property -->
        <div class="modal fade" id="modaForEdit" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modaForEditTitle">Mettre à jour</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                  @click="tempPropetyValues = []"
                ></button>
              </div>
              <div class="modal-body">
                <form @submit.prevent="editProperty(property.id)">
                  <div class="row">
                    <div class="col mb-3">
                      <label for="propertyName" class="form-label">Nom</label>
                      <input
                        type="text"
                        id="propertyName"
                        class="form-control"
                        placeholder="Enter Name"
                        v-model="property.name"
                      />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="propertyValues" class="form-label">Ajouter valeurs</label>
                      <div class="input-group">
                        <input type="text"
                          class="form-control"
                          placeholder="Valeur"
                          id="editPropertyValues"
                          v-model="newValue"
                          >
                        <button class="btn btn-outline-primary" type="button" @click="addNewPropertyValue">Ajouter</button>
                      </div>
                    </div>
                  </div>
                  <div class="border rounded p-2 mb-3" v-if="newtempValue.length">
                    <div
                      class="btn rounded-pill btn-secondary me-2 mt-1 position-relative"
                      v-for="(value, i) in newtempValue"
                      :key="i"
                      >
                      {{ value }}
                      <strong 
                        class="badge badge-center rounded-pill bg-label-danger position-absolute custom-delete-position"
                        @click="removePropertyValue(value)">
                        X
                      </strong>
                    </div>
                  </div>
                  <div class="border rounded p-2 mb-3">
                    <div
                      class="btn rounded-pill btn-secondary me-2 mt-1 position-relative"
                      v-for="(value, i) in property.property_values"
                      :key="i"
                      >
                      {{ value.name }}
                    </div>
                  </div>
                  <div class="modal-footer p-0">
                    <button type="submit" data-bs-dismiss="modal" class="btn btn-primary m-0">Enregistrer</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import { reactive, ref } from "@vue/reactivity"
  import { onMounted } from "@vue/runtime-core"
  import useProperty from "../../../services/admin/property/index.js"
  const { properties, property, storeProperty, getProperties, destroyProperty, getProperty, updateProperty } = useProperty()

  const form = reactive({
    name: '',
    tempValues: '',
    propertyValues: []
  })
  const tempPropetyValues = ref([])
  const newtempValue = ref([])
  const newValue = ref("")

  const addPropertyValue = () => {
    form.propertyValues.push(form.tempValues)
    form.tempValues = ''
  }

  const addNewPropertyValue = () => {
    if (tempPropetyValues.value.map(c => c.toUpperCase()).includes(newValue.value.toUpperCase())) {
      alert("efa misy")
    } else {
      newtempValue.value.push(newValue.value)
      newValue.value = ""
    }
  }

  const removePropertyValue = (value) => {
    form.propertyValues = form.propertyValues.filter(c => c !== value)
  }

  const saveProperty = async () => {
    await storeProperty({...form})
    await getProperties()
  }

  const showEditPropertyModal = async (id) => {
    await getProperty(id);
    for (let i = 0; i < property.value.property_values.length; i++) {
      tempPropetyValues.value.push(property.value.property_values[i].name)
    }
  }

  const editProperty = async (id) => {
    property.value.property_values = newtempValue.value
    await updateProperty(id)
    await getProperties()
    form.name = ""
    newtempValue.value = []
  }

  const deleteProperty = async (property) => {
    await destroyProperty(property)
    await getProperties()
  }

  onMounted( async () => {
    await getProperties()
  })

</script>

<style>
 .custom-delete-position{
    top: -5px !important;
    right: -10px;
 }
</style>