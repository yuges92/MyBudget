<template>
    <div>
        {{ text }}
{{$page.user}}
    </div>

</template>

<script>
export default {
    name: "TestComponent",
    props: {
        text: String
    }
}
</script>

<style scoped>

</style>
