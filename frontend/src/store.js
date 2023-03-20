import { reactive } from 'vue';
import axios from 'axios';

export const store = reactive({
    // variables
    cartItems: null, 
    shippingCost: null,


    // functions
    getShippingCost() {
        if(this.cartItems.length != 0) {
          axios.get('http://localhost:8000/api/v1/products/all', { params: { restaurantId: this.cartItems[0].restaurant_id } })
            .then(res => {
                const data = res.data;
                const success = data.success;
                const result = data.response.restaurant;
  
                if (success) {
                   return this.shippingCost = result.shipping_cost;
                }
            })
            .catch(err => console.error(err));
        }
    },

    totalProducts() {
        if (this.cartItems.length != 0) {
          return this.cartItems.reduce((acc, product) => acc + product.price * product.quantity, 0);
        }
    },

    total() {
        return parseFloat(this.totalProducts()) + parseFloat(this.shippingCost);
    },

    formatPrice(price) {
        return parseFloat(price).toFixed(2) + '€';
    }
})