<script>
import axios from 'axios';

export default {

    name: "singleRestautants",

    data() {
        return {

            restaurant: [],
            products: []
        }
    },
    methods: {
        
        getProducts() {
            axios.get('http://localhost:8000/api/v1/products/all', { params: {restaurantId: this.$route.params.id} })
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    const result = data.response.restaurant;

                    if (success) {
                        this.restaurant = result;
                        this.products = result.products;
                    }
                })
                .catch(err => console.error(err));
        },

        runNow() {
        }
    },
    mounted() {
        this.getProducts();
        
        this.runNow() 
    },
}
</script>

<template>
    <section>
        <div class="border-bottom border-light">
            <div class="ms_container py-5">
                <div class="d-flex justify-content-start align-items-start gap-5 mt-5">
                    <div class="card_img">
                        <img :src="restaurant.img" alt="">
                    </div>
                    <div class="d-flex row justify-content-center align-items-center lh-lg">
                        <h2> {{ restaurant.name }}</h2>
                        <p class="fs-5">{{ restaurant.description }}</p>
                        <p class="fs-5">
                            <span class="btn btn-success me-2" v-for="category in restaurant.categories"> {{ category.name }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ms_container py-5 d-flex flex-wrap justify-content-center align-items-center gap-5">
            <div class="ms_card" style="width: ;" v-for="product in products">
                <img :src="product.img" class="card-img-top" alt="...">
                <div class="card-body-cont">
                    <h5 class="card-title">{{ product.name }}</h5>
                    <p class="card-text">
                        {{ product.ingredients }}
                    </p>
                    <div class="d-flex justify-content-between align-items-center info_card" style="width: 100%;">
                        <strong class="text-danger">{{ product.price }} €</strong>
                        <a href="#" class="btn btn-primary">
                            <font-awesome-icon icon="fa-solid fa-cart-shopping" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

section {
    background-color: $bg-main;
    margin-top: 50px;
}

.ms_container {
    max-width: 1500px;
}

.card_img {

    height: 200px;
    width: 200px;

    img {
        height: 200px;
        width: 200px;
    }
}

.ms_card {
    width: 350px;
    height: 450px;
    border: 1px $black;
    border-radius: 1px;
    border: 1px solid black;

    img {
        height: 250px;
        width: 348px;
    }

    .card-body-cont {
        display: flex;
        justify-content: start;
        align-items: start;
        gap: 5px;
        flex-direction: column;
        padding: 10px 20px;

        .info_card {
            position: relative;
            top: 25%;

            .btn {
                background-color: #06c167;
                border: none;
                transition: 0.8s;

                &:hover {
                    background-color: white;
                    color: $main-color;
                }
            }
        }
    }
}
</style>