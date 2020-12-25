<template>
    <div class="chart-card">
        <div class="chart-card-header">
            <span class="chart-card-title">{{ cardTitle }}</span>
        </div>
        <div class="chart-card-body">
            <slot name="chart-card-body-content"/>
        </div>
    </div>
</template>

<script>
export default {
name: "ChartCard",
    props:{
    cardTitle:{
        type:String,
        default:""
    }
    }

}
</script>

<style scoped>

</style>
