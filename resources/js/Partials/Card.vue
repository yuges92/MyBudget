<template>
    <div class="card">
        <div class="card-header">
            <span class="card-title">{{ cardTitle }}</span>
          <div class="card-header-content">
            <slot name="card-header-content"></slot>
          </div>
        </div>
        <div class="card-body">
            <slot name="card-body-content"/>
        </div>
    </div>
</template>

<script>
export default {
name: "Card",
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
