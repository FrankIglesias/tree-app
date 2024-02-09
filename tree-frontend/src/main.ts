import { createApp } from 'vue'
import './style.scss'
import App from './App.vue'

declare global {
  interface Window { __REGISTRATION_DATA__: any; }
}

const app = createApp(App, {data: window.__REGISTRATION_DATA__});
app.mount('#app');
