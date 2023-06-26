<template>
    <div class="bg-gray-200 p-4 rounded-lg shadow-lg cursor-pointer flex flex-col">
        <div class="flex-1" @click="openVIP">
            <img :src="vip.picUrl" alt="VIP photo" class="aspect-square w-full object-cover mb-4">
            <h2 class="text-2xl font-bold mb-2">{{ vip.full_name }}</h2>
            <p class="text-gray-600 mb-2">{{ vip.position }}</p>
        </div>
        <div class="flex justify-between">
            <div>&nbsp;</div>
                <label :for="'status-' + vip.id" class="switch">
                    <input type="checkbox" :id="'status-' + vip.id" :checked="vip.enable" @change="toggleEnable(vip)">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
</template>

<style scoped>
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(16px);
        -ms-transform: translateX(16px);
        transform: translateX(16px);
    }

    .slider.round {
        border-radius: 20px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<script setup>
import { router } from '@inertiajs/vue3';

    const props = defineProps({
        vip: Object
    });

    function openVIP() {
        router.visit('/vips/' + props.vip.id)
    }

    function toggleEnable(vip) {
        router.visit('/vips/toggle/' + vip.id, {
            method: 'post',
            preserveScroll: true
        })
    }
</script>
