<template>
    <page-layout page-title="Edit Income">
        <template #right-content>
            <go-back-btn/>
        </template>
        <template #page-body>
            <card>

            </card>
        </template>
    </page-layout>
</template>

<script>
import PageLayout from "@/Components/PageLayout";
import GoBackBtn from "@/Components/GoBackBtn";
import Card from "@/Components/Card";

export default {
    name: "IncomeEdit",
    components: {Card, GoBackBtn, PageLayout}
}
</script>

<style scoped>

</style>
