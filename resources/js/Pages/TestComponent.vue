<template>
<customer-layout>
    <h1>
        Hello World
    </h1>
</customer-layout>

</template>

<script>
import CustomerLayout from "@/Layouts/CustomerLayout";
export default {
    name: "TestComponent",
    components: {CustomerLayout},
    props: {
        text: String
    }
}
</script>

<style scoped>

</style>
