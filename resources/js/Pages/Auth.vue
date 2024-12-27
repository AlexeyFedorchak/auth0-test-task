<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head} from '@inertiajs/vue3';
import PrimaryLink from "@/Components/PrimaryLink.vue";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

</script>

<template>
    <GuestLayout>
        <Head title="Log in"/>

        <div class="flex flex-col items-center justify-center">
            <PrimaryLink href="/login">
                Login with Auth0
            </PrimaryLink>
        </div>

    </GuestLayout>
</template>
