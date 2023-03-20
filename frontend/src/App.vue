<script >
import Header from './components/Header.vue';
import AppMain from './components/appMain.vue';
import Footer from './components/Footer.vue';
import { store } from './store.js'

export default {
  components: {
    Header,
    AppMain,
    Footer
  },
  data() {
    return {
      store,
      isLoaded: false
    }
  },

  methods: {
    loadCart() {
      // carica il carrello dal local storage
      const cartItems = localStorage.getItem('cartItems');
      if (cartItems) {
          store.cartItems = JSON.parse(cartItems);
      }
    }
  },

  mounted() {

    //metodo che crea un pagina di caricamento

    setTimeout(() => {
      this.isLoaded = true
    }, 1000);

    this.loadCart();

    store.getShippingCost();

    console.log(store);
  },

  computed: {
    totalProducts() {
      if (store.cartItems != null) {
        return store.cartItems.reduce((acc, product) => acc + product.price * product.quantity, 0);
      }
    },

    total() {
      return store.total = parseFloat(store.totalProducts) + parseFloat(store.shippingCost);
    },
  }
}
</script>

<template>
  <!-- Mettiamo il v-if con operatore not al booleano di isLoaded che per default è false -->

  <div class="text-center bg-white" v-if="!isLoaded">

    <div class="Flex_Load">
      <div class="pos_img">
        <img class="img_loading animate__animated animate__flash " src="../public/img/Logo-Deliveboo.png" alt="">
      </div>

    </div>
  </div>

  <!-- Terminato il Loader apparirà la pagina principale   -->

  <div v-else>
    <Header />
    <AppMain />
    <Footer />
  </div>
</template>

<style lang="scss" scoped>
@use './assets/scss/general.scss' as *;
@use './assets/scss/partials/variables.scss' as *;

.Flex_Load {
  height: 100vh;
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position: relative
}

.img_loading {
  max-width: 100px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  filter: invert(57%) sepia(70%) saturate(1956%) hue-rotate(108deg) brightness(91%) contrast(95%);

}

#loader {

  align-content: center;
  margin-right: 22px;

}

main {
  background-image: url('./assets/Food-bg.jpg');
  background-size: cover;
}
</style>

