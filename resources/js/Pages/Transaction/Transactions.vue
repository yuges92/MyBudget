<template>
    <app-layout page-title="Transactions">

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import TestComponent from "@/Pages/TestComponent";

    export default {
        components: {
            TestComponent,
            AppLayout,
            Welcome,
        },
    }
</script>
