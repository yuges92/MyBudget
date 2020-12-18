<template>
    <div>
        <h1>Welcome</h1>
        <inertia-link :href="route('test')">Link</inertia-link>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

    export default {
        components: {
            JetApplicationLogo,
        },
    }
</script>
