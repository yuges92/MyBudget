<template>
    <page-layout page-title="Debts">
        <template #right-content>
            <div class="calendar">
                <h2>Calendar</h2>
            </div>
        </template>
        <template #page-body>
            <card card-title="All Debts">
                <template v-slot:card-header-content>
                    <!--                        <button class="btn" @click="toggleModal"></button>-->
                    <router-link :to="{name:'debts.create'}" class="btn"><i class="fas fa-plus"></i> <span>Add Debt</span></router-link>
                </template>
                <template v-slot:card-body-content>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th class="w-12">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="debt in state.debts" v-if="state.debts" class="text-center">
                            <td><img :src="debt.icon" alt="" class="w-12 mx-auto"></td>
                            <td >{{ debt.name }}</td>
                            <td >£{{ debt.amount }}</td>
                            <td>
                                <div class="flex  justify-end">
                                    <router-link :to="{name:'debts.edit', params:{id:debt.id}}" class="btn btn-edit">
                                        Edit
                                    </router-link>
                                    <button class="btn btn-delete" @click="deleteConfirmation(debt.id)">Delete</button>
                                </div>

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

        <template #modals>
            <confirm-modal :confirm-modal="promisedModal"></confirm-modal>
        </template>

    </page-layout>

</template>

<script>
import PageLayout from "@/Components/PageLayout";
import Card from "@/Components/Card";
import {usePromisedModal} from "@/Composables/usePromisedModal";
import {useDebt} from "@/Composables/useDebt";
import {onMounted} from "vue";
import ConfirmModal from "@/Components/ConfirmModal";

export default {
    components: {ConfirmModal, Card, PageLayout},
    setup() {
        const promisedModal = usePromisedModal('You wont get the data back ');
        const {fetchDebts, deleteDebt, state} = useDebt();
        onMounted(() => {
            fetchDebts()
        });

        const deleteConfirmation = async (id) => {
            console.log(id)
            let confirmed = await promisedModal.openModal()
            if (confirmed) {
                deleteDebt(id).then(res => {
                    fetchDebts()
                }).catch(err => {
                    console.error(err)
                }).finally()
            }
        }


        return {state, deleteConfirmation, promisedModal}
    },

}
</script>
