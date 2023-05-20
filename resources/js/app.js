import './bootstrap';
import 'flowbite';
import { createApp } from 'vue';

const app = createApp({});

import dashboard from './components/dashboard.vue';
app.component('dashboard', dashboard);

app.mount('#app');
