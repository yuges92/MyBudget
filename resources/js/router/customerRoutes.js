import {createRouter, createWebHistory} from "vue-router";
import Dashboard from "@/Pages/Dashboard";
import Transactions from "@/Pages/Transaction/Transactions";
import Incomes from "@/Pages/Incomes/Incomes";
import Debts from "@/Pages/Debts/Debts";
import Settings from "@/Pages/Settings/Settings";
import NotFound from "@/Pages/NotFound";
import IncomeCreate from "@/Pages/Incomes/IncomeCreate";
import EmptyLayout from "@/Layouts/EmptyLayout";
import IncomeEdit from "@/Pages/Incomes/IncomeEdit";
import TransactionCreate from "@/Pages/Transaction/TransactionCreate";
import TransactionEdit from "@/Pages/Transaction/TransactionEdit";
import DebtEdit from "@/Pages/Debts/DebtEdit";
import DebtCreate from "@/Pages/Debts/DebtCreate";
import Notifications from "@/Pages/Notifications";
import Categories from "@/Pages/Categories/Categories";
import CategoryEdit from "@/Pages/Categories/CategoryEdit";
import CategoryCreate from "@/Pages/Categories/CategoryCreate";
import Expenses from "@/Pages/Expenses/Expenses"
import ExpenseCreate from "@/Pages/Expenses/ExpenseCreate"
import ExpenseEdit from "@/Pages/Expenses/ExpenseEdit"

const routes = [
    {
        path: '/overview',
        name: "overview",
        component: Dashboard
    },
    {
        path: '/incomes',
        component:EmptyLayout,
        children: [
            {
                path: '',
                name: "incomes.index",
                component: Incomes,
            },
            {
                path: ':id',
                name: "incomes.edit",
                component: IncomeEdit,
            },

            {
                path: 'create',
                name: "incomes.create",
                component: IncomeCreate
            }
        ]

    },
    {
        path: '/transactions',
        component: EmptyLayout,
        children: [
            {
                path: '',
                name: "transactions.index",
                component: Transactions,
            },
            {
                path: ':id',
                name: "transactions.edit",
                component: TransactionEdit,
            },

            {
                path: 'create',
                name: "transactions.create",
                component: TransactionCreate
            }
        ]
    },
    {
        path: '/debts',
        component: EmptyLayout,
        children: [
            {
                path: '',
                name: "debts.index",
                component: Debts,
            },
            {
                path: ':id',
                name: "debts.edit",
                component: DebtEdit,
            },

            {
                path: 'create',
                name: "debts.create",
                component: DebtCreate
            }
        ]
    },
    {
        path: '/categories',
        component: EmptyLayout,
        children: [
            {
                path: '',
                name: "categories.index",
                component: Categories,
            },
            {
                path: ':id',
                name: "categories.edit",
                component: CategoryEdit,
            },

            {
                path: 'create',
                name: "categories.create",
                component: CategoryCreate
            }
        ]
    },
    {
        path: '/expenses',
        component: EmptyLayout,
        children: [
            {
                path: '',
                name: "expenses.index",
                component: Expenses,
            },
            {
                path: ':id',
                name: "expenses.edit",
                component: ExpenseEdit,
            },

            {
                path: 'create',
                name: "expenses.create",
                component: ExpenseCreate
            }
        ]
    },
    {
        path: '/settings',
        name: "settings",
        component: Settings
    },
    {
        path: '/notifications',
        name: "notifications",
        component: Notifications
    },
    {
        path: "/:catchAll(.*)",
        component: NotFound,
    },
];
const customerRoutes = createRouter({
    history: createWebHistory(),
    routes,
})
export default customerRoutes;
