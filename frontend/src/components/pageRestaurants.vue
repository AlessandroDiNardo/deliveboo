<script>
import axios from "axios";

export default {
    name: "pageRestaurants",
    data() {
        return {
            categories: [],
            filteredCategories: [],
            filteredRestaurants: [],
        };
    },
    mounted() {
        this.getRestaurants();
        this.getCategories();
    },
    methods: {
        getRestaurants() {
            axios.get("http://localhost:8000/api/v1/restaurants/search", { params: { categories: this.filteredCategories } })
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
            axios.get("http://localhost:8000/api/v1/categories/all")
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    this.categories = data.response;
                })
                .catch(err => console.error(err));
        },

        resetCheckboxes() {
            this.filteredCategories = [];
            this.getRestaurants();
        }
    },
    computed: {},
}
</script>

<template>
    <section class="main p-5 ">
        <!-- main content -->
        <section class="ms_container d-flex justify-content-between align-items-center p-4 gap-5">
            <div class="d-flex row justify-content-end align-items-end" style="width: 200px; height: 620px;">
                <div class="pt-5 px-3 bg-light border_cont" style="height:260px;">
                    <h3>Cerca il tuo ristorante, cibo o piatto preferito!</h3>
                    <div class="d-flex justify-content-start align-items-start gap-3 mt-3">
                        <button type="button" class="btn btn-warning" @click="resetCheckboxes()">Reset</button>

                        <button type="button" class="btn btn-success" @click="getRestaurants()">Filter</button>
                    </div>
                </div>
                <div class="category_cont">
                    <ul class=" d-flex justify-content-start align-items-start row">
                        <li v-for="category in this.categories" :key="category.id" style="width: 100%;">
                            <input type="checkbox" :id="'category_' + category.id" :value="category.id"
                                v-model="filteredCategories">
                            <span class="mx-3">{{ category.name }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="carte" class="restaurant-overflow gap-2">
                <button class="navbar-toggler bg-text-success text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon text-success"></span>
                    </button>
                <div class="ms_container d-flex flex-wrap justify-content-start align-content-center gap-3">
                    <div class="card ms_card"  v-for="restaurant in this.filteredRestaurants">
                        <div class="img_cont">
                            <img :src="restaurant.img" class="card-img-top" alt="">
                        </div>
                        <div class="card-body-cont">
                            <h5 class="card-title">{{ restaurant.name }}</h5>
                            <p class="card-text">{{ restaurant.description }}</p>
                            <router-link :to="{ name: 'restaurant', params: { id: restaurant.id } }"
                                class="btn btn-success">
                                Vai al ristorante
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<style lang="scss" scoped>
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

.main {
    background-color: $bg-main;
    padding-bottom: 50px;
}

.border_cont {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}

.restaurant-overflow {
    height: 700px;
    overflow-y: scroll;
    margin-top: 80px;
}

.restaurant-overflow::-webkit-scrollbar {
    display: none;
}

.restaurant-overflow {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}

.category_cont {
    width: 400px;
    height: 500px;
    overflow-y: scroll;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;
}

.category_cont::-webkit-scrollbar {
    display: none;
}

.category_cont {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}

.ms_card {
    width: 340px;
    height: 400px;
   

    .img_cont {
        height: 200px;
        width: 338px;

        img {
            height: 200px;
            width: 338px;
        }
    }

    .card-body-cont {
        height: 200px;
        width: 350px;
        display: flex;
        justify-content: start;
        align-items: start;
        gap: 5px;
        flex-direction: column;
        padding: 10px 20px;

        .btn {
            position: absolute;
            bottom: 2%;
        }
    }
}

ul {
    list-style-type: none;

    li {
        background-color: rgb(186, 185, 185);
        padding: 20px;
        border-bottom: 1px solid white;
        transition: 0.8s;

        &:hover {
            background-color: white;
            border-bottom: 1px solid rgb(186, 185, 185);
        }
    }
}

.btn-color {
    background-color: $main-color;
    border: none;
}


</style>
