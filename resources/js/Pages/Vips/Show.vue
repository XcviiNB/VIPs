<template>
    <Head :title="'View VIP |' + vip.full_name"></Head>

    <AuthenticatedLayout>

        <template #header>
            <div class="flex justify-between text-white">
                <h2>View VIP | {{ vip.full_name }}</h2>
                <div>
                    <Link href="/vips" class="px-4 py-2 bg-gray-600 shadow border-gray-400 border hover:bg-gray-400 rounded">
                        Back
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow rounded py-6 flex">
                <img :src="vip.picUrl" alt="VIP Picture" class="aspect-square w-[40%] object-cover">
                <div class="pl-6 w-full flex flex-col">
                    <div class="flex">
                        <h4 class="text-3xl mb-6 flex-1">{{ vip.full_name }}</h4>
                        <div v-if="user.role=='admin'">
                            <Link :href="'/vips/' + vip.id" method="delete" class="p-2 bg-red-600 hover:bg-red-400 text-white">Delete</Link>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-100 flex-1">
                        {{ vip.position }}
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>

</template>

<script setup>
import { Link, Head, usePage } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { computed } from 'vue'


const prop = defineProps({
    'vip': Object
})

const page = usePage()

const user = computed(() => page.props.auth.user)

</script>
