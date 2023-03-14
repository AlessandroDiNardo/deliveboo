import { createApp } from 'vue';
import App from './App.vue';

// import bootstrap
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faCartShopping, faMagnifyingGlass, faUserSecret, } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faUserSecret, faMagnifyingGlass, faCartShopping);

createApp(App)
    .component('font-awesome-icon', FontAwesomeIcon)
    .mount('#app')

