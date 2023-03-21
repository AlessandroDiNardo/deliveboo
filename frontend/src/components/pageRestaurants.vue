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
    <section class="main" id="resturant">
        <!-- main content -->
        <section class="ms_container d-flex justify-content-start align-items-center p-4 gap-5">
            <div class="category_block">
                <div class="pt-5 px-3 bg-light border_cont" style="height:200px;">
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
                <div class="ms_container d-flex flex-wrap justify-content-start align-content-center gap-3">
                    <div class="card ms_card" v-for="restaurant in this.filteredRestaurants">
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
                <div v-if="this.filteredRestaurants.length === 0">
                    <h1 class="title_position text-success fw-bold">
                        Non sono presenti ristoranti con i filtri selezionati!
                    </h1>
                </div>
            </div>
        </section>
    </section>
</template>

<style lang="scss" scoped>
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

.ms_container {
    max-width: 1550px;
    margin: 0 auto;
}

.main {
    background-color: $bg-main;
    padding-bottom: 50px;
}

.border_cont {
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
}

.restaurant-overflow {
    height: 600px;
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
    height: 400px;
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

.category_block {
    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    flex-direction: column;
    width: 400px;
    height: 678px;
}


.title_position {
    position: relative;
    top: 300px;
}

@media screen and (max-width: 850px) {

    .category_block {
        width: 300px;
        height: 620px;
    }

    .category_cont {
        width: 300px;
    }
}
</style>