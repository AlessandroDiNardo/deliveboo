<script>

export default {
    data() {
        return {
            image: 'Logo-Deliveboo.png'
        }
    },
}



</script>

<template>
    <header>
        <nav class="navbar  bg-transparent w-75 m-auto">
            <div class="container-fluid">
                <a class="navbar-brand bg-transparent" href="#">
                    <img :src="image" alt="Logo" width="40" height="34" class="d-inline-block align-text-top Logo_filter">
                    <span class="mx-2" id="font_logo">Deliveboo</span>
                </a>
                <div>
                    <button class="  mx-2 btn_nav rounded-2 p-1">
                        <a class=" text-decoration-none link_nav " href="#">
                            Registrati
                        </a>
                    </button>
                    <button class=" mx-2  btn_nav rounded-2 p-1">
                    <a class="  text-decoration-none  link_nav  " href="#">
                        Area Riservata
                    </a>
                </button>
                    <button class=" mx-2  rounded-5 p-1 bg-white border-0">
                        <a class="  text-decoration-none text-primary  link_nav  " href="#">
                            <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                        </a>
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <!-- <section>
                                    <div class="video_container m-0 p-0 bg-black ">
                                        <video class="video_bg" src="../assets/video-jumbo.mp4" autoplay loop muted></video>
                                    </div>
                                </section> -->
</template>

<style lang="scss">
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

header {
    background-color: $black;

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
}
</style>
