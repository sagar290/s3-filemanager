<template>
    <nav>
        <ul class="flex space-x-4 list-inside">
            <li>
                <NavLink href="/" :isActive=" $page.component === 'home' ">Home</NavLink>
            </li>
        </ul>

    </nav>
</template>

<script setup>
import NavLink from "./NavLink";

</script>

<style scoped>

</style>
