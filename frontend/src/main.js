import { createApp } from 'vue'
import App from './App.vue'
import { BootstrapVue3, IconsPlugin } from 'bootstrap-vue-3'

// Import Bootstrap and BootstrapVue3 CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue-3/dist/bootstrap-vue-3.css'

// Create the Vue app
const app = createApp(App)

// Make BootstrapVue available throughout your project
app.use(BootstrapVue3)
// Optionally install the BootstrapVue icon components plugin
app.use(IconsPlugin)

// Mount the app
app.mount('#app')