<template>
    <div class="small-card">
        <div class="small-card-body">

            <div class="left-items">
                <slot name="icon">
                </slot>
            </div>
            <div class="right-items">
                <h2 class="title">{{ cardTitle }}</h2>
                <h3 class="amount">{{amount}}</h3>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SmallCard",
    props: {
        cardTitle: {
            default: "",
            type: String
        },
        amount: {
            default: "",
            type: String
        }
    }
}
</script>

<style scoped>

</style>
