<template>
    <page-layout page-title="Transactions">
        <template #right-content>
            <div class="calendar">
                <h2>Calendar</h2>
            </div>
        </template>
        <template #page-body>
            <card card-title="All Incomes" class="chart-col-1">
                <template v-slot:card-header-content>
                    <!--                        <button class="btn" @click="toggleModal"></button>-->
                    <router-link class="btn" :to="{name:'transactions.create'}"><i class="fas fa-plus"></i> <span>Add Transaction</span></router-link>
                </template>
                <template v-slot:card-body-content>
                    <ul class="list">
                        <li v-for="index in 5" class="list-item">

                            <router-link class="btn" :to="{name:'transactions.edit', params:{id:index}}">
                                Transaction {{ index }}
                                <span class="date">01/01/2020</span>
                                <span>Type</span>
                                <span>From</span>
                                <span>Date</span>
                                <span>Amount</span>
                            </router-link>

                        </li>
                    </ul>
                </template>
            </card>

        </template>

    </page-layout>
</template>

<script>

import PageLayout from "@/Components/PageLayout";
import Card from "@/Components/Card";

export default {
    components: {
        Card,
        PageLayout
    },
}
</script>
