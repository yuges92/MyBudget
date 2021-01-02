<template>
    <page-layout page-title="Categories">
        <template #right-content>
            <router-link :to="{name:'categories.create'}" class="btn"><i class="fas fa-plus"></i>
                <span>Add Transaction</span>
            </router-link>
        </template>
        <template #page-body>
            <div class="flex ">
                <card :class="{'w-1/3':state.showForm}" card-title="All Categories" class="all-categories">
                    <template v-slot:card-header-content>
                        <!--                        <button class="btn" @click="toggleModal"></button>-->

                    </template>
                    <template v-slot:card-body-content>
                        <ul class="list">
                            <li v-for="category in state.categories" class="list-item">

                                <router-link class="btn" :to="{name:'categories.edit', params:{id:category.id}}">
                                    <i class="fas fa-sitemap"></i>
                                    <span>{{ category.type }}</span>
                                    <span>{{ category.name }}</span>
                                </router-link>

                            </li>
                        </ul>
                    </template>
                </card>

                {{state.currentCategory}}
                <category-edit v-if="state.showForm" :category="state.currentCategory"></category-edit>

            </div>


        </template>

    </page-layout>

</template>

<script>
import PageLayout from "@/Components/PageLayout";
import Card from "@/Components/Card";
import Modal from "@/Components/Modal";
import {onMounted, reactive} from "vue";
import CategoryEdit from "@/Pages/Categories/CategoryEdit";

export default {
    name: "Categories",
    components: {CategoryEdit, Modal, Card, PageLayout},
    setup() {
        const state = reactive({
            categories: [],
            showForm: false,
            currentCategory: {}
        })

        let fetchCategories = async () => {
            let response = await axios.get(route('categories.index'));
            console.log(response)
            state.categories = response.data
        }
        onMounted(() => {
            fetchCategories()

        });

        const showEditForm = (category) => {
            console.log(category)
            // closeForm();
            state.showForm = true
            state.currentCategory = null

            state.currentCategory = category
        }
        const closeForm = () => {
            state.showForm = false
            state.currentCategory = null
        }

        return {state, showEditForm, closeForm}
    },

    methods: {},
}
</script>

<style scoped>

</style>
