<template>
    <div class="py-3 text-gray-500 pt-[65px]">
        <!-- myDriveHeading -->
        <div class="w-full">
            <div class="flex justify-between items-center border-b-[1px] border-[#dadce0]">
                <div class="font-medium text-[18px] leading-[3rem]">
                    <h1>My Drive</h1>
                </div>
                <div class="flex">
                    <div class="S-button">
                        <svg class="text-[#5f6368]" width="24px" height="24px" viewBox="0 0 24 24" focusable="false"
                             fill="currentColor">
                            <path
                                d="M3,5v14h18V5H3z M7,7v2H5V7H7z M5,13v-2h2v2H5z M5,15h2v2H5V15z M19,17H9v-2h10V17z M19,13H9v-2h10V13z M19,9H9V7h10V9z">
                            </path>
                        </svg>
                    </div>
                    <div class="S-button">
                        <svg class="text-[#5f6368]" width="24px" height="24px" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                d="M11 17h2v-6h-2v6zm1-15C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zM11 9h2V7h-2v2z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- card -->
        <div>
            <div>
                <h2 class="text-[14px] font-medium my-[10px] text-[#65696e] leading-[3rem]">Suggested</h2>
            </div>
            <div class="grid 2xl:grid-cols-7 xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3  gap-[1rem] pr-[5px]">
                <div class="card">
                    <div class="flex justify-center">
                        <img :src="`${appUrl}/images/jpeg.png`" alt="./image/jpeg.png">
                    </div>
                    <div class="card-content">
                        Lorem ipsum dolor sit,<br>
                        Lorem ipsum dolor sit amet
                    </div>
                </div>
            </div>
        </div>
        <!-- folder -->
        <div class="folder">
            <div>
                <h2 class="text-[14px] font-medium my-[10px] text-[#65696e] leading-[3rem]">Folders</h2>
            </div>
            <div class="grid grid-cols-6 gap-[1rem] pr-[5px]">
                <div class="folder-card">
                    <div class="flex items-center">
                        <img :src="`${appUrl}/images/folder_FILL1_wght300_GRAD0_opsz48.svg`"
                             alt="./image/folder_FILL1_wght300_GRAD0_opsz48.svg">
                        <div class="folder-card-content text-[13px] font-medium">
                            Lorem
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>

import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

const appUrl = computed(() => {
    return usePage().props.value.app.url
})

</script>

<style scoped>

</style>
