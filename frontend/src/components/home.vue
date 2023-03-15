<script >
import pageRestaurants from './pageRestaurants.vue';
import Section1 from './Section1.vue';

export default {
    components: {
        pageRestaurants,
        Section1,
    },
}
</script>

<template>
    <main>
        <pageRestaurants />
        <Section1 />
    </main>
</template>