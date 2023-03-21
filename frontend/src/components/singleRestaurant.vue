<script>
import axios from 'axios';
import { store } from '.././store.js';

export default {

    name: "singleRestautants",

    data() {
        return {
            store,
            restaurant: [],
            products: [],
            cartItems: [],
            shippingCost: "",
        }
    },
    methods: {

        getProducts() {
            axios.get('http://localhost:8000/api/v1/products/all', { params: { restaurantId: this.$route.params.id } })
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    const result = data.response.restaurant;

                    if (success) {
                        this.restaurant = result;
                        this.products = result.products.filter(product => product.visible === 1);
                        console.log(this.products);
                        this.shippingCost = result.shipping_cost;
                    }
                })
                .catch(err => console.error(err));
        },

        checkRestaurantCart(product) {
            // se il carrelo ha almeno un elemento...
            if (store.cartItems.length != 0) {
                // controlla se restaurant_id del prodotto che si sta aggiungendo è uguale a quello dell'ultimo prodotto nell'array
                if (product.restaurant_id != store.cartItems[store.cartItems.length - 1].restaurant_id) {
                    return false
                }
            }

            store.shippingCost = this.shippingCost

            return true
        },

        addToCart(product) {
            if (this.checkRestaurantCart(product)) {

                // controlla se il prodotto è già nel carrello
                const existingItemIndex = store.cartItems.findIndex(item => item.id === product.id);

                if (existingItemIndex >= 0) {
                    // se il prodotto esiste già nel carrello, aggiorna solo la quantità
                    store.cartItems[existingItemIndex].quantity++;
                } else {
                    // altrimenti, aggiungi il prodotto al carrello
                    store.cartItems.push({
                        id: product.id,
                        name: product.name,
                        price: product.price,
                        quantity: 1,
                        restaurant_id: product.restaurant_id
                    });

                    // DEBUG
                    console.log(store.cartItems[store.cartItems.length - 1])
                }

                // aggiorna il carrello nel local storage
                localStorage.setItem('cartItems', JSON.stringify(store.cartItems));
            } else {
                alert('Non puoi acquistare da un altro ristorante! Completa o cancella il precedente ordine.');
            }
        },

        removeFromCart(index) {
            store.cartItems.splice(index, 1)

            if (store.cartItems.length == 0) {
                store.resetShippingCost();
            }

            // aggiorna il carrello nel local storage
            localStorage.setItem('cartItems', JSON.stringify(store.cartItems));
        },

        removeQuantityOne(index) {
            // riduci di una unità quantità prodotto
            store.cartItems[index].quantity--;

            // se la quantità diventa zero...
            if (store.cartItems[index].quantity == 0) {
                // rimuovi l'oggetto dall'array
                store.cartItems.splice(index, 1)

                if (store.cartItems.length == 0) {
                    store.resetShippingCost();
                }

            }
            // aggiorna il carrello nel local storage
            localStorage.setItem('cartItems', JSON.stringify(store.cartItems));

        },
    },

    mounted() {
        this.getProducts();
    },

    computed: {
    }
}
</script>

