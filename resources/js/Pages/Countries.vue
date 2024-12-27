<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';

const props = defineProps({
    countries: Array,
});
</script>

<template>
    <Head title="Dashboard"/>

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                Countries
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            <div
                                v-for="country in countries"
                                :key="country.name"
                                class="p-4 bg-gray-100 dark:bg-gray-700 rounded shadow"
                            >
                                <img
                                    :src="country.flag"
                                    :alt="`Flag of ${country.name}`"
                                    class="w-24 h-16 mx-auto rounded shadow-sm"
                                />
                                <p
                                    class="mt-4 text-center text-lg font-medium text-gray-800 dark:text-gray-200"
                                >
                                    {{ country.name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
