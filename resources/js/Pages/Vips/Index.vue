<template>
    <Head title="VIPs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">VIPs</h2>
        </template>

        <div class="bg-gray-8=900 overflow-hidden ml-2 mr-2">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 p-4">
                <VipCard v-for="vip in vips" :key="vip.id" :vip="vip" class="bg-gray-100 rounded-lg p-4 shadow-md"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

  <script setup>
  import VipCard from '../../Components/VipCard.vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';

  defineProps({
    vips: Array,
  });
  </script>

  <style scoped>
  .grid {
    /* Adjust grid column sizes for different screen sizes */
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  }
  </style>
