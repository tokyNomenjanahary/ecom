<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          <div
            class="
              card-header
              d-flex
              justify-content-between
              align-items-center
            "
          >
            <h5 class="mb-0">Ajouter votre produit</h5>
            <small class="text-muted float-end">Nouveau</small>
          </div>
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
                <label for="category" class="form-label">Catégorie</label>
                <select
                  placeholder="Choisir une categorie"
                  id="category"
                  class="form-select"
                  v-model="form.category_id"
                  @change="showCategoryPropertiesValue($event.target.value)"
                >
                  <option
                    v-for="category in categories"
                    :key="category.id"
                    :value="category.id"
                    v-text="category.name"
                  ></option>
                </select>
              </div>
              <div v-if="properties.length">
                <div class="mb-3" v-for="property in properties" :key="property.id">
                  <label class="form-label" v-text="property.name"></label>
                  <div class="border rounded p-4 row g-0">
                    <div class="form-check col-4" v-for="value in property.property_values" :key="value.id">
                      <input class="form-check-input" type="checkbox"
                      :value="property.id + '-' + property.name + '-' + value.id" :id="value.id + '-' + value.name"
                      v-model="form.property_value_ids"
                      >
                      <label class="form-check-label" v-text="value.name" :for="value.id + '-' + value.name"></label>
                    </div>
                  </div>
                </div>
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
              <div class="mb-3" v-if="!imageUrl">
                <input class="form-control" type="file" accept="image/*" @change="uploadImage"/>
              </div>
              <div class="w-50 mb-3 position-relative" v-if="imageUrl">
                <img class="w-25" :src="imageUrl">
                <div class="btn-close bg-primary" @click="removeImage"></div>
              </div>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between pb-0">
            <div class="card-title mb-0">
              <h5 class="m-0 me-2">Nos produit</h5>
              <small class="text-muted">42.82k Total</small>
            </div>
            <div class="dropdown">
              <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-dots-vertical-rounded"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                <a class="dropdown-item" href="javascript:void(0);">Share</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
              <div class="d-flex flex-column align-items-center gap-1">
                <h2 class="mb-2">8,258</h2>
                <span>Total Orders</span>
              </div>
              <div id="orderStatisticsChart" style="min-height: 154.583px;"><div id="apexchartsrnycodbc" class="apexcharts-canvas apexchartsrnycodbc apexcharts-theme-light" style="width: 130px; height: 154.583px;"><svg id="SvgjsSvg2164" width="130" height="154.58334350585938" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG2166" class="apexcharts-inner apexcharts-graphical" transform="translate(-7, 0)"><defs id="SvgjsDefs2165"><clipPath id="gridRectMaskrnycodbc"><rect id="SvgjsRect2168" width="150" height="173" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskrnycodbc"></clipPath><clipPath id="nonForecastMaskrnycodbc"></clipPath><clipPath id="gridRectMarkerMaskrnycodbc"><rect id="SvgjsRect2169" width="145" height="172" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG2170" class="apexcharts-pie"><g id="SvgjsG2171" transform="translate(0, 0) scale(1)"><circle id="SvgjsCircle2172" r="44.835365853658544" cx="70.5" cy="70.5" fill="transparent"></circle><g id="SvgjsG2173" class="apexcharts-slices"><g id="SvgjsG2174" class="apexcharts-series apexcharts-pie-series" seriesName="Electronic" rel="1" data:realIndex="0"><path id="SvgjsPath2175" d="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z" fill="rgba(105,108,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="153" data:startAngle="0" data:strokeWidth="5" data:value="85" data:pathOrig="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z" stroke="#ffffff"></path></g><g id="SvgjsG2176" class="apexcharts-series apexcharts-pie-series" seriesName="Sports" rel="2" data:realIndex="1"><path id="SvgjsPath2177" d="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z" fill="rgba(133,146,163,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="27" data:startAngle="153" data:strokeWidth="5" data:value="15" data:pathOrig="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z" stroke="#ffffff"></path></g><g id="SvgjsG2178" class="apexcharts-series apexcharts-pie-series" seriesName="Decor" rel="3" data:realIndex="2"><path id="SvgjsPath2179" d="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z" fill="rgba(3,195,236,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="90" data:startAngle="180" data:strokeWidth="5" data:value="50" data:pathOrig="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z" stroke="#ffffff"></path></g><g id="SvgjsG2180" class="apexcharts-series apexcharts-pie-series" seriesName="Fashion" rel="4" data:realIndex="3"><path id="SvgjsPath2181" d="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z" fill="rgba(113,221,55,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-3" index="0" j="3" data:angle="90" data:startAngle="270" data:strokeWidth="5" data:value="50" data:pathOrig="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z" stroke="#ffffff"></path></g></g></g><g id="SvgjsG2182" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText2183" font-family="Helvetica, Arial, sans-serif" x="70.5" y="90.5" text-anchor="middle" dominant-baseline="auto" font-size="0.8125rem" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif; fill: rgb(161, 172, 184);">Weekly</text><text id="SvgjsText2184" font-family="Public Sans" x="70.5" y="71.5" text-anchor="middle" dominant-baseline="auto" font-size="1.5rem" font-weight="400" fill="#566a7f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Public Sans;">38%</text></g></g><line id="SvgjsLine2185" x1="0" y1="0" x2="141" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine2186" x1="0" y1="0" x2="141" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG2167" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-dark" style="left: 75.6px; top: 1.11667px;"><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex; background-color: rgb(105, 108, 255);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(105, 108, 255); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Electronic: </span><span class="apexcharts-tooltip-text-y-value">85</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2; display: none; background-color: rgb(105, 108, 255);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(105, 108, 255); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Electronic: </span><span class="apexcharts-tooltip-text-y-value">85</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 3; display: none; background-color: rgb(105, 108, 255);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(105, 108, 255); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Electronic: </span><span class="apexcharts-tooltip-text-y-value">85</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 4; display: none; background-color: rgb(105, 108, 255);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(105, 108, 255); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Electronic: </span><span class="apexcharts-tooltip-text-y-value">85</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 287px; height: 156px;"></div></div><div class="contract-trigger"></div></div></div>
            <ul class="p-0 m-0">
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Electronic</h6>
                    <small class="text-muted">Mobile, Earbuds, TV</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">82.5k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Fashion</h6>
                    <small class="text-muted">T-shirt, Jeans, Shoes</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">23.8k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex mb-4 pb-1">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Decor</h6>
                    <small class="text-muted">Fine Art, Dining</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">849k</small>
                  </div>
                </div>
              </li>
              <li class="d-flex">
                <div class="avatar flex-shrink-0 me-3">
                  <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-football"></i></span>
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <h6 class="mb-0">Sports</h6>
                    <small class="text-muted">Football, Cricket Kit</small>
                  </div>
                  <div class="user-progress">
                    <small class="fw-semibold">99</small>
                  </div>
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

  import { onMounted, reactive, ref, watch } from "@vue/runtime-core";
  import useCategory from "../../../services/admin/category/index.js";
  import useProduct from "../../../services/admin/product/index.js";

  const { getCategories, categories, getCategory, properties } = useCategory();
  const { storeProduct, storeProductImage } = useProduct();
  const imageFile = ref("")
  const imageUrl = ref("")
  const form = reactive({
    name: '',
    category_id: null,
    property_ids: [],
    property_value_ids: [],
    description: '',
    price: null
  })

  const saveProduct = async () => {
    let property_value_ids = []
    let property_ids = []
    form.property_value_ids.forEach((item) => {
      let temp = item.split('-')
      property_ids.push(temp[0])
      property_value_ids.push(temp[temp.length - 1])
    })
    form.property_ids = [...new Set(property_ids)]
    form.property_value_ids = property_value_ids
    let imgData = new FormData()
    imgData.append('image', imageFile.value)
    imgData.append('category_id', form.category_id)
    imgData.append('description', form.description)
    imgData.append('name', form.name)
    imgData.append('property_ids[]', form.property_ids)
    imgData.append('price', form.price)
    console.log(form.property_ids)
    form.property_ids.forEach((item) => {
      imgData.append('property_ids[]', item)
    })
    form.property_value_ids.forEach((item) => {
      imgData.append('property_value_ids[]', item)
    })
    console.log(imgData.property_value_ids)
    console.log(imgData.property_ids)
    await storeProduct(imgData)
    form.category_id = null
    form.description = ''
    form.name = ''
    form.price = null
    form.property_ids = []
    form.property_value_ids = []
    properties.value = []
    removeImage()
  }

  const showCategoryPropertiesValue = async (id) => {
    console.log(id)
    await getCategory(id)
  }


  const uploadImage = (e) => {
    if (e.target.files.length === 0) {
      imageFile.value = ""
      imageUrl.value = ""
      return;
    }
    imageFile.value = e.target.files[0]
  }

  const removeImage = () => {
    imageFile.value = ""
    imageUrl.value = ""
  }

  watch(imageFile, (imageFile) => {
    if (imageFile instanceof File) {      
      let fileReader = new FileReader();
      fileReader.readAsDataURL(imageFile)
      fileReader.addEventListener('load', () => {
        imageUrl.value = fileReader.result
      })    
    } else {
      return
    }
  })


  onMounted(async () => {
    await getCategories();
  });
</script>
