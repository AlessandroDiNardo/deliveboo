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
                <div>
                    <button class=" mx-2  btn_nav rounded-2 p-1">
                        <a class="  text-decoration-none  link_nav  " href="http://localhost:8000/register">
                            Area Riservata
                        </a>
                    </button>
                    <button class=" mx-2  rounded-5 p-1 bg-white border-0">
                        <a class="  text-decoration-none text-primary  link_nav  " href="#">
                            <RouterLink :to="{ name: 'payment' }">
                                <font-awesome-icon icon="fa-solid fa-cart-shopping" />
                            </RouterLink>
                        </a>
                    </button>
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