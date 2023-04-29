<template>
    <Head title="Create User" />
    <h1 class="text-3xl">Craete New User</h1>

    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="">
                Name
            </label>
            <input v-model="form.name" type="text" id="name" name="name" class="border border-gray-400 p-2 w-full" required>
            <div v-if="$page.props.errors.name" v-text="$page.props.errors.name" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="">
                Email
            </label>
            <input v-model="form.email" type="email" id="email" name="email" class="border border-gray-400 p-2 w-full" required>
            <div v-if="$page.props.errors.email" v-text="$page.props.errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="">
                Password
            </label>
            <input v-model="form.password" type="password" id="password" name="password" class="border border-gray-400 p-2 w-full" required>
            <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <button 
                type="submit" 
                class="
                bg-blue-400 
                text-white 
                rounded py-2
                 px-4 hover:bg-blue-500" 
                 :disabled="form.processing">
                 Submit</button>
        </div>
    </form>
</template>

<script setup>
    import { useForm } from '@inertiajs/inertia-vue3';
    let form = useForm({
        name: '',
        email: '',
        password: ''
    });

    let submit = () => {
        form.post('/users');
    }
</script>