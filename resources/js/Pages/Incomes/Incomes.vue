<template>
    <div class="dashboard">

        <header class="page-header">
            <h1 class="page-title">Incomes</h1>
            <div class="calendar">
                <h2>Calendar</h2>
                <button><i class="fas fa-plus"></i></button>
            </div>
        </header>
        <div class="page-body">
            <div>

                <chart-card card-title="All Incomes" class="chart-col-1">
                    <template v-slot:chart-card-body-content>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>From</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="index in 10">
                                <td>{{ index }}</td>
                                <td>Type {{ index }}</td>
                                <td>From {{ index }}</td>
                                <td>Date {{ index }}</td>
                                <td>£{{ index }}00.00</td>
                                <td class="text-center">
                                    <button class="btn "><i class="fas fa-edit"></i></button>
                                    <button class="btn "><i class="fas fa-minus-circle"></i></button>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </template>
                </chart-card>
            </div>

        </div>
    </div>

</template>

<script>

import ChartCard from "@/Partials/ChartCard";

export default {
    components: {ChartCard},
}
</script>

<style></style>
