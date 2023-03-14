<script>

export default {
    data() {
        return {
            items: [{
                'title': 'Scopri Deliveboo',

                links: [
                    'Parteners',
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
                    'Cookies'
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
            <ul v-for="(element, index) in items" class="rounded-2">
                <li>
                    <h6 class="text-start">{{ element.title }}</h6>
                </li>
                <li v-for="link in element.links " class="pb-2 text-start">
                    <a href="#">
                        {{ link }} <img :src="image" alt="">
                    </a>
                </li>
            </ul>
            <ul class="rounded-2">
                <li>
                    <h6 class="text-start">Porta deliveboo con te</h6>
                </li>
                <li class="pb-2 text-start">
                </li>
            </ul>
        </div>
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
        background-color: #434848;
        display: flex;
        flex-direction: column;
        gap: 5px;
        height: 400px;
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
</style>