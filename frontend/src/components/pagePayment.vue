<script>
import axios from 'axios';

export default {
    name: "pagePayment",

    data() {
        return {
            clientToken: null,
            paymentMethodNonce: null,
            transaction: {
                'paymentInfo': {
                    'payment_method_nonce' : null,
                    'productsIds': [],
                },

                'orderInfo': {
                    'buyer_first_name' : null,
                    'buyer_last_name' : null,
                    'buyer_email' : null,
                    'buyer_phone_number' : null,
                    'address' : null,
                }
            },
        }
    },

    methods: {
        loadCart() {
            // carica il carrello dal local storage
            const cartItems = localStorage.getItem('cartItems');
            if (cartItems) {
                let items = JSON.parse(cartItems);

                items.forEach(element => {
                    for (let index = 0; index < element.quantity; index++) {

                        this.transaction.paymentInfo.productsIds.push(element.id);
                        
                    }

                    console.log(this.transaction.paymentInfo.productsIds);
                });
            }
        }
    },

    watch: {
        'transaction.orderInfo.buyer_first_name'(newValue) {
            if (newValue) {
                console.log(this.transaction);
            }
        }
    },

    mounted() {
        this.loadCart();


        axios.get('http://localhost:8000/api/v1/braintree/client-token')
            .then(res => {
                const data = res.data;
                const success = data.success;
                const result = data.response;

                if (success) {
                    this.clientToken = result;
                }

                const form = document.getElementById('payment-form');

                braintree.dropin.create({
                    authorization: this.clientToken,
                    container: '#dropin-container',

                }, (error, dropinInstance) => {
                        if (error) console.error(error);

                    form.addEventListener('submit', event => {
                        event.preventDefault();

                        dropinInstance.requestPaymentMethod((error, payload) => {
                            if (error) console.error(error);

                            // Step four: when the user is ready to complete their
                            //   transaction, use the dropinInstance to get a payment
                            //   method nonce for the user's selected payment method, then add
                            //   it a the hidden field before submitting the complete form to
                            //   a server-side integration
                            this.transaction.paymentInfo.payment_method_nonce = payload.nonce;

                            console.log(this.transaction);

                            axios.post('http://localhost:8000/api/v1/braintree/transaction', this.transaction)
                                .then(res => {
                                    const data = res.data;
                                    const success = data.success;
                                    const result = data.response;

                                    if (success) {
                                        console.log(result);
                                        // console.log(result.success, result.transaction.status);
                                    }
                                })
                                .catch(err => console.error(err));
                            });
                        });
                    });
            })  
            .catch(error => {
                console.error(error);
            });
    }
}
</script>


<template>
    <section>
        <div class="ms_container">
            <h1 class="text-center fw-bolder">Completa il tuo Ordine!</h1>
            <div class="border border-dark py-3 rounded-5 bg-light" style="width:400px;">
                <h3 class=" p-3">Riepilogo ordine:</h3>
                <div class="d-flex justify-content-between align-items-center p-3 bg">
                    <div>Crispy McBacon</div>
                    <div>1x</div>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3 bg">
                    <div>Big Mac</div>
                    <div>3x</div>
                </div>
                <div class="d-flex justify-content-between align-items-center pt-5 px-3">
                    <strong>Totale: </strong>
                    <strong class="text-danger">20.00$</strong>
                </div>
            </div>
            <form id="payment-form" action="/route/on/your/server" method="post">
                <div class="d-flex justify-content-evenly align-items-center gap-5 border border-dark mt-5 py-5 rounded-5">
                    <div>
                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">
                                    Nome<span class="text-danger"> *</span>
                                </label> 
                                
                                <input type="text" placeholder="" v-model="this.transaction.orderInfo.buyer_first_name"> 
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">
                                    Cognome <span class="text-danger"> *</span>
                                </label>
                                
                                <input type="text" placeholder="" v-model="this.transaction.orderInfo.buyer_last_name">
                            </div>

                        </div>

                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">
                                    Email<span class="text-danger"> *</span>
                                </label> 
                                <input type="text" placeholder="" v-model="this.transaction.orderInfo.buyer_email"> 
                            </div>

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">
                                    Numero telefonico<span class="text-danger">*</span>
                                </label> 
                                <input type="text" placeholder="" v-model="this.transaction.orderInfo.buyer_phone_number"> 
                            </div>

                        </div>

                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3">
                                    indirizzo<span class="text-danger"> *</span>
                                </label>
                                
                                <input type="text" placeholder="" v-model="this.transaction.orderInfo.address">
                            </div>
                        </div>

                    </div>
                    <div>
                        <!-- Putting the empty container you plan to pass to `braintree.dropin.create` inside a form will make layout and flow easier to manage -->
                        <div id="dropin-container"></div>
                        <input type="submit" />
                        <input type="hidden" id="nonce" name="payment_method_nonce" />
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>


<style lang="scss" scoped>
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

section {
    background-color: $bg_main;
}

.ms_container {
    padding-top: 130px;
    padding-bottom: 50px;
}

h1 {
    color: $main_color;
}

.bg {
    background-color: rgb(186, 185, 185);
    padding: 20px;
    border-bottom: 1px solid white;
    transition: 0.8s;

    &:hover {
        background-color: white;
        border-bottom: 1px solid rgb(186, 185, 185);
    }
}

.card {
    padding: 30px 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2);
}


input,
textarea,
button {
    padding: 8px 15px;
    border-radius: 5px;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 18px;
    font-weight: 300
}

.btn-block {
    text-transform: uppercase;
    font-size: 15px;
    font-weight: 400;
    height: 43px;
    cursor: pointer;
    text-align: center;
}

.btn-block:hover {
    color: #fff;
}
</style>