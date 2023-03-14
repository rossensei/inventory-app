<script setup lang="ts">
import NavBar from '../components/navbar.vue'
import { defineProps } from 'vue'

defineProps({
    'auth': Object
})

</script>

<template>
    <NavBar :user="auth.user"></NavBar>
    <!-- <NavBar></NavBar> -->
	<div class="wrapper py-8">
        <slot />
    </div>
</template>
