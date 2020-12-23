import {createRouter, createWebHistory} from "vue-router";
import Dashboard from "@/Pages/Dashboard";
import Transactions from "@/Pages/Transaction/Transactions";
import Incomes from "@/Pages/Incomes/Incomes";
import Debts from "@/Pages/Debts/Debts";
import Settings from "@/Pages/Settings/Settings";

const routes = [
    {
        path: '/overview',
        name: "overview",
        component: Dashboard
    },
    {
        path: '/incomes',
        name: "incomes",
        component: Incomes
    },

    {
        path: '/transactions',
        name: "transactions",
        component: Transactions
    },
    {
        path: '/debts',
        name: "debts",
        component: Debts
    },
    {
        path: '/settings',
        name: "settings",
        component: Settings
    },
];
const customerRoutes = createRouter({
    history: createWebHistory(),
    routes,
})
export default customerRoutes;
