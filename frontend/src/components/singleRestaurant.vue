<script>
import axios from 'axios';

export default {

    name: "singleRestautants",

    data() {
        return {

            restaurant: [],
            products: [],
            cartItems: [], 
            shippingCost : "",
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
                    restaurant_id : product.restaurant_id
                    });

                    console.log(this.cartItems[this.cartItems.length -1])
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
        this.loadCart();
        this.getProducts();
    },

    computed: {
        totalProducts() {
            return this.cartItems.reduce((acc, product) => acc + product.price*product.quantity, 0);
        },

        total() {
            return parseFloat(this.totalProducts)+ parseFloat(this.shippingCost); 
        },
    }
}
</script>

<template>
    <section>
        <div class="border-bottom border-light">
            <div class="ms_container py-5">
                <RouterLink :to="{ name: 'home' }" class="btn btn-success mb-3">
                    <font-awesome-icon icon="fa-solid fa-person-walking-arrow-loop-left" /> Torna alla Home!
                </RouterLink>
                <div class="d-flex justify-content-start align-items-start gap-5 mt-5">
                    <div class="card_img">
                        <img :src="restaurant.img" alt="">
                    </div>
                    <div class="d-flex row justify-content-center align-items-center lh-lg">
                        <h2> {{ restaurant.name }}</h2>
                        <p class="fs-5">{{ restaurant.description }}</p>
                        <p class="fs-5">
                            <span class="btn btn-success me-2" v-for="category in restaurant.categories"> {{ category.name
                            }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ms_container py-5 d-flex flex-wrap justify-content-center align-items-center gap-5">
            <div class="ms_card" v-for="product in products">
                <img :src="product.img" class="card-img-top" alt="...">
                <div class="card-body-cont">
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

        <ul>
            <li v-for="(item, index) in cartItems" :key="index">
                <span>
                    {{ item.name }} - 

                    <button class="btn btn-primary" @click="removeQuantityOne(index)"><font-awesome-icon icon="fa-solid fa-minus" /></button>

                        x{{ item.quantity }} 

                    <button class="btn btn-primary" @click="addToCart(item)"><font-awesome-icon icon="fa-solid fa-plus" /></button>
                    
                    - {{ item.price*item.quantity }} € 
                </span>
                <button @click="removeFromCart(index)">Rimuovi dal Carrello</button>
            </li>
            <div v-if="this.cartItems.length != 0">
                <button class="btn btn-danger" @click="emptyCart">Svuota Carrello</button>
                
                <p>Totale prodotti: {{ formatPrice(totalProducts) }}</p>
                <p>Costo di spedizione: {{ formatPrice(shippingCost) }}</p>
                <p>Totale: {{ formatPrice(total) }}</p>
            </div>
        </ul>

        <div v-if="this.cartItems.length != 0">
            <span>

            </span>
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

    height: 250px;
    width: 350px;

    img {
        height: 250px;
        width: 350px;
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