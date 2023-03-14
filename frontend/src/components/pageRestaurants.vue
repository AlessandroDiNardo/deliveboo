<script>
import axios from "axios";

export default {
    name: "pageRestaurants",

    data() {
        return {
            categories: [],
            filteredCategories: [],
            filteredRestaurants: [],
        }
    },

    mounted() {

        this.getRestaurants();

        this.getCategories();
    },

    methods: {
        getRestaurants() {
            axios.get('http://localhost:8000/api/v1/restaurants/search', { params: { categories : this.filteredCategories }})
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    const response = data.response.restaurants;
                    
                    if (success) {
                        this.filteredRestaurants = response
                    }
                })
                .catch(err => console.error(err));
        },

        getCategories() {
            axios.get('http://localhost:8000/api/v1/categories/all')
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    this.categories = data.response;
                })
                .catch(err => console.error(err));
        },

        resetCheckboxes() {
            this.filteredCategories = [];
        }
    },

    computed: {
    }
}
</script>

<template>
    <main>
        <!-- header main content -->
        <div class=" border border-1 header_main_cont">
            <section class=" ms_container d-flex justify-content-between align-items-center px-5 py-3">
                <div class="side-bar">
                    <button class="btn btn-color btn-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Filtri</button>

                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                        aria-labelledby="offcanvasWithBothOptionsLabel">
                        <h3>Filtra per categorie</h3>

                        <div class="offcanvas-body">
                            <ul class=" filter_cont d-flex flex-wrap justify-content-center align-items-center gap-4">
                                <li v-for="category in this.categories" :key="category.id">
                                    {{ category.name }}
                                    <input type="checkbox" :id="'category_' + category.id" :value="category.id" v-model="filteredCategories">
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex justify-content-end align-items-end p-5">
                            <button type="button" class="btn btn-danger btn-outline-warning" @click="resetCheckboxes()">Reset</button>
                            
                            <button type="button" class="btn btn-color btn-outline-success" @click="getRestaurants()">Filter</button>
                        </div>
                    </div>
                </div>

                <h3>Cerca il tuo ristorante, cibo o piatto preferito!</h3>
            </section>
        </div>

        <!-- main content -->
        <section>
            <div class=" ms_container py-5 d-flex flex-wrap justify-content-center align-items-center gap-4">
                <div class="card ms_card" v-for="restaurant in this.filteredRestaurants">
                    <img :src="restaurant.img" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{restaurant.name}}</h5>
                        <p class="card-text">{{ restaurant.description }}</p>
                        <span v-for="category in restaurant.categories"> {{ category.name }}, &nbsp;</span>
                        <a href="#" class="btn btn-color btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        </section>
    </main>
</template>

<style lang="scss" scoped>
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

main {
    background-color: $bg-main;
}

.ms_container,
.log_section {
    padding: 20px 0;
}

.ms_search_bar {
    width: 250px;
    height: 50px;
    border: 1px solid rgb(0, 0, 0);
}

.ms_search_icon {
    background-color: $bg-main;
}

.ms_card {

    width: 400px;
    height: 100%;
}

img {
    height: 300px;
    width: 100%;
}

.filter_cont {
    width: 100%;
    padding: 0px 30px;
}

ul {
    list-style-type: none;
}

.btn-color {
    background-color: $main-color;
    border: none;
}
</style>
