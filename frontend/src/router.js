import { createRouter, createWebHistory } from 'vue-router';

import App from './App.vue';
import singleRestaurant from './components/singleRestaurant.vue';
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
            path: '/restaurant/:id',
            name: 'restaurant',
            component: singleRestaurant
        },

        {
            path: '/payment',
            name: 'payment',
            component: Payment
        }
    ]
});

export default router;
