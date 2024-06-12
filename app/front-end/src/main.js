import './assets/main.css'
import 'primeicons/primeicons.css'


import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import 'primevue/resources/themes/aura-light-green/theme.css'
import PrimeVue from 'primevue/config'
import Button from 'primevue/button'
import Sidebar from 'primevue/sidebar';
import Toolbar from 'primevue/toolbar';
import Card from 'primevue/card';
import DataView from 'primevue/dataview';
import DataViewLayoutOptions from 'primevue/dataviewlayoutoptions'
import InputText from 'primevue/inputtext';
import Password from 'primevue/password';
import Dialog from 'primevue/dialog';
import FileUpload from 'primevue/fileupload';
import Checkbox from 'primevue/checkbox';
import Calendar from 'primevue/calendar';
import InputSwitch from 'primevue/inputswitch';



const app = createApp(App)
app.component('Button', Button)
.component('SideBar', Sidebar)
.component('ToolBar', Toolbar)
.component('Card', Card)
.component('DataView', DataView)
.component('DataViewLayoutOptions', DataViewLayoutOptions)
.component('InputText', InputText)
.component('Password', Password)
.component('Dialog', Dialog)
.component('FileUpload', FileUpload)
.component('Checkbox', Checkbox)
.component('Calendar', Calendar)
.component('InputSwitch', InputSwitch);


app.use(router)
.use(PrimeVue)
.mount('#app')


