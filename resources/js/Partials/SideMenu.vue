<template>
    <aside class="left-side-menu" :class="{'collapse':isCollapsed}" >
        <button class="hamburger-btn" :class="{'collapse':!isCollapsed}" @click="toggleSideMenu">
            <span class="hamburger"></span>
        </button>
        <header class="left-side-menu-header">
            <div class="profile-image-container">
                <img class="profile-image" alt="" src="https://avatars2.githubusercontent.com/u/23583265?s=400&v=4">
            </div>
            <h2 class="user-full-name">Full name</h2>
        </header>
        <section class="left-side-menu-body">
            <ul class="side-menu-container">
                <li class="side-menu-nav-list">
                    <inertia-link  :class="{'active':route().current('overview')}" :href="route('overview')"
                                  class="side-menu-nav-list-link "><i class="fas fa-home"></i> <span
                        class="side-menu-nav-list-link-name">Overview</span></inertia-link>
                </li>
                <li class="side-menu-nav-list">
                    <inertia-link  :class="{'active':route().current('incomes')}" :href="route('incomes')"
                                  class="side-menu-nav-list-link"><i class="fas fa-hand-holding-usd"></i> <span
                        class="side-menu-nav-list-link-name">Incomes</span></inertia-link>
                </li>
                <li class="side-menu-nav-list">
                    <inertia-link  :class="{'active':route().current('transactions')}" :href="route('transactions')"
                                  class="side-menu-nav-list-link"><i class="fas fa-chart-line"></i> <span
                        class="side-menu-nav-list-link-name">Transactions</span></inertia-link>
                </li>
                <li class="side-menu-nav-list">
                    <inertia-link  :class="{'active':route().current('debts')}" :href="route('debts')"
                                  class="side-menu-nav-list-link"><i class="fas fa-credit-card"></i> <span
                        class="side-menu-nav-list-link-name">Debts</span></inertia-link>
                </li>
                <li class="side-menu-nav-list">
                    <inertia-link  class="side-menu-nav-list-link" href=""><i class="fas fa-cogs"></i> <span
                        class="side-menu-nav-list-link-name">Settings</span></inertia-link>
                </li>

                <li class="side-menu-nav-list">
                    <a class="side-menu-nav-list-link" href="/logout"><i class="fas fa-sign-out-alt"></i> <span
                        class="side-menu-nav-list-link-name">Logout</span></a>
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
            isCollapsed: true,
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
