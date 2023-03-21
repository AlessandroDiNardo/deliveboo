<script>
export default {
    data() {
        return {
            items: [{
                'title': 'Scopri Deliveboo',
                links: [
                    'Partners',
                    'Chi siamo',
                    'Ristoranti',
                    'Altro',
                    'Pressroom',
                    'Programmazione',
                    'Design',
                    'Lavora con noi',
                    'Diventa nostro partner'
                ]
            },
            {
                'title': 'Note legali',
                links: [
                    'Termini & Condizioni',
                    ' Informativa sulla privacy',
                    'Cookies'
                ]
            },
            {
                'title': 'Aiuto',
                links: [
                    ' Termini & Condizioni',
                    ' Informativa sulla privacy',
                    " Contatta l'Assistenza "
                ]
            },
            ]
        }
    },
}
</script>

<template>
    <footer class="p-5">
        <div class="list_container w-75 m-auto d-flex gap-5">
            <ul v-for="(element, index) in items" class="rounded-2 ul_cont">
                <li>
                    <h6 class="text-start">{{ element.title }}</h6>
                </li>
                <li v-for="link in element.links " class="pb-2 text-start">
                    <a href="#">
                        {{ link }} <img :src="image" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <h4 class="text-center mt-3">
            Deliveboo <span><font-awesome-icon icon="fa-solid fa-copyright" /></span> 2023
        </h4>
        <hr>
    </footer>
</template>

<style lang="scss" >
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

footer {
    background-color: $black;
    color: white;

    h2 {
        color: #069e24;
    }

    ul {
        list-style: none;
        background-color: #393939;
        display: flex;
        flex-direction: column;
        gap: 5px;
        height: 450px;
        padding: 30px;
    }

    li a {
        color: #069e24;
        transition: all 0.2s;
        text-decoration: none;

        &:hover {
            text-decoration: underline;
            color: white;
        }
    }
}

.list_container {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
}

@media screen and (max-width: 750px) {
    .list_container {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .ul_cont {
        height: 200px;
        overflow-y: scroll;
    }

    .ul_cont::-webkit-scrollbar {
        display: none;
    }

    .ul_cont {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }
}
</style>
