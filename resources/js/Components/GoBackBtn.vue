<template>
    <button class="btn go-back-btn" @click="goBack"><i class="fas fa-arrow-circle-left"></i></button>
</template>

<script>
export default {
    name: "GoBackBtn",
    methods: {
        goBack() {
            this.$router.go(-1)
        }
    },
}
</script>

<style scoped>
.go-back-btn{
    font-size: 1.2rem;
}
</style>
