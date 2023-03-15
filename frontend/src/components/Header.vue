<script>
import { RouterLink, RouterView } from 'vue-router';

export default {
    data() {
        return {
            image: '../../public/img/home/Logo-Deliveboo.png'
        }
    },
}



</script>

<template>
    <header>
        <nav class="navbar  bg-transparent w-75 m-auto">
            <div class="container-fluid">
                <a class="navbar-brand bg-transparent" href="#">
                    <RouterLink :to="{ name: 'home' }">
                        <img :src="image" alt="Logo" width="40" height="34"
                            class="d-inline-block align-text-top Logo_filter">
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
    position: absolute;
    top: 0;
    background: $black;
    width: 100%;
    z-index: 1;
}

.Logo_filter {
    filter: invert(57%) sepia(70%) saturate(1956%) hue-rotate(108deg) brightness(91%) contrast(95%);
}

#font_logo {

    font-weight: 900;
    color: #069e24;


}

.btn_nav {
    background-color: #069e24;
    font-weight: 600;
    transition: ease-in-out 1s;
    border: none;

    &:hover {
        background-color: white;
        border: #00eb56 1px solid;


    }
}

.link_nav {
    transition: ease-in-out 1s;
    color: white;
}

.btn_nav .link_nav:hover {
    color: #069e24;
}

//Stile Video

.video_bg {

    width: 100%;
    opacity: 0.5;
}
</style>