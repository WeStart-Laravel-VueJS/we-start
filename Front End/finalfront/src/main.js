import './assets/main.css'

import '@fortawesome/fontawesome-free/css/all.min.css'

import axios from 'axios'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'


window.axios = axios

window.axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1'

import App from './App.vue'
import router from './router'

const app = createApp(App)

const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)

app.use(pinia)
app.use(router)

app.mount('#app')
