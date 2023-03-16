import './bootstrap';
import '/resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const submit = document.querySelector(".submit");

submit.addEventListener("click",convalidate);

function convalidate(){
    const name = document.querySelector('.nameProduct');
    const ingredients = document.querySelector('.ingredients');
    const ingredentsError=document.querySelector('.ingredentsError')
    const price = document.querySelector('.price');
    const priceError = document.querySelector('.priceError')
    const imgProduct = document.querySelector('.imgProduct');
     const imgError = document.querySelector('.imgError');
     const disponibility = document.querySelector('.disponibility');
     const disponibilityError = document.querySelector('.disponibilityError');
     



    let valid = true;

    if (name.value.trim() ==="") {
        const nameProductError = document.querySelector(".nameProductError");
        nameProductError.classList.add("visible");
        name.classList.add("invalid");
        nameProductError.setAttribute("aria-hidden", false);
        nameProductError.setAttribute("aria-invalid", true);
       
      }
      else {
        const nameProductError = document.querySelector(".nameProductError");
        nameProductError.classList.remove("visible");
       name.classList.remove("invalid");
        nameProductError.setAttribute("aria-hidden", false);
        nameProductError.setAttribute("aria-invalid", true);
       
      }

      if (ingredients.value.trim() ==="") {
        
        ingredentsError.classList.add("visible");
        name.classList.add("invalid");
        ingredentsError.setAttribute("aria-hidden", false);
        ingredentsError.setAttribute("aria-invalid", true);
       
      }
      else {
      
        ingredentsError.classList.remove("visible");
       ingredients.classList.remove("invalid");
        ingredentsError.setAttribute("aria-hidden", false);
        ingredentsError.setAttribute("aria-invalid", true);
       
      }

      if (price.value.trim() ==="") {
        
       priceError.classList.add("visible");
       price.classList.add("invalid");
       priceError.setAttribute("aria-hidden", false);
       priceError.setAttribute("aria-invalid", true);
       
      }
      else {
      
        priceError.classList.remove("visible");
       price.classList.remove("invalid");
        priceError.setAttribute("aria-hidden", false);
        priceError.setAttribute("aria-invalid", true);
       
      }
      if (imgProduct.value.trim() ==="") {
        
        imgError.classList.add("visible");
       imgProduct.classList.add("invalid");
        imgError.setAttribute("aria-hidden", false);
        imgError.setAttribute("aria-invalid", true);
        
       }
       else {
       
         imgError.classList.remove("visible");
         imgProduct.classList.remove("invalid");
         imgError.setAttribute("aria-hidden", false);
         imgError.setAttribute("aria-invalid", true);
        
       }

       if (disponibility.value ==="") {
        
       disponibilityError.classList.add("visible");
        disponibility.classList.add("invalid");
      disponibilityError.setAttribute("aria-hidden", false);
      disponibilityError.setAttribute("aria-invalid", true);
      }
      else{
       
       disponibilityError.classList.remove("visible");
        disponibility.classList.remove("invalid");
      disponibilityError.setAttribute("aria-hidden", true);
      disponibilityError.setAttribute("aria-invalid", false);
      }
}