<template>
    <Head title="Create User" />
    <h1 class="text-3xl">Craete New User</h1>

    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="">
                Name
            </label>
            <input v-model="form.name" type="text" id="name" name="name" required class="border border-gray-400 p-2 w-full">
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="">
                Email
            </label>
            <input v-model="form.email" type="email" id="email" name="email" required class="border border-gray-400 p-2 w-full">
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="">
                Password
            </label>
            <input v-model="form.password" type="password" id="password" name="password" required class="border border-gray-400 p-2 w-full">
        </div>
        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
        </div>
    </form>
</template>

<script setup>
    import { reactive } from 'vue'
    import { Inertia } from '@inertiajs/inertia'
    let form = reactive({
        name: '',
        email: '',
        password: ''
    });

    let submit = () => {
        Inertia.post('/users', form);
    }
</script>