<template>
    <div class="dashboard">

        <header class="page-header">
            <h1 class="page-title">My Dashboard</h1>
            <div class="filter-btns">
                <button class="btn btn-week active">Week</button>
                <button class="btn btn-month">Month</button>
                <button class="btn btn-year">Year</button>
            </div>
        </header>
        <div class="page-body">
            <div class="top-row">
                <small-card card-title="Balance" amount="£19.00">
                    <template v-slot:icon>
                        <i style="background: #542c2c" class="fas fa-balance-scale-right"></i>
                    </template>
                </small-card>

                <small-card card-title="Total Savings" amount="£0.00">
                    <template v-slot:icon>
                        <i style="background: green"  class="fas fa-piggy-bank"></i>
                    </template>
                </small-card>

                <small-card card-title="Total Transactions" amount="£19.00">
                    <template v-slot:icon>
                        <i style="background: #b33200" class="fas fa-chart-line"></i>
                    </template>
                </small-card>

                <small-card card-title="Total Debts" amount="£19.00">
                    <template v-slot:icon>
                        <i style="background: red"  class="fas fa-credit-card"></i>
                    </template>
                </small-card>




            </div>

            <div>
                <h2>Latest Transactions</h2>
            </div>

            <div>
                <h2>Monthly Outgoings</h2>
            </div>

            <div>
                <h2>Upcoming Payments</h2>
            </div>

            <div>
                <h2>Credit Cards</h2>
            </div>
        </div>
    </div>

</template>

<script>
import SmallCard from "@/Partials/SmallCard";

export default {
    components: {SmallCard},
}
</script>
