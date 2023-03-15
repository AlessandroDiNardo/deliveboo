<script >
import appVideo from './appVideo.vue';
import pageRestaurants from './pageRestaurants.vue';
import singleRestaurant from './singleRestaurant.vue';
import Section1 from './Section1.vue';

export default {
    components: {
        appVideo,
        pageRestaurants,
        singleRestaurant,
        Section1,
    },
}
</script>

<template>
    <main>
        <appVideo v-if="$route.name === 'home'" />
        <pageRestaurants v-if="$route.name === 'home'" />
        <singleRestaurant v-if="$route.name === 'restaurant'" />
        <Section1 v-if="$route.name === 'home'" />
    </main>
</template>