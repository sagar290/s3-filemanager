<template>
    <h1 class="text-4xl">{{ bucket.name }}</h1>
</template>

<script setup>
import {usePage} from "@inertiajs/inertia-vue3";
const bucket = usePage().props

</script>

<style scoped>

</style>
