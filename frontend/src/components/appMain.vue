<script >
import appVideo from './appVideo.vue';
import pageRestaurants from './pageRestaurants.vue';
import Section1 from './Section1.vue';

export default {
    components: {
        appVideo,
        pageRestaurants,
        Section1,
    },
}
</script>

<template>
    <main>
        <appVideo v-if="$route.name === 'home'" />
        <pageRestaurants />
        <Section1 v-if="$route.name === 'home'" />
    </main>
</template>