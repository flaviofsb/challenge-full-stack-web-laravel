import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
import Vuelidate from 'vuelidate'
import MaskedInput from 'vue-text-mask'
import axios from 'axios'
import VueAxios from 'vue-axios'


Vue.component('masked-input', MaskedInput);
Vue.use(Vuelidate, axios, VueAxios)
Vue.config.productionTip = false;

new Vue({
  router,
  store,
  vuetify,  
  render: h => h(App)
}).$mount('#app')
