<template>
    <page-layout page-title="Create New Category">
        <template #right-content>
            <go-back-btn/>
        </template>
        <template #page-body>
            <card class="w-1/2">
                <template #card-body-content>

                    <form action="" class="form w-2/5" @submit.prevent="save">

                        <!--                        <custom-select v-model:inputValue="state.category.icon" :options="state.classList" label-name="Icon"/>-->
                        <!--                        <i :class="state.category.icon" class="fa-4x"></i>-->
                        <custom-select v-model:inputValue="state.category.type" :options="state.typeOptions" label-name="Type"/>
                        <input-text-field v-model:inputValue="state.category.name" input-type="text" label-name="Category Name"/>
                        <div class="flex justify-end full-width">
                            <submit-btn :isLoading="isLoading" btn-name="Save" @submit="save"/>
                        </div>
                    </form>
                </template>

            </card>
        </template>
    </page-layout>


</template>

<script>
import Modal from "@/Components/Modal";
import {reactive, ref} from "vue";
import InputTextField from "@/Components/InputTextField";
import PageLayout from "@/Components/PageLayout";
import GoBackBtn from "@/Components/GoBackBtn";
import SubmitBtn from "@/Components/SubmitBtn";
import CustomSelect from "@/Components/CustomSelect";
import Card from "@/Components/Card";
import faList from "@/faList";

export default {
    name: "CategoryCreate",
    components: {Card, CustomSelect, SubmitBtn, GoBackBtn, PageLayout, InputTextField, Modal},
    setup() {
        const isLoading = ref(false)
        const state = reactive({
            category: {
                type: "Income",
                name: "",
                icon: ""
            },
            typeOptions: [
                {
                    name: "Income"
                },
                {
                    name: "Expense"
                },

            ],
            classList: faList

        })

        let save = () => {
            console.log()
            console.log(state.category)
            isLoading.value = true
            console.log(state.category)
            axios.post('/api/users', state.category).then(res => {
                console.log(res)
            }).catch(err => {
                console.log(err)
            }).finally(() => {
                isLoading.value = false

            })

        }

        return {save, state, isLoading}
    },

}
</script>

<style scoped>

</style>
