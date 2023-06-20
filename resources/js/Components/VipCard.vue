<template>
    <div class="bg-gray-200 rounded-lg p-4 shadow-lg cursor-pointer" @click="openVIP">
        <img :src="vip.picUrl" alt="VIP photo" class="aspect-square w-full object-cover mb-4">
        <h2 class="text-2xl font-bold mb-2">{{ vip.full_name }}</h2>
        <p class="text-gray-600 mb-2">{{ vip.position }}</p>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

    const props = defineProps({
        vip: Object
    });

    function openVIP() {
        router.visit('/vips/' + props.vip.id)
    }
</script>
