import './navbar'
import './bootstrap'
import 'flowbite'
import { createApp } from 'vue'

const app = createApp({})

import dashboard from './components/dashboard.vue'
app.component('Dashboard', dashboard)

app.mount('#app')
