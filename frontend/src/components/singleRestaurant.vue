<script>
import axios from 'axios';

export default {

    name: "singleRestautants",

    data() {
        return {

            restaurants: [],
            products: []
        }
    },
    methods: {
        getRestaurants() {
            axios.get('http://localhost:8000/api/v1/restaurants/search', { params: { categories: this.filteredCategories } })
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    this.filteredRestaurants = data.response;
                })
                .catch(err => console.error(err));
        },
        getProducts() {
            axios.get('http://localhost:8000/api/v1/products/all')
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    this.categories = data.response;
                })
                .catch(err => console.error(err));
        },
    },
    mounted() {

        this.getRestaurants();
        this.getProducts()
    },
}
</script>

<template>
    <h1>siuuuuuuuuu</h1>
</template>

<style></style>