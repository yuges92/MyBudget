<template>
    <page-layout page-title="Incomes">

        <template #right-content>
            <div class="calendar">
                <h2>Calendar</h2>
            </div>
        </template>

        <template #page-body>
            <div>
                <card card-title="All Incomes" class="chart-col-1">
                    <template v-slot:card-header-content>
<!--                        <button class="btn" @click="toggleModal"></button>-->
                        <router-link class="btn" :to="{name:'incomes.create'}"><i class="fas fa-plus"></i> <span>Add Income</span></router-link>
                    </template>
                    <template v-slot:card-body-content>
                        <ul class="list">
                            <li v-for="index in 5" class="list-item">

                                <router-link class="btn" :to="{name:'incomes.edit', params:{id:index}}">
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
            </div>



        </template>

    </page-layout>


</template>

<script>

import Card from "@/Components/Card";
import Modal from "@/Components/Modal";
import {ref} from "vue";
import InputTextField from "@/Components/InputTextField";
import PageLayout from "@/Components/PageLayout";
import {useRouter} from "vue-router";

export default {
    components: {PageLayout, InputTextField, Modal, Card},
    setup() {
        const showModal = ref(false)
        const router=useRouter()
        const form = ref({
            firstName: "",
            lastName: "",
        })
        const toggleModal = () => {
            // console.log(showModal.value)
            // router.push('overview')
            showModal.value = !showModal.value
        }
        let save = () => {
            console.log(form.value.firstName)
            let config = {
                headers:{
                    'Content-Type':'application/json',
                    'Accept':'application/json'
                }
            }
            axios.get('/api/users',config).then(res => {
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
    methods: {},
    mounted() {
        console.log(process.env.MIX_API_URL)

    }
}
</script>

<style></style>
