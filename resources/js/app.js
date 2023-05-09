import './bootstrap';
import '/resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
  '../img/**'
])

const submit = document.querySelector(".submit_form");

submit.addEventListener("click", validate);

function validate(e) {
  // e.preventDefault();

  //Variabili input create

  const firstNameField = document.querySelector(".name_create");
  const description = document.querySelector(".input_description")
  const placeField = document.querySelector(".input_place");
  const phoneField = document.querySelector(".input_phone");
  const vatField = document.querySelector(".input_vat");
  const shippingField = document.querySelector('.shipping_field');
  const shippingError = document.querySelector('.input_shippingError');
  const openingField = document.querySelector(".input_opening");
  const closingField = document.querySelector(".input_closing");
  const dayOffField = document.querySelector(".day_off");
  const imgField = document.querySelector(".input_img");
  const categoryField = document.querySelectorAll(".category");



  let valid = true;

  if (firstNameField.value.trim() === "") {
    const nameError = document.querySelector(".nameError");
    nameError.classList.add("visible");
    firstNameField.classList.add("invalid");
    nameError.setAttribute("aria-hidden", false);
    nameError.setAttribute("aria-invalid", true);

  }
  else {
    const nameError = document.querySelector(".nameError");
    nameError.classList.remove("visible");
    firstNameField.classList.remove("invalid");
    nameError.setAttribute("aria-hidden", false);
    nameError.setAttribute("aria-invalid", true);

  }




  if (description.value.trim() === "") {
    const inputDescriptionError = document.querySelector(".inputDescriptionError");
    inputDescriptionError.classList.add("visible");
    description.classList.add("invalid");
    inputDescriptionError.setAttribute("aria-hidden", false);
    inputDescriptionError.setAttribute("aria-invalid", true);

  }
  else {
    const inputDescriptionError = document.querySelector(".inputDescriptionError");
    inputDescriptionError.classList.remove("visible");
    description.classList.remove("invalid");
    inputDescriptionError.setAttribute("aria-hidden", true);
    inputDescriptionError.setAttribute("aria-invalid", false);
  }


  if (phoneField.value.trim() === "") {
    const inputPhoneError = document.querySelector(".input_phoneError");
    inputPhoneError.classList.add("visible");
    phoneField.classList.add("invalid");
    inputPhoneError.setAttribute("aria-hidden", false);
    inputPhoneError.setAttribute("aria-invalid", true);
  }
  else {
    const inputPhoneError = document.querySelector(".input_phoneError");
    inputPhoneError.classList.remove("visible");
    phoneField.classList.remove("invalid");
    inputPhoneError.setAttribute("aria-hidden", true);
    inputPhoneError.setAttribute("aria-invalid", false);
  }

  if (placeField.value.trim() === "") {
    const inputPlaceError = document.querySelector(".input_placeError");
    inputPlaceError.classList.add("visible");
    placeField.classList.add("invalid");
    inputPlaceError.setAttribute("aria-hidden", false);
    inputPlaceError.setAttribute("aria-invalid", true);
  }
  else {
    const inputPlaceError = document.querySelector(".input_placeError");
    inputPlaceError.classList.remove("visible");
    placeField.classList.remove("invalid");
    inputPlaceError.setAttribute("aria-hidden", true);
    inputPlaceError.setAttribute("aria-invalid", false);
  }


  if (vatField.value.trim() === "") {
    const inputVatError = document.querySelector(".input_vatError");
    inputVatError.classList.add("visible");
    vatField.classList.add("invalid");
    inputVatError.setAttribute("aria-hidden", false);
    inputVatError.setAttribute("aria-invalid", true);
  }
  else {
    const inputVatError = document.querySelector(".input_vatError");
    inputVatError.classList.remove("visible");
    vatField.classList.remove("invalid");
    inputVatError.setAttribute("aria-hidden", true);
    inputVatError.setAttribute("aria-invalid", false);
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

  if (openingField.value.trim() === "") {
    const inputOpeningError = document.querySelector(".input_openError");
    inputOpeningError.classList.add("visible");
    openingField.classList.add("invalid");
    inputOpeningError.setAttribute("aria-hidden", false);
    inputOpeningError.setAttribute("aria-invalid", true);
  }
  else {
    const inputOpeningError = document.querySelector(".input_openError");
    inputOpeningError.classList.remove("visible");
    openingField.classList.remove("invalid");
    inputOpeningError.setAttribute("aria-hidden", true);
    inputOpeningError.setAttribute("aria-invalid", false);
  }
  if (closingField.value.trim() === "") {
    const inputClosingError = document.querySelector(".input_closingError");
    inputClosingError.classList.add("visible");
    closingField.classList.add("invalid");
    inputClosingError.setAttribute("aria-hidden", false);
    inputClosingError.setAttribute("aria-invalid", true);
  }
  else {
    const inputClosingError = document.querySelector(".input_closingError");
    inputClosingError.classList.remove("visible");
    closingField.classList.remove("invalid");
    inputClosingError.setAttribute("aria-hidden", true);
    inputClosingError.setAttribute("aria-invalid", false);
  }


  if (dayOffField.value === "") {
    const inputDayOffError = document.querySelector(".input_dayOffError");
    inputDayOffError.classList.add("visible");
    dayOffField.classList.add("invalid");
    inputDayOffError.setAttribute("aria-hidden", false);
    inputDayOffError.setAttribute("aria-invalid", true);
  }
  else {
    const inputDayOffError = document.querySelector(".input_dayOffError");
    inputDayOffError.classList.remove("visible");
    dayOffField.classList.remove("invalid");
    inputDayOffError.setAttribute("aria-hidden", true);
    inputDayOffError.setAttribute("aria-invalid", false);
  }


  if (!imgField.value) {
    const inputImgError = document.querySelector(".input_imgError");
    inputImgError.classList.add("visible");
    imgField.classList.add("invalid");
    inputImgError.setAttribute("aria-hidden", false);
    inputImgError.setAttribute("aria-invalid", true);
  }
  else {
    const inputImgError = document.querySelector(".input_imgError");
    inputImgError.classList.remove("visible");
    imgField.classList.remove("invalid");
    inputImgError.setAttribute("aria-hidden", true);
    inputImgError.setAttribute("aria-invalid", false);
  }

  let isChecked = false;
  categoryField.forEach((category) => {
    if (category.checked) {
      isChecked = true;

    }
  }
  );

  if (!isChecked) {
    const inputCategoryError = document.querySelector('.input_categoryError');
    inputCategoryError.classList.add("visible");
    inputCategoryError.setAttribute("aria-hidden", false);

    inputCategoryError.setAttribute("aria-invalid", true);

  } else {
    const inputCategoryError = document.querySelector('.input_categoryError');
    inputCategoryError.classList.remove("visible");

    inputCategoryError.setAttribute("aria-hidden", true);
    inputCategoryError.setAttribute("aria-invalid", false);
  }

  if (!isChecked) {
    const inputCategoryError = document.querySelector('.input_categoryError');
    inputCategoryError.classList.add("visible");
    inputCategoryError.setAttribute("aria-hidden", false);

    inputCategoryError.setAttribute("aria-invalid", true);

  } else {
    const inputCategoryError = document.querySelector('.input_categoryError');
    inputCategoryError.classList.remove("visible");

    inputCategoryError.setAttribute("aria-hidden", true);
    inputCategoryError.setAttribute("aria-invalid", false);
  }









  return valid;


}






