<template>
    <Head title="Users" />
    <h1 class="text-3xl font-bold">Users</h1>
    <ul>
        <li v-for="user in users" :key="user.id" v-text="user.name" />
    </ul>
    <div style="margin-top: 400px;">
        <p>The current time is {{ time }}.</p>
        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>
</template>

<script setup>
defineProps({
    time: String,
    users: Array
})
</script>