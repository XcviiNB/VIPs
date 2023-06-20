<template>
    <Head title="Add VIP" />

    <AuthenticatedLayout>

        <template #header>
            <div class="flex justify-between text-white">
                <h2>Add VIP</h2>
                <div>
                    <Link href="/vips" class="px-4 py-2 bg-gray-600 shadow border-gray-400 border hover:bg-gray-400 rounded">
                        Back
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-8 w-[400px] mx-auto px-4 rounded bg-gray-200 mt-8 shadow">

            <form @submit.prevent="submit">
                <div class="flex flex-col mb-3">
                    <label for="full_name">Full Name</label>
                    <input type="text" id="full_name" v-model="form.full_name" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.full_name">{{ form.errors.full_name }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="position">Position</label>
                    <textarea id="position" v-model="form.position" class="h-full border-gray-400 rounded"></textarea>
                    <div class="text-red-600" v-if="form.errors.position">{{ form.errors.position }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="pic">VIP Picture</label>
                    <input type="file" @input="form.pic = $event.target.files[0]" class="h-full border-gray-400 rounded text-center" accept="image/jpeg" />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                </div>
                <button class="px-4 py-2 bg-gray-500 w-full rounded border border-gray-400 shadow hover:bg-gray-400 text-white">
                    Add VIP
                </button>
            </form>

        </div>

    </AuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form =  useForm({
    full_name: null,
    position: null,
    pic: null
})

function submit() {
    form.post('/vips');
}
</script>
