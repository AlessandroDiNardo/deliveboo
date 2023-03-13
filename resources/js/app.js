import './bootstrap';
import '/resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const submit = document.getElementById("submit");

submit.addEventListener("click", validate);

function validate(e) {
  e.preventDefault();

  const firstNameField = document.getElementById("name");
  const descriptionField = document.getElementById("input_description");
  const placeField = document.getElementById("input_place");
  const phoneField = document.getElementById("input_phone");
  const vatField = document.getElementById("input_vat");
  const shippingField =document.getElementById("input_shippingError");
  const openingField = document.getElementById("input_opening");
  const closingField = document.getElementById("input_closing");
  const dayOffField = document.getElementById("day_off");
  const imgField = document.getElementById("input_img");

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
  if (!shippingField.value) {
    const inputShippingError = document.getElementById("input_shippingError");
    inputShippingError.classList.add("visible");
    firstNameField.classList.add("invalid");
    nameError.setAttribute("aria-hidden", false);
    nameError.setAttribute("aria-invalid", true);
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
  return valid;

  if (!dayOffField.value) {
    const inputClosingError = document.getElementById("input_dayOffError");
    inputDayOffError.classList.add("visible");
    dayOffField.classList.add("invalid");
   inputDayOffError.setAttribute("aria-hidden", false);
   inputDayOffError.setAttribute("aria-invalid", true);
  }
  return valid;

  if (!imgField.value) {
    const inputClosingError = document.getElementById("input_imgError");
    inpuImgError.classList.add("visible");
    imgField.classList.add("invalid");
    inpuImgError.setAttribute("aria-hidden", false);
    inpuImgError.setAttribute("aria-invalid", true);
  }
  return valid;

 
}


