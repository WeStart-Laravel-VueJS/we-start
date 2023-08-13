import './assets/main.css'

import '@fortawesome/fontawesome-free/css/all.min.css'

import axios from 'axios'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

window.axios = axios

window.axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
