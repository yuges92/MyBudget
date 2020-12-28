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
                <small-card amount="£19.00" card-title="Balance" class="">
                    <template v-slot:icon>
                        <i class="fas fa-balance-scale-right" style="background: #542c2c"></i>
                    </template>
                </small-card>

                <small-card amount="£0.00" card-title="Total Savings" class="">
                    <template v-slot:icon>
                        <i class="fas fa-piggy-bank" style="background: green"></i>
                    </template>
                </small-card>

                <small-card amount="£19.00" card-title="Total Transactions" class="">
                    <template v-slot:icon>
                        <i class="fas fa-chart-line" style="background: #b33200"></i>
                    </template>
                </small-card>

                <small-card amount="£19.00" card-title="Total Debts" class="">
                    <template v-slot:icon>
                        <i class="fas fa-credit-card" style="background: red"></i>
                    </template>
                </small-card>

            </div>

            <div class="group-charts">

                <card card-title="Trajectory Overview" class="chart-col-3">
                    <template v-slot:card-body-content>
                        <Highcharts ref="highchartsRef" :options="options"/>
                    </template>
                </card>

                <card card-title="Latest Transactions" class="chart-col-1">
                    <template v-slot:card-body-content>
                        <ul class="list">
                            <li v-for="index in 5" class="list-item">
                                Transaction {{ index }} <span class="date">01/01/2020</span>
                                <span>pending</span>
                            </li>
                        </ul>

                        <button class="">View All</button>
                    </template>
                </card>
            </div>

            <div>
                <card card-title="Monthly Outgoings" class="chart-col-1">
                    <template v-slot:card-body-content>
                        <ul class="list">
                            <li v-for="index in 10" class="list-item">
                                Monthly Outgoings {{ index }} <span class="date">01/01/2020</span>
                                <span>pending</span>
                            </li>
                        </ul>

                        <button class="">View All</button>
                    </template>
                </card>
            </div>

            <div>
                <h2></h2>
            </div>
            <div>
                <card card-title="Upcoming Payments" class="chart-col-1">
                    <template v-slot:card-body-content>
                        <ul class="list">
                            <li v-for="index in 10" class="list-item">
                                Upcoming Payments {{ index }} <span class="date">01/01/2020</span>
                                <span>pending</span>
                            </li>
                        </ul>

                        <button class="">View All</button>
                    </template>
                </card>
            </div>

            <div>
                <card card-title="Debts" class="chart-col-1">
                    <template v-slot:card-body-content>
                        <ul class="list">
                            <li v-for="index in 3" class="list-item">
                                Debts {{ index }}
                                <span>£1{{index}}00</span>
                            </li>
                        </ul>

                        <button class="">View All</button>
                    </template>
                </card>
            </div>

        </div>
    </div>

</template>

<script>
import SmallCard from "@/Partials/SmallCard";
import {ref} from "vue";
import Card from "@/Partials/Card";

export default {
    components: {Card, SmallCard},
    setup() {
        const options = {
            chart: {
                type: 'line'
            },
            credits: {
                enabled: false
            },
            title: {
                text: '',
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ]
            },
            yAxis: {
                title: {
                    text: '£'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valuePrefix: '£',
            },
            legend: {
                layout: 'vertical',
                align: 'center',
                verticalAlign: 'bottom',
                borderWidth: 0,

            },
            series: [{
                name: 'Income',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            }, {
                name: 'Expense',
                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
            }, {
                name: 'Savings',
                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
            }, {
                name: 'Balance',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        };
        const highchartsRef = ref(null);
        return {highchartsRef, options};
    },
    computed: {},
    mounted() {
        console.log(this.highchartsRef)
    },
}
</script>
