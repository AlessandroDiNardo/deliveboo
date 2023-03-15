import './bootstrap';
import '/resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const submit = document.getElementById("submit");

submit.addEventListener("click", validate);

function validate(e) {
  // e.preventDefault();

  const firstNameField = document.getElementById("name");
  const descriptionField = document.getElementById("input_description");
  const placeField = document.getElementById("input_place");
  const phoneField = document.getElementById("input_phone");
  const vatField = document.getElementById("input_vat");
  const shippingField = document.querySelector('.shipping_field');
  const shippingError = document.querySelector('#input_shippingError');
  const openingField = document.getElementById("input_opening");
  const closingField = document.getElementById("input_closing");
  const dayOffField = document.getElementById("day_off");
  const imgField = document.getElementById("input_img");
  const categoryField = document.querySelectorAll(".category");
 
  let valid = true;

   if (!firstNameField.value) {
     const nameError = document.getElementById("nameError");
     nameError.classList.add("visible");
     firstNameField.classList.add("invalid");
     nameError.setAttribute("aria-hidden", false);
     nameError.setAttribute("aria-invalid", true);
     
   }
  if (!descriptionField.value) {
    const inputDescriptionError = document.getElementById("inputDescriptionError");
    inputDescriptionError.classList.add("visible");
    descriptionField.classList.add("invalid");
    inputDescriptionError.setAttribute("aria-hidden", false);
    inputDescriptionError.setAttribute("aria-invalid", true);
  }
  
  if (!phoneField.value) {
    const inputPhoneError = document.getElementById("input_phoneError");
    inputPhoneError.classList.add("visible");
    phoneField.classList.add("invalid");
    inputPhoneError.setAttribute("aria-hidden", false);
    inputPhoneError.setAttribute("aria-invalid", true);
  }

  if (!placeField.value) {
    const inputPlaceError = document.getElementById("input_placeError");
    inputPlaceError.classList.add("visible");
    placeField.classList.add("invalid");
    inputPlaceError.setAttribute("aria-hidden", false);
    inputPlaceError.setAttribute("aria-invalid", true);
  }

  
  if (!vatField.value) {
    const inputVatError = document.getElementById("input_vatError");
    inputVatError.classList.add("visible");
    vatField.classList.add("invalid");
    inputVatError.setAttribute("aria-hidden", false);
    inputVatError.setAttribute("aria-invalid", true);
  }
  
 
  if (shippingField.value.trim() === '' || isNaN(shippingField.value)) {
    
    shippingError.classList.add("visible");
    shippingField.classList.add("invalid");
    shippingError.setAttribute("aria-hidden", false);
    shippingError.setAttribute("aria-invalid", true);
   
  } else {
    shippingError.classList.remove("visible");
    shippingField.classList.remove("invalid");
    shippingError.setAttribute("aria-hidden", true);
    shippingError.setAttribute("aria-invalid", false);
  }
  if (!placeField.value) {
    const inputDescriptionError = document.getElementById("inputDescriptionError");
    inputDescriptionError.classList.add("visible");
    shippingField.classList.add("invalid");
     inputDescriptionError.setAttribute("aria-hidden", false);
     inputDescriptionError.setAttribute("aria-invalid", true);
  }
  if (!openingField.value) {
    const inputOpeningError = document.getElementById("input_openError");
    inputOpeningError.classList.add("visible");
    openingField.classList.add("invalid");
    inputOpeningError.setAttribute("aria-hidden", false);
    inputOpeningError.setAttribute("aria-invalid", true);
  }
  if (!closingField.value) {
    const inputClosingError = document.getElementById("input_closingError");
    inputClosingError.classList.add("visible");
    closingField.classList.add("invalid");
    inputClosingError.setAttribute("aria-hidden", false);
    inputClosingError.setAttribute("aria-invalid", true);
  }
  
  
 if (!dayOffField.value) {
   const inputDayOffError = document.getElementById("input_dayOffError");
   inputDayOffError.classList.add("visible");
   dayOffField.classList.add("invalid");
  inputDayOffError.setAttribute("aria-hidden", false);
  inputDayOffError.setAttribute("aria-invalid", true);
 }
  

  if (!imgField.value) {
    const inputImgError = document.getElementById("input_imgError");
    inputImgError.classList.add("visible");
    imgField.classList.add("invalid");
    inputImgError.setAttribute("aria-hidden", false);
    inputImgError.setAttribute("aria-invalid", true);
  }
  let isChecked = false;
    categoryField.forEach((category) => {
      if (category.checked) {
       isChecked = true;
      
      }
    }
     );
  
    if (!isChecked) {
      const inputCategoryError = document.querySelector('#input_categoryError');
      inputCategoryError.classList.add("visible");
      inputCategoryError.setAttribute("aria-hidden", false);
      inputCategoryError.setAttribute("aria-invalid", true);
     } else {
      const inputCategoryError = document.querySelector('#input_categoryError');
      inputCategoryError.classList.remove("visible");
      inputCategoryError.setAttribute("aria-hidden", true);
      inputCategoryError.setAttribute("aria-invalid", false);
     }
  return valid;

 
}

