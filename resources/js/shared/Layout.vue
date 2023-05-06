<template>

    <Head>
        <title>S3 file manager</title>
    </Head>

    <section class="fixed bg-white z-[1] w-[100%]">
        <div class="header flex p-[8px] sticky justify-between">
            <div class="flex items-center">
                <div class="logo">
                    <img :src="`${appUrl}/images/drive_logo.png`" alt="s3 file manager">
                </div>
                <div class="text-[22px] font-semibold text-[#5f6368] pl-[15px]">
                    <h1>Drive</h1>
                </div>
            </div>
            <div class="search-bar flex w-[100rem] justify-between">
                <form class="flex items-center w-[50%]">
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <button type="button" class="absolute inset-y-0 left-0 flex items-center pr-3">
                                <div class="H-button">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                         fill="currentColor"
                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <input type="text" id="voice-search"
                               class="bg-gray-50 text-gray-900 text-lg rounded-lg focus:ring-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 bg-[#f1f3f4] outline-0"
                               placeholder="Search in Drive" required>

                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <div class="H-button">
                                <svg aria-hidden="true" class="w-5 h-5 text-[#5f6368] dark:text-gray-400"
                                     fill="currentColor"
                                     viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 17v2h6v-2H3zM3 5v2h10V5H3zm10 16v-2h8v-2h-8v-2h-2v6h2zM7 9v2H3v2h4v2h2V9H7zm14 4v-2H11v2h10zm-6-4h2V7h4V5h-4V3h-2v6z">
                                    </path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </form>

                <div class="flex">
                    <div class="S-button button">
                        <svg viewBox="0 0 24 24" class="text-[#5f6368] cursor-pointer w-6 h-6" focusable="false"
                             fill="currentColor">
                            <path
                                d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z">
                            </path>
                            <path d="M7 15h10v2H7zm3.3-3.8L8.4 9.3 7 10.7l3.3 3.3L17 7.3l-1.4-1.4z"></path>
                        </svg>

                    </div>
                    <div class="S-button">
                        <svg class="cursor-pointer w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             fill="#5f6368"
                             focusable="false">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path
                                d="M11 18h2v-2h-2v2zm1-16C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-14c-2.21 0-4 1.79-4 4h2c0-1.1.9-2 2-2s2 .9 2 2c0 2-3 1.75-3 5h2c0-2.25 3-2.5 3-5 0-2.21-1.79-4-4-4z">
                            </path>
                        </svg>
                    </div>
                    <div class="S-button">
                        <svg class="text-[#5f6368] cursor-pointer w-6 h-6" viewBox="0 0 24 24" fill="currentColor"
                             focusable="false">
                            <path
                                d="M13.85 22.25h-3.7c-.74 0-1.36-.54-1.45-1.27l-.27-1.89c-.27-.14-.53-.29-.79-.46l-1.8.72c-.7.26-1.47-.03-1.81-.65L2.2 15.53c-.35-.66-.2-1.44.36-1.88l1.53-1.19c-.01-.15-.02-.3-.02-.46 0-.15.01-.31.02-.46l-1.52-1.19c-.59-.45-.74-1.26-.37-1.88l1.85-3.19c.34-.62 1.11-.9 1.79-.63l1.81.73c.26-.17.52-.32.78-.46l.27-1.91c.09-.7.71-1.25 1.44-1.25h3.7c.74 0 1.36.54 1.45 1.27l.27 1.89c.27.14.53.29.79.46l1.8-.72c.71-.26 1.48.03 1.82.65l1.84 3.18c.36.66.2 1.44-.36 1.88l-1.52 1.19c.01.15.02.3.02.46s-.01.31-.02.46l1.52 1.19c.56.45.72 1.23.37 1.86l-1.86 3.22c-.34.62-1.11.9-1.8.63l-1.8-.72c-.26.17-.52.32-.78.46l-.27 1.91c-.1.68-.72 1.22-1.46 1.22zm-3.23-2h2.76l.37-2.55.53-.22c.44-.18.88-.44 1.34-.78l.45-.34 2.38.96 1.38-2.4-2.03-1.58.07-.56c.03-.26.06-.51.06-.78s-.03-.53-.06-.78l-.07-.56 2.03-1.58-1.39-2.4-2.39.96-.45-.35c-.42-.32-.87-.58-1.33-.77l-.52-.22-.37-2.55h-2.76l-.37 2.55-.53.21c-.44.19-.88.44-1.34.79l-.45.33-2.38-.95-1.39 2.39 2.03 1.58-.07.56a7 7 0 0 0-.06.79c0 .26.02.53.06.78l.07.56-2.03 1.58 1.38 2.4 2.39-.96.45.35c.43.33.86.58 1.33.77l.53.22.38 2.55z">
                            </path>
                            <circle cx="12" cy="12" r="3.5"></circle>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="S-button ml-[50px]">
                    <svg class="text-[#5f6368] cursor-pointer w-6 h-6" viewBox="0 0 24 24" fill="currentColor"
                         focusable="false">
                        <path
                            d="M6,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM6,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM12,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM16,6c0,1.1 0.9,2 2,2s2,-0.9 2,-2 -0.9,-2 -2,-2 -2,0.9 -2,2zM12,8c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,14c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2zM18,20c1.1,0 2,-0.9 2,-2s-0.9,-2 -2,-2 -2,0.9 -2,2 0.9,2 2,2z">
                        </path>
                    </svg>
                </div>
                <div class="S-button">
                    <img class="w-[24px]" :src="`${appUrl}/images/icons8-confusion-16.png`" alt="">
                </div>
            </div>
        </div>
    </section>


    <section id="menu" class="flex">
        <div class="hamburger z-[1]">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <div class="nav-menu sidebar flex flex-wrap h-screen pt-[60px]">
      <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer z-[1]">
        <!-- <button class="fixed p-2 bg-black rounded-lg top-5 left-5" onclick="myFunction()">
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4
             12h16M4 18h16" />
          </svg>
          <span class="sr-only">Open menu</span>
        </button> -->
      </span>
            <div class=" bg-white rounded p-3 pl-0 menu-wrap">
                <div class="flex justify-between">
                    <div class="hidden flex items-center space-x-4 p-2 mb-5">
                        <img class="h-12 rounded-full"
                             src="http://www.gravatar.com/avatar/2acfb745ecf9d4dccb3364752d17f65f?s=260&d=mp"
                             alt="James Bhatta">
                        <div>
                            <h4 class="font-semibold text-lg text-gray-700 capitalize font-poppins tracking-wide">James
                                Bhatta</h4>
                            <span class="text-sm tracking-wide flex items-center space-x-1">
                <svg class="h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg><span class="text-gray-600">Verified</span>
              </span>
                        </div>
                    </div>

                    <!-- button-new -->

                    <div class="button-new">
                        <button class="flex items-center">
                            <div class="new pr-[10px]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                                    <path fill="#34A853" d="M16 16v14h4V20z"></path>
                                    <path fill="#4285F4" d="M30 16H20l-4 4h14z"></path>
                                    <path fill="#FBBC05" d="M6 16v4h10l4-4z"></path>
                                    <path fill="#EA4335" d="M20 16V6h-4v14z"></path>
                                    <path fill="none" d="M0 0h36v36H0z"></path>
                                </svg>
                            </div>
                            New
                        </button>
                    </div>
                    <button class="menu-button p-1 rounded-lg focus:outline-none focus:ring" id="close"
                            onclick="close()">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span class="sr-only">Close sidebar</span>
                    </button>
                </div>
                <!-- hidden-button -->

                <Nav/>
            </div>
        </div>

        <div class="bg-white hero-wrap">
            <slot/>
        </div>
    </section>

</template>

<script setup>

import Nav from "./Nav";
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {Splitpanes, Pane} from 'splitpanes'
import SideNav from "./SideNav.vue";

const appUrl = computed(() => {
    return usePage().props.value.app.url
})


</script>

<style scoped>

</style>
