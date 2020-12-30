<template>
    <div>
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
                            <button class="btn" @click="toggleModal"><i class="fas fa-plus"></i> <span>Add Income</span>
                            </button>
                        </template>
                        <template v-slot:card-body-content>
                            <ul class="list">
                                <li v-for="index in 5" class="list-item">
                                    <button class="btn">
                                        Transaction {{ index }}
                                        <span class="date">01/01/2020</span>
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
        <modal v-model:visible="showModal" modal-action-text="Save" modal-title="Add Income" @submit="save">
            <template v-slot:modal-body>
                <form action="" class="form" onsubmit.preventDefault="">
                    <input-text-field v-model:inputValue="form.firstName" input-type="text" label-name="Type"/>
                    <input-text-field v-model:inputValue="form.lastName" input-type="text" label-name="Description"/>
                    <input-text-field v-model:inputValue="form.lastName" input-type="date" label-name="Date"/>
                    <input-text-field v-model:inputValue="form.lastName" input-type="text" label-name="From"/>
                    <input-text-field v-model:inputValue="form.lastName" input-type="number" label-name="Amount"/>
                </form>
            </template>
        </modal>
    </div>

</template>

<script>

import Card from "@/Components/Card";
import Modal from "@/Components/Modal";
import {ref} from "vue";
import InputTextField from "@/Components/InputTextField";

export default {
    components: {InputTextField, Modal, Card},
    setup() {
        const showModal = ref(false)
        const form = ref({
            firstName: "",
            lastName: "",
        })
        const toggleModal = () => {
            // console.log(showModal.value)
            showModal.value = !showModal.value
        }
        let save = () => {
            console.log(form.value.firstName)
            axios.get('/api/users').then(res => {
                console.log(res)
            }).catch(err => {
                console.log(err)
            }).finally(() => {
                toggleModal()
            })
        }

        return {showModal, toggleModal, save, form}
    },
    data() {
        return {
            firstname: "No name"
        }
    },
    methods: {

    },
    mounted() {
        console.log(process.env.MIX_API_URL)

    }
}
</script>

<style></style>
