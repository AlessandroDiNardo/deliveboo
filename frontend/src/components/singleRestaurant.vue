<script>
import axios from 'axios';

export default {

    name: "singleRestautants",

    data() {
        return {

            restaurants: [],
            products: []
        }
    },
    methods: {
        getRestaurants() {
            axios.get('http://localhost:8000/api/v1/restaurants/search', { params: { categories: this.filteredCategories } })
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    this.filteredRestaurants = data.response;
                })
                .catch(err => console.error(err));
        },
        getProducts() {
            axios.get('http://localhost:8000/api/v1/products/all')
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    this.categories = data.response;
                })
                .catch(err => console.error(err));
        },
    },
    mounted() {

        this.getRestaurants();
        this.getProducts()
    },
}
</script>

<template>
    <section>
        <div class="border-bottom border-light">
            <div class="ms_container py-5">
                <div class="d-flex justify-content-start align-items-start gap-5 mt-5">
                    <div class="card_img">
                        <img src="../../public/pizza.jpg" alt="">
                    </div>
                    <div class="d-flex row justify-content-center align-items-center lh-lg">
                        <h2>Il messicano</h2>
                        <p class="fs-5">Miglior ristorante messicano in italia dal 1926!</p>
                        <p class="fs-5">Messicano, Dolci, Pasta</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ms_container py-5 d-flex flex-wrap justify-content-center align-items-center gap-5">
            <div class="ms_card" style="width: ;">
                <img src="../../public/pizza.jpg" class="card-img-top" alt="...">
                <div class="card-body-cont">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </p>
                    <div class="d-flex justify-content-between align-items-center info_card" style="width: 100%;">
                        <strong class="text-danger">12.00$</strong>
                        <a href="#" class="btn btn-primary">
                            <font-awesome-icon icon="fa-solid fa-cart-shopping" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="ms_card" style="width: ;">
                <img src="../../public/pizza.jpg" class="card-img-top" alt="...">
                <div class="card-body-cont">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </p>
                    <div class="d-flex justify-content-between align-items-center info_card" style="width: 100%;">
                        <strong class="text-danger">12.00$</strong>
                        <a href="#" class="btn btn-primary">
                            <font-awesome-icon icon="fa-solid fa-cart-shopping" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="ms_card" style="width: ;">
                <img src="../../public/pizza.jpg" class="card-img-top" alt="...">
                <div class="card-body-cont">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </p>
                    <div class="d-flex justify-content-between align-items-center info_card" style="width: 100%;">
                        <strong class="text-danger">12.00$</strong>
                        <a href="#" class="btn btn-primary">
                            <font-awesome-icon icon="fa-solid fa-cart-shopping" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="ms_card" style="width: ;">
                <img src="../../public/pizza.jpg" class="card-img-top" alt="...">
                <div class="card-body-cont">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </p>
                    <div class="d-flex justify-content-between align-items-center info_card" style="width: 100%;">
                        <strong class="text-danger">12.00$</strong>
                        <a href="#" class="btn btn-primary">
                            <font-awesome-icon icon="fa-solid fa-cart-shopping" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="ms_card" style="width: ;">
                <img src="../../public/pizza.jpg" class="card-img-top" alt="...">
                <div class="card-body-cont">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </p>
                    <div class="d-flex justify-content-between align-items-center info_card" style="width: 100%;">
                        <strong class="text-danger">12.00$</strong>
                        <a href="#" class="btn btn-primary">
                            <font-awesome-icon icon="fa-solid fa-cart-shopping" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="ms_card" style="width: ;">
                <img src="../../public/pizza.jpg" class="card-img-top" alt="...">
                <div class="card-body-cont">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </p>
                    <div class="d-flex justify-content-between align-items-center info_card" style="width: 100%;">
                        <strong class="text-danger">12.00$</strong>
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