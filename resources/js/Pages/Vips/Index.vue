<template>
    <Head title="VIPs" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">VIPs</h2>
                <div>
                    <input type="text" class="rounded-full border border-gray-500 w-[400px] text-center" placeholder="&#128269;Search" @keydown.enter="search($event)">
                </div>
                <div>
                    <Link href="/vips/create" class="px-4 py-2 bg-gray-600 shadow border-gray-400 border hover:bg-gray-400 rounded text-white">
                            Add VIP
                    </Link>
                </div>
            </div>
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
  import { Head, Link, router } from '@inertiajs/vue3';

  const props = defineProps({
    vips: Array,
  });

  function search(ev) {
    router.visit('/vips/search/' + ev.target.value)
  }
  </script>

  <style scoped>
  .grid {
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  }
  </style>
