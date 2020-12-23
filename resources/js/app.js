import AppLayout from "@/Layouts/AppLayout";

require('./bootstrap');

import {createApp} from 'vue';

console.log(route())
import customerRoutes from './router/customerRoutes'
const app = document.getElementById('app');

createApp(AppLayout)
    .mixin({methods:{route}})
    .use(customerRoutes)
    .mount(app)