// const form = document.querySelector('.form');
// const nameField = document.querySelector('#name');
// const descriptionField = document.querySelector('#input_description');
// const placeField = document.querySelector('#input_place');
// const phoneField = document.querySelector('#input_phone');
// const vatField = document.querySelector('#input_vat');
// const shippingField = document.querySelector('#input_shipping');
// const openingField = document.querySelector('#input_opening');
// const closingField = document.querySelector('#input_closing');
// const dayOffField = document.querySelector('#day_off');
// const imgField = document.querySelector('#input_img');
// const categoryField = document.querySelectorAll('.category');

// form.addEventListener('submit', (event) => {
//   // Stop form submission
 
  
//   // Validate name field
//   if (nameField.value.trim() === '') {
//     document.querySelector('#nameError').setAttribute('aria-hidden', false);
    
//   } else {
//     document.querySelector('#nameError').setAttribute('aria-hidden', true);
//   }

//   // Validate description field
//   if (descriptionField.value.trim() === '') {
//     document.querySelector('#inputDescriptionError').setAttribute('aria-hidden', false);
//   } else {
//     document.querySelector('#inputDescriptionError').setAttribute('aria-hidden', true);
//   }

//   // Validate place field
//   if (placeField.value.trim() === '') {
//     document.querySelector('#input_placeError').setAttribute('aria-hidden', false);
//   } else {
//     document.querySelector('#input_placeError').setAttribute('aria-hidden', true);
//   }

//   // Validate phone field
//   if (phoneField.value.trim() === '') {
//     document.querySelector('#input_phoneError').setAttribute('aria-hidden', false);
//   } else {
//     document.querySelector('#input_phoneError').setAttribute('aria-hidden', true);
//   }

//   // Validate VAT field
//   if (vatField.value.trim() === '') {
//     document.querySelector('#input_vatError').setAttribute('aria-hidden', false);
//   } else {
//     document.querySelector('#input_vatError').setAttribute('aria-hidden', true);
//   }

//   // Validate shipping field
//   if (shippingField.value.trim() === '') {
//     document.querySelector('#input_shippingError').setAttribute('aria-hidden', false);
//   } else {
//     document.querySelector('#input_shippingError').setAttribute('aria-hidden', true);
//   }

//   // Validate opening field
//   if (openingField.value.trim() === '') {
//     document.querySelector('#input_openError').setAttribute('aria-hidden', false);
//   } else {
//     document.querySelector('#input_openError').setAttribute('aria-hidden', true);
//   }

//   // Validate closing field
//   if (closingField.value.trim() === '') {
//     document.querySelector('#input_closingError').setAttribute('aria-hidden', false);
//   } else {
//     document.querySelector('#input_closingError').setAttribute('aria-hidden', true);
//   }

//   // Validate day off field
//   if (dayOffField.value.trim() === '') {
//     document.querySelector('#input_dayOffError').setAttribute('aria-hidden', false);
//   } else {
//     document.querySelector('#input_dayOffError').setAttribute('aria-hidden', true);
//   }

//   // Validate image field
//   if (imgField.value.trim() === '') {
//     document.querySelector('#input_imgError').setAttribute('aria-hidden', false);
//   } else {
//     document.querySelector('#input_imgError').setAttribute('aria-hidden', true);
//   }

//   // Validate category field
//   let isChecked = false;
//   categoryField.forEach((category) => {
//     if (category.checked) {
//       isChecked = true;
//       alert("selezionato")
//     }
//   }
//   );

//   if (!isChecked) {
//     document.querySelector('#input_categoryError').setAttribute('aria-hidden', false);
//     alert("non selezionato")
//   } else {
//     document.querySelector('#input_categoryError').setAttribute('aria-hidden', true);
//   }})



