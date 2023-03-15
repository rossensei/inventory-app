<script setup>
import {Link} from '@inertiajs/inertia-vue3'

defineProps({
    links: Array
})
</script>

<template>
    <div>
        <Link
            v-for="link in links" 
            :key="link.url"
            :href="link.url" 
            v-html="link.label"
            class="px-1"
            :class="{ 'text-gray-500': ! link.url, 'font-bold': link.active }"
        />
    </div>
</template>