import { createRouter, createWebHistory } from 'vue-router';

import App from './App.vue';
import Restaurants from './components/pageRestaurants.vue';
import Dishes from './components/pageDishes.vue';
import Payment from './components/pagePayment.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: App
        },
        {
            path: '/restaurant',
            name: 'restaurant',
            component: Restaurants
        },
        {
            path: '/dishes',
            name: 'dishes',
            component: Dishes
        },
        {
            path: '/payment',
            name: 'payment',
            component: Payment
        }
    ]
});

export default router;
