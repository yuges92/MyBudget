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
                {title: "Incomes", to: "incomes", icon: "fas fa-hand-holding-usd"},
                {title: "Transactions", to: "transactions", icon: "fas fa-chart-line"},
                {title: "Debts", to: "debts", icon: "fas fa-chart-line"},
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
        console.log('created!');
        console.log('isCollapsed!', this.isCollapsed);
    }
}
</script>

<style scoped>

</style>
