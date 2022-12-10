<template>
    <nav>
        <ul class="flex space-x-4 list-inside">

            <li>
                <NavLink href="/" :isActive=" $page.component === 'home' ">Home</NavLink>
            </li>
            <li>
                <NavLink href="/contact" :isActive="$page.component === 'contact' ">Contact</NavLink>
            </li>
            <li>
                <NavLink href="/about" :isActive="$page.component === 'about' ">About</NavLink>
            </li>
            <li>
                <NavLink href="/blog" :isActive="$page.component === 'blog' ">Blog</NavLink>
            </li>
            <!--            <li><Link href="/logout" class="text-blue-600 hover:underline"  method="post" as="button">Logout</Link></li>-->
        </ul>

    </nav>
</template>

<script setup>
import NavLink from "./NavLink";

</script>

<style scoped>

</style>
