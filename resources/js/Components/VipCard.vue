<template>
    <div class="bg-gray-200 rounded-lg p-4 shadow-lg">
        <h2 class="text-2xl font-bold mb-2">{{ vip.full_name }}</h2>
        <p class="text-gray-600 mb-2">{{ vip.position }}</p>
    </div>
</template>

<script setup>
    defineProps({
        vip: Object,
    });
</script>
