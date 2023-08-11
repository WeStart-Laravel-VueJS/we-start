import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js'

import router from './router';

import App from './components/App.vue'

const app = createApp(App)

app.use(router)

app.mount('#app')

//
