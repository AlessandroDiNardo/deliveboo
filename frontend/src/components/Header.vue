<script>
import { RouterLink, RouterView } from 'vue-router';

export default {
    data() {
        return {
            image: '/img/home/Logo-Deliveboo.png'
        }
    },
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
                    <div class="dropdown">
                        <a class="btn_nav_cart dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <font-awesome-icon icon="fa-solid fa-cart-shopping" />
                        </a>
                        <ul class="dropdown-menu mt-3" style="width: 250px;">
                            <a class="dropdown-item mb-2" href="#">Riepilogo ordine:</a>
                            <li
                                class="d-flex justify-content-between align-items-center px-3 bg-secondary bg-opacity-25 border-bottom border-light">
                                <div>Cryspy McBacon</div>
                                <div>1x</div>
                            </li>
                            <li
                                class="d-flex justify-content-between align-items-center px-3 bg-secondary bg-opacity-25 border-bottom border-light">
                                <div>Big Mac</div>
                                <div>3x</div>
                            </li>
                            <li class="mt-5 d-flex justify-content-between align-items-center gap-3 px-3">
                                <RouterLink :to="{ name: 'payment' }">
                                    <div class="btn btn-success">Checkout</div>
                                </RouterLink>
                                <div> 11.85$</div>
                            </li>
                        </ul>
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