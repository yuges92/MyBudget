<template>
    <page-layout page-title="Categories">
        <template #right-content>
            <router-link :to="{name:'categories.create'}" class="btn"><i class="fas fa-plus"></i>
                <span>Add Transaction</span>
            </router-link>
        </template>
        <template #page-body>
            <div class="flex  ">
                <card card-title="All Expense Categories" class="all-categories m-4">
                    <template v-slot:card-header-content>

                    </template>
                    <template v-slot:card-body-content>
                        <ul class="list">
                            <li v-for="category in state.expenseTypes" class="list-item">
                                <div class="flex w-full">
                                    <router-link :to="{name:'categories.edit', params:{id:category.id}}" class="btn flex justify-around w-full">
                                        <i class="fas fa-sitemap"></i>
                                        <span>{{ category.name }}</span>
                                    </router-link>
                                    <button class="btn">Delete</button>
                                </div>
                            </li>
                        </ul>
                    </template>
                </card>

                <card :class="{'w-1/3':state.showForm}" card-title="All Income Categories" class="all-categories m-4">
                    <template v-slot:card-header-content>
                    </template>
                    <template v-slot:card-body-content>
                        <ul class="list">

                            <li v-for="category in state.incomeTypes" class="list-item">
                                <div class="flex w-full">
                                    <router-link :to="{name:'categories.edit', params:{id:category.id}}" class="btn flex justify-around w-full">
                                        <i class="fas fa-sitemap"></i>
                                        <span>{{ category.name }}</span>
                                    </router-link>
                                    <button class="btn" @click="deleteConfirmation(category.id)">Delete</button>
                                </div>

                            </li>
                        </ul>
                    </template>
                </card>

                <category-edit v-if="state.showForm" :category="state.currentCategory"></category-edit>

            </div>

            <confirm-modal :confirm-modal="promisedModal"></confirm-modal>
        </template>

    </page-layout>

</template>

<script>
import PageLayout from "@/Components/PageLayout";
import Card from "@/Components/Card";
import Modal from "@/Components/Modal";
import {onMounted, reactive} from "vue";
import CategoryEdit from "@/Pages/Categories/CategoryEdit";
import ConfirmModal from "@/Components/ConfirmModal";
import {usePromisedModal} from "@/Composables/usePromisedModal";
import {useCategory} from "@/Composables/useCatagory";

export default {
    name: "Categories",
    components: {ConfirmModal, CategoryEdit, Modal, Card, PageLayout},
    setup() {
        const promisedModal = usePromisedModal('You wont get the data back ');
        const {fetchCategories, deleteCategory, state} = useCategory();

        onMounted(() => {
            fetchCategories()
        });

        const deleteConfirmation = async (category_id) => {
            let confirmed = await promisedModal.confirm()
            if (confirmed) {
                deleteCategory(category_id).then(res => {
                    fetchCategories()
                }).catch(err => {
                    console.error(err)
                }).finally()
            }
        }


        return {state, deleteConfirmation, promisedModal}
    },

    methods: {},
}
</script>

<style scoped>

</style>
