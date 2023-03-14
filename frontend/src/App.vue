<script >
import Header from './components/Header.vue'
import Footer from './components/Footer.vue'
import pageRestaurants from './components/pageRestaurants.vue'

export default {
  components: {
    Header,
    pageRestaurants,
    Footer,
  }
}
</script>

<template>
  <Header />
  <main>
    <pageRestaurants />
  </main>
  <Footer />
</template>

<style lang="scss" scope>
@use './assets/scss/general.scss' as *;
@use './assets/scss/partials/variables.scss' as *;
</style>
