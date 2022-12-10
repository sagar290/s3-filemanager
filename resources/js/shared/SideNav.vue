<template>
    <nav>
        <ul class="flex flex-col">

            <li v-for="bucket in buckets" >
                <NavLink :href="'/buckets/' + bucket.id" >
                    {{ bucket.name }}
                </NavLink>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import NavLink from "./NavLink";
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

const buckets = computed(() => {
    return usePage().props.value.buckets
})

</script>

<style scoped>

</style>
