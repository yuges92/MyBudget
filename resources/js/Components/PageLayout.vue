<template>
    <div class="page-layout">
        <header class="page-header">
            <h1 class="page-title">{{ pageTitle }}</h1>
            <div class="right-content">
                <slot name="right-content">
                </slot>
            </div>
        </header>

        <div class="page-body">
            <slot name="page-body"></slot>
        </div>

        <slot name="modals"></slot>
    </div>
</template>

<script>
export default {
    name: "PageLayout",
    props: {
        pageTitle: {
            required: true,
            type: String,

        },

    }
}
</script>

<style scoped>

</style>
