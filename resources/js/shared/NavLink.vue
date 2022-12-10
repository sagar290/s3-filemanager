<template>
    <Link :class="{ 'font-bold underline': isActive }">
        <slot/>
    </Link>
</template>

<script setup>
defineProps({
    isActive: {
        type: Boolean,
        default: false
    }
})
</script>

<style scoped>

</style>
