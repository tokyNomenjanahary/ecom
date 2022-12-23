<template>
    <div class="row">
      <div class="col">
        <!-- Display a payment form -->
        <form id="payment-form">
          <div id="payment-element">
            <!--Stripe.js injects the Payment Element-->
          </div>
          <button
            @click.prevent="handleSubmit"
            id="submit">
            <div class="spinner hidden" id="spinner"></div>
            <span id="button-text">Passer la commande</span>
          </button>
          <div id="payment-message" class="hidden"></div>
        </form>
      </div>
      <div class="col-5">
        <div class="card pb-0">
          <div class="card-header">
            <h5 class="card-title">Récapitulatif du panier</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center px-0"
                v-for="product in products" :key="product.id"
                >
                <div class="me-auto">
                  <div class="fw-bold" v-text="product.name"></div>
                  {{ formatPrice(product.price) }}
                </div>
                <span class="badge bg-primary rounded-pill" v-text="product.quantity"></span>
              </li>
            </ul>
          </div>
          <div class="card-footer row justify-content-between pt-0">
            <div class="w-auto">
              Total :
            </div> 
            <div class="w-auto">
              {{ totalPrice }}
            </div>   
          </div>
        </div>
      </div>
    </div>
</template>

<script setup>
import { onMounted, computed } from "vue";
import useStripe from "../../services/stripe/index.js";
import useProduct from "../../services/products/index.js";
import { formatPrice } from "../../helpers/helpers.js";

const { initialize, checkStatus, handleSubmit } = useStripe()
const { getProducts, products } = useProduct()

const totalPrice = computed(() => {
  let price = Object.values(products.value)
  .reduce((prev, product) => prev += product.price * product.quantity, 0);
  return formatPrice(price)
})

onMounted( async () => {
  await initialize()
  await checkStatus()
  await getProducts()
})
</script>

<style scoped>
  /* Variables */
  * {
    box-sizing: border-box;
  }

  body {
    font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
    display: flex;
    justify-content: center;
    align-content: center;
    height: 100vh;
    width: 100vw;
  }

  form {
    width: auto;
    min-width: 500px;
    align-self: center;
    box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
      0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
    border-radius: 7px;
    padding: 40px;
  }

  .hidden {
    display: none;
  }

  #payment-message {
    color: rgb(105, 115, 134);
    font-size: 16px;
    line-height: 20px;
    padding-top: 12px;
    text-align: center;
  }

  #payment-element {
    margin-bottom: 24px;
  }

  /* Buttons and links */
  button {
    background: #5469d4;
    font-family: Arial, sans-serif;
    color: #ffffff;
    border-radius: 4px;
    border: 0;
    padding: 12px 16px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    display: block;
    transition: all 0.2s ease;
    box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
    width: 100%;
  }
  button:hover {
    filter: contrast(115%);
  }
  button:disabled {
    opacity: 0.5;
    cursor: default;
  }

  /* spinner/processing state, errors */
  .spinner,
  .spinner:before,
  .spinner:after {
    border-radius: 50%;
  }
  .spinner {
    color: #ffffff;
    font-size: 22px;
    text-indent: -99999px;
    margin: 0px auto;
    position: relative;
    width: 20px;
    height: 20px;
    box-shadow: inset 0 0 0 2px;
    -webkit-transform: translateZ(0);
    -ms-transform: translateZ(0);
    transform: translateZ(0);
  }
  .spinner:before,
  .spinner:after {
    position: absolute;
    content: "";
  }
  .spinner:before {
    width: 10.4px;
    height: 20.4px;
    background: #5469d4;
    border-radius: 20.4px 0 0 20.4px;
    top: -0.2px;
    left: -0.2px;
    -webkit-transform-origin: 10.4px 10.2px;
    transform-origin: 10.4px 10.2px;
    -webkit-animation: loading 2s infinite ease 1.5s;
    animation: loading 2s infinite ease 1.5s;
  }
  .spinner:after {
    width: 10.4px;
    height: 10.2px;
    background: #5469d4;
    border-radius: 0 10.2px 10.2px 0;
    top: -0.1px;
    left: 10.2px;
    -webkit-transform-origin: 0px 10.2px;
    transform-origin: 0px 10.2px;
    -webkit-animation: loading 2s infinite ease;
    animation: loading 2s infinite ease;
  }

  @-webkit-keyframes loading {
    0% {
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }
  @keyframes loading {
    0% {
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg);
    }
    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

  @media only screen and (max-width: 600px) {
    form {
      width: 80vw;
      min-width: initial;
    }
  }
</style>
