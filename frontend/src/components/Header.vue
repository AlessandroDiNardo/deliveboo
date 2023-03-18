<script>
import { RouterLink, RouterView } from 'vue-router';
import axios from 'axios';

export default {
    data() {
        return {
            image: '/img/home/Logo-Deliveboo.png',
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
                        this.products = result.products;
                        this.shippingCost = result.shipping_cost;
                    }
                })
                .catch(err => console.error(err));
        },

        checkRestaurantCart(product) {
            // se il carrelo ha almeno un elemento...
            if (this.cartItems.length != 0) {
                // controlla se restaurant_id del prodotto che si sta aggiungendo è uguale a quello dell'ultimo prodotto nell'array
                if (product.restaurant_id != this.cartItems[this.cartItems.length - 1].restaurant_id) {
                    return false
                }
            }
            return true
        },

        addToCart(product) {
            if (this.checkRestaurantCart(product)) {

                // controlla se il prodotto è già nel carrello
                const existingItemIndex = this.cartItems.findIndex(item => item.id === product.id);

                if (existingItemIndex >= 0) {
                    // se il prodotto esiste già nel carrello, aggiorna solo la quantità
                    this.cartItems[existingItemIndex].quantity++;
                } else {
                    // altrimenti, aggiungi il prodotto al carrello
                    this.cartItems.push({
                        id: product.id,
                        name: product.name,
                        price: product.price,
                        quantity: 1,
                        restaurant_id: product.restaurant_id
                    });

                    console.log(this.cartItems[this.cartItems.length - 1])
                }
                // aggiorna il carrello nel local storage
                localStorage.setItem('cartItems', JSON.stringify(this.cartItems));
            } else {
                alert('Non puoi acquistare da un altro ristorante! Completa o cancella il precedente ordine.');
            }
        },

        removeFromCart(index) {
            this.cartItems.splice(index, 1)

            // aggiorna il carrello nel local storage
            localStorage.setItem('cartItems', JSON.stringify(this.cartItems));
        },

        removeQuantityOne(index) {
            // riduci di una unità quantità prodotto
            this.cartItems[index].quantity--;

            // se la quantità diventa zero...
            if (this.cartItems[index].quantity == 0) {
                // rimuovi l'oggetto dall'array
                this.cartItems.splice(index, 1)

                // aggiorna il carrello nel local storage
                localStorage.setItem('cartItems', JSON.stringify(this.cartItems));
            }
        },

        loadCart() {
            // carica il carrello dal local storage
            const cartItems = localStorage.getItem('cartItems');
            if (cartItems) {
                this.cartItems = JSON.parse(cartItems);
            }
        },

        emptyCart() {
            this.cartItems = [];

            localStorage.setItem('cartItems', JSON.stringify(this.cartItems));

        },

        formatPrice(price) {
            return parseFloat(price).toFixed(2) + '€';
        },
    },

    mounted() {
        this.getProducts();
    },

    computed: {
        totalProducts() {
            return this.cartItems.reduce((acc, product) => acc + product.price * product.quantity, 0);
        },

        total() {
            return parseFloat(this.totalProducts) + parseFloat(this.shippingCost);
        },
    }
}



</script>

<template>
    <header>
        <nav class="navbar  bg-transparent w-75 m-auto">
            <div class="container-fluid">
                <a class="navbar-brand bg-transparent d-flex gap-3 align-items-center" href="#">
                    <RouterLink :to="{ name: 'home' }" class="d-flex gap-3 align-items-center text-decoration-none">
                        <img :src="image" alt="Logo" width="40" height="34"
                            class="d-inline-block align-text-top Logo_filter">
                        <h1>Deliveboo</h1>
                    </RouterLink>
                </a>
                <div class="d-flex justify-content-center align-items-center ">
                    <button class=" mx-2  btn_nav rounded-2 p-1">
                        <a class="  text-decoration-none  link_nav  " href="http://localhost:8000/register">
                            Area Riservata
                        </a>
                    </button>
                    <div>
                        <div class="dropdown">
                            <a class="btn_nav_cart dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <font-awesome-icon icon="fa-solid fa-cart-shopping" />
                            </a>
                            <ul class="dropdown-menu mt-3" style="width: 250px;">
                                <a class="dropdown-item mb-2" href="#">Riepilogo ordine:</a>
                                <li class="d-flex justify-content-between align-items-center px-3 bg-secondary bg-opacity-25 border-bottom border-light"
                                    v-for="(item, index) in cartItems" :key="index">
                                    <div>{{ item.name }}</div>
                                    <div>x {{ item.quantity }}</div>
                                </li>
                                <li class="mt-5 d-flex justify-content-between align-items-center gap-3 px-3">
                                    <RouterLink :to="{ name: 'payment' }">
                                        <div class="btn btn-success">Checkout</div>
                                    </RouterLink>
                                    <div class="text-danger">{{ formatPrice(total) }}</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<style lang="scss">
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

// stile Intestazione 
header {
    background-color: black;
    position: absolute;
    top: 0;
    // background: $black;
    width: 100%;
    z-index: 1;
}

.Logo_filter {
    filter: invert(45%) sepia(70%) saturate(1956%) hue-rotate(108deg) brightness(91%) contrast(95%);
}

#font_logo {
    font-weight: 900;
    color: $main-color;
}

.btn_nav {
    background-color: $main-color;
    font-weight: 600;
    transition: ease-in-out 1s;
    border: none;

    &:hover {
        background-color: white;
        border: $main-color 1px solid;
    }
}

.link_nav {
    transition: ease-in-out 1s;
    color: white;
}

.btn_nav .link_nav:hover {
    color: $main-color;
}

.btn_nav_cart {
    background-color: $main-color;
    color: white;
    padding: 5px 15px;
    border-radius: 5px;

    &:hover {
        color: white;
    }
}

//Stile Video

.video_bg {

    width: 100%;
    opacity: 0.5;
}

a {
    h1 {
        font-weight: 800;
        color: $main-color;
    }
}
</style>