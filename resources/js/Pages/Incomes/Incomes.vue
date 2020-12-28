<template>
    <div class="dashboard">

        <header class="page-header">
            <h1 class="page-title">Incomes</h1>
            <div class="calendar">
                <h2>Calendar</h2>
            </div>
        </header>
        <div class="page-body">
            <div>
                <card card-title="All Incomes" class="chart-col-1">
                    <template v-slot:card-header-content>
                        <button @click="toggleModal" class="btn"><i class="fas fa-plus"></i> <span>Add Income</span></button>
                    </template>
                    <template v-slot:card-body-content>
                        <ul class="list">
                            <li v-for="index in 5" class="list-item">
                                <button class="btn">

                                    Transaction {{ index }} <span class="date">01/01/2020</span>
                                    <span>Type</span>
                                    <span>From</span>
                                    <span>Date</span>
                                    <span>Amount</span>
                                </button>

                            </li>
                        </ul>
                    </template>
                </card>
            </div>
        </div>
    </div>
    <modal :visible="showModal" modal-action-text="Save" modal-title="Add Income" @close="toggleModal" @submit="save">
        <template v-slot:modal-body>
            <form action="" class="form">
                <div>
                    <label for="name">some</label>
                    <input id="name" type="text">
                </div>
            </form>
        </template>
    </modal>

</template>

<script>

import Card from "@/Partials/Card";
import Modal from "@/Partials/Modal";
import {ref} from "vue";

export default {
    components: {Modal, Card},
    setup() {
        const showModal = ref(false)
        const toggleModal = () => {
           // console.log(showModal.value)
            showModal.value = !showModal.value
        }
        let save = () => {
            axios.get('users').then(res => {
                console.log(res)
            }).catch(err => {
                console.log(err)
            }).finally(() => {
                toggleModal()
            })
        }
        return {showModal, toggleModal, save}
    },
    // data() {
    //     return {
    //         showModal: false
    //     }
    // },
    methods: {},
}
</script>

<style></style>
