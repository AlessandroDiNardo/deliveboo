<script>
export default {
    name: "pagePayment"
}
</script>


<template>
 <div class="container-fluid  px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                    <h5 class="text-center mb-4">Inserisci i tuoi dati </h5>
                    <form class="form-card">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Nome<span class="text-danger"> *</span></label> <input type="text" placeholder="" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Cognome<span class="text-danger"> *</span></label> <input type="text" placeholder="" > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> <input type="text" placeholder="" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Numero telefonico<span class="text-danger"> *</span></label> <input type="text" placeholder="" > </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">indirizzo<span class="text-danger"> *</span></label> <input type="text"  placeholder="" > </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6">  <button type="button" class="btn-block ">INVIA</button>  </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container my-5 py-5">
                <div class="row d-flex justify-content-between py-5">
                    <div class="col-md-7 col-lg-5 col-xl-4">
                        
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <form>
                                    <h5 class="text-center mb-3">Pay with card</h5>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="form-outline">
                                            <label class="form-label" for="typeText">Numero di carta<span class="text-danger"> *</span></label>
                                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                                            placeholder="" minlength="19" maxlength="19" />
                                        </div>
                                        <img class="img-fluid" style="width: 60px; padding-top: 30px;"  src="visa.png"/>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="typeName">Nome del titolare<span class="text-danger"> *</span></label>
                                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                                            placeholder="" />
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="typeExp">Expiration<span class="text-danger"> *</span></label>
                                        <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YY"
                                            size="7" minlength="7" maxlength="7" />
                                        </div>
                                        <div class="form-outline">
                                            <label class="form-label" for="typeText2">Cvv<span class="text-danger"> *</span></label>
                                        <input type="password" id="typeText2" class="form-control form-control-lg"
                                            placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                        </div>
                                        <button type="button" class="btn-block ">INVIA</button> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>



</template>


<style lang="scss" scoped>
@use '../assets/scss/general.scss' as *;
@use '../assets/scss/partials/variables.scss' as *;

body{
    color: #000;
    height: 100%;
}
.card{
    padding: 30px 40px;
    margin-top: 60px;
    margin-bottom: 60px;
    border: none ;
    box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2);
}
   

input, textarea, button{
    padding: 8px 15px;
    border-radius: 5px;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 18px ;
    font-weight: 300
}
.btn-block{
    text-transform: uppercase;
    font-size: 15px ;
    font-weight: 400;
    height: 43px;
    cursor: pointer;
    text-align: center;
}
.btn-block:hover{
    color: #fff;
}



</style>