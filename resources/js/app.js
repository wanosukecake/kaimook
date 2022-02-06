require('./bootstrap');
import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'

createApp({
    components:{
        ExampleComponent
    }
}).mount('#app')
