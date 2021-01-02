import AppLayout from "@/Layouts/AppLayout";
import {createApp} from 'vue';
import Highcharts from 'highcharts';
import VueHighcharts from 'vue-highcharts';


console.log(route())
import customerRoutes from './router/customerRoutes'
import store from "@/store";
require('./bootstrap');


const appElement = document.getElementById('app');

const app = createApp(AppLayout);
// .mixin({methods:{route}})
app.use(customerRoutes)
    .use(VueHighcharts, {Highcharts})
    .use(store)
    .mount(appElement)
