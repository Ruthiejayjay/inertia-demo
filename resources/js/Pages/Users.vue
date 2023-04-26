<template>
    <Head title="App - Users" />
    <h1 class="text-3xl font-bold">Users</h1>
    <div style="margin-top: 400px;">
        <p>The current time is {{ time }}.</p>
        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    time: String
})
</script>