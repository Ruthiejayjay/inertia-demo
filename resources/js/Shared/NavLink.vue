<template>
    <Link class="text-black hover:underline" :class="{ 'font-bold': active }">
   <slot></slot>
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Link
    },
    props: {
        active: Boolean
    }
}
</script>