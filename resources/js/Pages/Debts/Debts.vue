<template>
    <page-layout page-title="Debts">
        <template #right-content>
            <div class="calendar">
                <h2>Calendar</h2>
            </div>
        </template>
        <template #page-body>
            <card card-title="All Debts" >
                <template v-slot:card-header-content>
                    <!--                        <button class="btn" @click="toggleModal"></button>-->
                    <router-link class="btn" :to="{name:'debts.create'}"><i class="fas fa-plus"></i> <span>Add Debt</span></router-link>
                </template>
                <template v-slot:card-body-content>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>From</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th class="w-12">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="debt in 10" v-if="1"  class="text-center">
                            <td><i class="fas fa-sitemap"></i></td>
                            <td class="text-left">{{ debt }}</td>
                            <td >{{ debt }}</td>
                            <td>{{ debt }}</td>
                            <td class="flex  justify-end">
                                <router-link :to="{name:'debts.edit', params:{id:1}}" class="btn btn-edit">
                                    Edit
                                </router-link>

                                <button class="btn btn-delete" @click="">Delete</button>
                            </td>
                        </tr>
                        <tr v-else>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                </template>
            </card>

        </template>

    </page-layout>

</template>

<script>
import PageLayout from "@/Components/PageLayout";
import Card from "@/Components/Card";
export default {
    components: {Card, PageLayout},
}
</script>
