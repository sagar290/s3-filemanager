<template>

    <Head>
        <title>Drop shipper BD</title>
    </Head>

    <section class="p-6 bg-gray-200">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="text-4xl">S3 file manager</h1>

                <p class="text-sm ml-4" v-if="username">
                    Welcome back, {{ username }}!
                </p>
            </div>

            <Nav/>
        </header>

    </section>


    <section class="p-6">

        <splitpanes class="default-theme">
            <pane class="side-nav" >
                <SideNav/>
            </pane>
            <pane class="main-menu">
                <div class="max-w-3xl mx-auto">
                    <slot/>
                </div>
            </pane>
        </splitpanes>


    </section>

</template>

<script setup>

import Nav from "./Nav";
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import { Splitpanes, Pane } from 'splitpanes'
import SideNav from "./SideNav.vue";

const username = computed(() => {
    return usePage().props.value.auth.user.name
})


</script>

<style scoped>

</style>
