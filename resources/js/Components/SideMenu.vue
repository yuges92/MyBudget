<template>
    <aside :class="{'collapse':isCollapsed}" class="left-side-menu">
        <button :class="{'collapse':!isCollapsed}" class="hamburger-btn" @click="toggleSideMenu">
            <span class="hamburger"></span>
        </button>
        <header class="left-side-menu-header">
            <div class="profile-image-container">
                <img alt="" class="profile-image" src="https://avatars2.githubusercontent.com/u/23583265?s=400&v=4">
            </div>
            <h2 class="user-full-name">Full name</h2>
        </header>
        <section class="left-side-menu-body">
            <ul class="side-menu-container">
                <li v-for="currentRoute in routes" class="side-menu-nav-list">
                    <router-link :to="{name:currentRoute.to}" class="side-menu-nav-list-link ">
                        <i :class="currentRoute.icon"></i>
                        <span class="side-menu-nav-list-link-name">{{ currentRoute.title }}</span>
                    </router-link>
                </li>

                <li class="side-menu-nav-list logout-btn-container">
                    <a class="side-menu-nav-list-link" href="/logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="side-menu-nav-list-link-name">Logout</span>
                    </a>
                </li>
            </ul>
        </section>
    </aside>
</template>

<script>
export default {
    name: "SideMenu",
    remember: ['isCollapsed'],

    data() {
        return {
            isCollapsed: false,
            routes: [
                {title: "Overview", to: "overview", icon: "fas fa-home"},
                {title: "Transactions", to: "transactions.index", icon: "fas fa-chart-line"},
                // {title: "Incomes", to: "incomes.index", icon: "fas fa-hand-holding-usd"},
                // {title: "Expenses", to: "expenses.index", icon: "fas fa-file-invoice-dollar"},
                // {title: "Debts/Loans", to: "debts.index", icon: "fas fa-credit-card"},
                {title: "Categories", to: "categories.index", icon: "fas fa-sitemap"},
                {title: "Notifications", to: "notifications", icon: "fas fa-bell"},
                {title: "Settings", to: "settings", icon: "fas fa-cogs"},
            ],
        }
    },
    methods: {
        toggleSideMenu() {
            this.isCollapsed = !this.isCollapsed
        }
    },
    created() {
    }
}
</script>

<style scoped>

</style>
