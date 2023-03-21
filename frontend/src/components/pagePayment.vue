<script>
import axios from 'axios';
import { store } from '../store';

export default {
    name: "pagePayment",

    data() {
        return {
            store,
            notValid:false,
            cart: null,
            clientToken: null,
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

            transactionSubmitted: false,
            transactionLoading: false,
            transactionSuccess: false,
        }
    },

    methods: {
        scrollToTop(){
            window.scrollTo({ top: 0, behavior: 'smooth' });
          
            
        },
        validateForm() {
    if (!this.transaction.orderInfo.buyer_first_name || !this.transaction.orderInfo.buyer_last_name ||
        !this.transaction.orderInfo.buyer_email || !this.transaction.orderInfo.buyer_phone_number ||
        !this.transaction.orderInfo.address || !this.transaction.orderInfo.city ||
        !this.transaction.orderInfo.postal_code) {
      this.notValid = true;
     
    } else {
      this.notValid = false;
    }
  },
       

        transactionCall() {
            this.transactionSubmitted = true;
            this.transactionLoading = true;

            axios.post('http://localhost:8000/api/v1/braintree/transaction', this.transaction)
                .then(res => {
                    const data = res.data;
                    const success = data.success;
                    const result = data.response;

                    console.log(success);

                    if (success) {
                        this.transactionLoading = false;

                        if(result.transaction.success) {
                            this.transactionSuccess= true;
                        }

                        console.log(result.transaction.success, result.order);
                        // console.log(result.success, result.transaction.status);
                    }
                })
                .catch(err => console.error(err));
                            
        },

        saveCartToTransaction() {
            if (store.cartItems != null) {

                store.cartItems.forEach(element => {
                    for (let index = 0; index < element.quantity; index++) {
    
                        this.transaction.paymentInfo.productsIds.push(element.id);
                        
                    }
    
                    // DEBUG
                    console.log(this.transaction.paymentInfo.productsIds);
                });
            }
        }
    },

    mounted() {
        this.saveCartToTransaction();


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

                            this.transaction.paymentInfo.payment_method_nonce = payload.nonce;

                            
                            // DEBUG
                            console.log(this.transaction);

                            this.transactionCall();
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
    <section v-if="!transactionSubmitted">
        <div id="up" class="ms_container">
            <h1 class="text-center fw-bolder">Completa il tuo Ordine!</h1>
            <div class="border border-dark py-3 rounded-5 bg-light" style="max-width: 400px; margin: 40px auto;padding: 20px;">
                <h3 class=" p-3">Riepilogo ordine:</h3>
                <div class="d-flex justify-content-between align-items-center p-3 bg" v-for="item in store.cartItems">
                    <div class="pe-2">{{ item.name }}</div>
                    <div class="mx-1">{{ item.quantity }}x</div>
                    <div>{{ item.price*item.quantity }}€</div>
                </div>
            </div>
            <form @submit="validateForm" id="payment-form"  action="/route/on/your/server" method="post">
                <div class="d-flex justify-content-evenly align-items-center gap-5 border border-dark mt-5 py-5 rounded-5" id="form_container">
                    <div>
                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label">
                                    Nome<span class="text-danger"> *</span>
                                </label> 
                                
                                <input  required type="text" placeholder=""  v-model="this.transaction.orderInfo.buyer_first_name  " > 
                                <div v-if="notValid">Il campo nome è obbligatorio.</div>

                            </div>

                         <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label">
                                    Cognome<span class="text-danger"> *</span>
                                </label> 
                                
                                <input required type="text" placeholder="" v-model="this.transaction.orderInfo.buyer_last_name" > 
                            </div>

                          <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label">
                                    Email<span class="text-danger"> *</span>
                                </label> 
                                <input required  type="text" placeholder="" v-model="this.transaction.orderInfo.buyer_email"> 
                            </div>

                           <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label">
                                    Numero telefonico<span class="text-danger">*</span>
                                </label> 
                                <input required type="text" placeholder="" v-model="this.transaction.orderInfo.buyer_phone_number"> 
                            </div>
                            
                        </div>

                        <div class="row justify-content-between text-left">

                         <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label">
                                    indirizzo<span class="text-danger"> *</span>
                                </label>
                                
                                <input required type="text" placeholder="" v-model="this.transaction.orderInfo.address">
                            </div>
                            

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label">
                                   CIttà<span class="text-danger">*</span>
                                </label> 
                                <input required type="text" placeholder="" v-model="this.transaction.orderInfo.buyer_phone_number"> 
                            </div>

                        </div>

                        <div class="row justify-content-between text-left">

                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label">
                                   CAP<span class="text-danger"> *</span>
                                </label>
                                
                                <input required type="text" placeholder="" v-model="this.transaction.orderInfo.address">
                            </div>
                        </div>

                       
                    </div>
                    
                    <div>
                        <!-- Putting the empty container you plan to pass to `braintree.dropin.create` inside a form will make layout and flow easier to manage -->
                        <div id="dropin-container"></div>
                        <input  type="submit" />
                        <input type="hidden" id="nonce" name="payment_method_nonce" />
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section class="ms_container vcontainer-fluid" v-else>
        <section class="ms_container text-center h-100 " v-if="transactionLoading">
            <img class="loading_img animate__animated animate__bounce animate__infinite" src="../assets/Logo-Deliveboo.png" alt="">
        </section> 

        <section class="ms_container h-100 text-center" v-if="!transactionLoading">
            <section class="ms_container" v-if="transactionSuccess">
                <h1 class="animate__animated animate__bounceIn">

                    Congratulazioni <br>
                    Il tuo ordine n.Sto cazzone è in arrivo
                </h1> 
            </section>

            <section class="ms_container height-100 text-center" v-else>
                <h1 class="animate__animated animate__bounceIn">
                  Ci Dispiace ma la sua transazione non è valida.

                </h1> 
            </section>
        </section>
    </section>
</template>


<style lang="scss" scoped>
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

section {
    background-color: $bg_main;
}

.ms_container {
    padding-top: 150px;
    padding-bottom: 100px;
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

.loading_img{
    max-width: 100px;
    filter: invert(57%) sepia(70%) saturate(1956%) hue-rotate(108deg) brightness(91%) contrast(95%);
    
    
}

#form_container{
    width: 90%;
    margin: auto;
      margin-top: auto;
    padding: 15px;
      padding-top: 15px;
      padding-bottom: 15px;
      
  }

 
//Responsive Form_Container

@media (max-width: 768px) {
  #form_container{
    flex-direction: column;
  }
}

</style>