<template>
    <div class="py-3 text-gray-500 pt-[65px] h-full">
        <!-- myDriveHeading -->
        <!-- card -->
        <div class="drop-area"
             @dragover.prevent="handleDragOver"
             @dragleave.prevent="handleDragLeave"
             @dragenter.prevent="handleDragOver"
             @drop.prevent="handleDrop">

            <div id="drop-area-highlight" class="
                absolute
                bottom-0
                left-0
                bg-slate-800
                w-100
                min-h-full
                min-w-full
                opacity-75
                flex
                items-center
                content-center
                justify-center
            ">

               <span class="text-[#65696e] text-[22px]">Drop your files here</span>

            </div>

            <div class="grid 2xl:grid-cols-7 xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3  gap-[1rem] pr-[5px]">
                <div class="card">
                    <div class="flex justify-center">
                        <img :src="`${appUrl}/images/jpeg.png`" :alt="`${appUrl}/images/jpeg.png`">
                    </div>
                    <div class="card-content">
                        Lorem ipsum dolor sit,<br>
                        Lorem ipsum dolor sit amet
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

    </div>

</template>

<script setup>

import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import { ref } from 'vue';

const appUrl = computed(() => {
    return usePage().props.value.app.url
})


const file = ref(null);

const handleDragOver = (event) => {
    event.preventDefault();
    console.log('drag over')
    document.getElementById('drop-area-highlight').classList.add('active');

};

const handleDragLeave = (event) => {
    event.preventDefault();

    if (event.target.id === 'drop-area-highlight') {
        document.getElementById('drop-area-highlight').classList.remove('active');
    }
};

const handleDrop = (event) => {
    event.preventDefault();
    document.getElementById('drop-area-highlight').classList.remove('active');
    file.value = event.dataTransfer.files[0];
};

</script>



<style scoped>

.drop-area {
    padding: 20px;
    text-align: center;
    cursor: pointer;
    height: 100%;
    width: 100%;
}

#drop-area-highlight {
    display: none;
}

#drop-area-highlight.active {
    display: flex !important;
    background: #1a202c;
}
</style>
