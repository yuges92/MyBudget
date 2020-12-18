<template>
    <nav class="sm-nav">
        <ul class="sm-nav-container">
            <li class="sm-nav-list">
                <inertia-link class="sm-nav-list-link " :class="{'active':route().current('dashboard')}"  :href="route('dashboard')"><i class="fas fa-home"></i> <span class="sm-nav-list-link-name">Dashboard</span></inertia-link>
            </li>
            <li>
                <inertia-link class="sm-nav-list-link" :class="{'active':route().current('incomes')}" :href="route('incomes')"><i class="fas fa-hand-holding-usd"></i> <span class="sm-nav-list-link-name">Incomes</span></inertia-link>
            </li>
            <li>
                <inertia-link class="sm-nav-list-link" :class="{'active':route().current('transactions')}" :href="route('transactions')"><i class="fas fa-chart-line"></i> <span class="sm-nav-list-link-name">Transactions</span></inertia-link>
            </li>
            <li>
                <inertia-link class="sm-nav-list-link" :class="{'active':route().current('debts')}" :href="route('debts')"><i class="fas fa-credit-card"></i> <span class="sm-nav-list-link-name">Debts</span></inertia-link>
            </li>
            <li>
                <inertia-link class="sm-nav-list-link"  href=""><i class="fas fa-ellipsis-h"></i> <span class="sm-nav-list-link-name">More</span></inertia-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "BottomNavBar"
}

</script>

<style lang="scss" scoped>


</style>
