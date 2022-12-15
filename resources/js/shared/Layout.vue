<template>

    <Head>
        <title>Drop shipper BD</title>
    </Head>


    <section class="flex">
        <div class="sidenav flex-row">
            <div class="logo">
                <img width="300px" src="https://blog.logrocket.com/wp-content/uploads/2022/09/logrocket-logo-frontend-analytics.png"
                     alt="logo">
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="/">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main">
            <header class="flex justify-between">
                <div class="flex items-center">
                </div>

                <Nav/>
            </header>


            <section class="p-6">

                <div class="max-w-3xl mx-auto">
                    <slot/>
                </div>


            </section>
        </div>
    </section>


</template>

<script setup>

import Nav from "./Nav";
import {computed, ref} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {Splitpanes, Pane} from 'splitpanes'
import SideNav from "./SideNav.vue";

const username = computed(() => {
    return usePage().props.value.auth.user.name
})

const SIDE_PANE_SIZE = ref(10)


</script>

<style scoped>

</style>
