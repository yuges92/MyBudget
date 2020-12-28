import AppLayout from "@/Layouts/AppLayout";
import {createApp} from 'vue';
import Highcharts from 'highcharts';
import VueHighcharts from 'vue-highcharts';


// console.log(route())
import customerRoutes from './router/customerRoutes'
require('./bootstrap');


const appElement = document.getElementById('app');

const app = createApp(AppLayout);
// .mixin({methods:{route}})
app.use(customerRoutes)
    .use(VueHighcharts, {Highcharts})
    .mount(appElement)