<template>
    <section>
        <div class="border-bottom border-light">
            <div class="ms_container py-5  p-5 ">
                <RouterLink :to="{ name: 'home' }" class="btn btn-success p-2 ">
                    <font-awesome-icon icon="fa-solid fa-person-walking-arrow-loop-left" /> Torna alla Home!
                </RouterLink>
                <div class="d-flex justify-content-start align-items-start gap-5 mt-5">
                    <div class="card_img">
                        <img :src="restaurant.img" alt="">
                    </div>
                    <div class="d-flex row justify-content-center align-items-center lh-lg">
                        <h2> {{ restaurant.name }}</h2>
                        <p class="fs-5">{{ restaurant.description }}</p>
                        <p> {{ restaurant.place }}</p>
                        <p> Orario: {{ restaurant.opening_time }} - {{ restaurant.closing_time }}
                        </p>
                        <p> Giorno di chiusura: {{ restaurant.closing_day }}</p>
                        <div class="d-flex justify-conten-start align-items-center gap-2">
                            <div class="btn btn-success me-2" v-for="category in restaurant.categories">
                                {{ category.name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-evenly align-teims-center gap-5 p-5">
            <div class="restaurant_cont d-flex flex-wrap justify-content-start align-items-center gap-4">
                <div class="ms_card" v-for="product in products">
                    <img :src="product.img" class="card-img-top" alt="...">
                    <div class="card-body-cont" style="height: 100%;">
                        <h5 class="card-title">{{ product.name }}</h5>
                        <p class="card-text">
                            {{ product.ingredients }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center info_card" style="width: 100%;">
                            <strong class="text-danger">{{ product.price }} €</strong>
                            <button class="btn btn-primary" @click="addToCart(product)">
                                <font-awesome-icon icon="fa-solid fa-cart-shopping" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart_container" v-if="store.cartItems.length != 0">
                <ul class="order_cont">
                    <li v-for="(item, index) in store.cartItems" :key="index">
                        <span>{{ item.name }}.</span>

                        <div class="d-flex justify-content-between align-teims-center pt-2">
                            <div class="d-flex justify-content-start align-items-center gap-2 py-1">
                                <span class="text-danger">
                                    {{ store.formatPrice(item.price * item.quantity) }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-start align-items-center gap-3 py-1">
                                <button class="btn btn-warning d-flex justify-content-center align-items-center"
                                    @click="removeQuantityOne(index)" style="width:30px; height: 30px;">
                                    <font-awesome-icon icon="fa-solid fa-minus" />
                                </button>
                                <span> x{{ item.quantity }}</span>
                                <button class="btn btn-success d-flex justify-content-center align-items-center"
                                    @click="addToCart(item)" style="width:30px; height: 30px;">
                                    <font-awesome-icon icon="fa-solid fa-plus" />
                                </button>
                                <button class="btn btn-danger d-flex justify-content-center align-items-center"
                                    @click="removeFromCart(index)" style="width:30px; height: 30px;">
                                    <font-awesome-icon icon="fa-solid fa-x" />
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="p-3 d-flex justify-content-between align-items-start flew-wrap gap-5 bg-light">
                    <div>
                        <!-- <p>Totale prodotti: {{ formatPrice(totalProducts) }}</p> -->
                        <p>
                            <span class="text-danger">Costo di spedizione: </span>
                            <span> {{ store.formatPrice(store.shippingCost) }}</span>
                        </p>
                        <p>
                            <span class="text-danger">Totale: </span>
                            <span>{{ store.formatPrice(store.total()) }} </span>
                        </p>
                        <RouterLink :to="{ name: 'payment' }">
                            <div class="btn btn-success mt-3">Checkout</div>
                        </RouterLink>
                    </div>
                    <button class="btn btn-danger" @click="store.emptyCart()" style="width:50px;">
                        <font-awesome-icon icon="fa-solid fa-trash" />
                    </button>
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
    max-width: 1630px;
}

.restaurant_cont {
    height: 500px;
    overflow-y: scroll;
    padding-left: 90px;
    max-width: 1320px;
}

.restaurant_cont::-webkit-scrollbar {
    display: none;
}

.restaurant_cont {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.card_img {

    height: 250px;
    width: 350px;

    img {
        height: 250px;
        width: 350px;
        border-radius: 20px;
    }
}

.ms_card {
    width: 350px;
    height: 450px;
    border: 1px $black;
    border-radius: 1px;
    border: 1px solid rgb(255, 255, 255);
    border-top-left-radius: 20px;
    border-top-right-radius: 20px;
    border-bottom-left-radius: 20px;
    border-bottom-right-radius: 20px;

    img {
        height: 250px;
        width: 348px;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .card-body-cont {
        display: flex;
        justify-content: start;
        align-items: start;
        gap: 5px;
        flex-direction: column;
        padding: 10px 20px;
        position: relative;

        .info_card {
            position: absolute;
            top: 34%;
            left: 0;
            padding: 0 30px;

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

.cart_container {

    width: 400px;
    list-style-type: none;
    border-radius: 20px;
    margin-bottom: 50px;

    li {
        padding: 10px;
        background-color: rgb(196, 196, 196);
        border-bottom: 1px solid white;
    }
}

.order_cont {
    height: 300px;
    overflow-y: scroll;
    border: 1px solid white;
    margin-top: 24px;
}

.order_cont::-webkit-scrollbar {
    display: none;
}

.order_cont {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
}
</style>