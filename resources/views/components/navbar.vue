<template>
    <div class="bg-white">
      <nav class="shadow">
        <div class="w-5/6 mx-auto flex justify-between items-center p-3">
          <div class="flex items-center">
            <img class="rounded-full w-10 mr-2" src="https://avatars.githubusercontent.com/u/47703742?s=280&v=4" alt="">
            <a href="/" class="text-xl">Inertia Inventory</a>
          </div>

          <ul class="md:flex md:items-center">
            <li class="mx-3">
              <Link href="/" class="text-xl hover:bg-gray-300 hover:rounded-lg">Home</Link>
            </li>
            <li v-if="user" class="mx-3">
              <Link href="/users" class="text-xl hover:bg-gray-300 hover:rounded-lg">Users</Link>
            </li>
            <li v-if="user" class="mx-3">
              <Link href="/items" class="text-xl hover:bg-gray-300 hover:rounded-lg">Items</Link>
            </li>
            <li v-if="user" class="mx-3">
              <Link href="/offices" class="text-xl hover:bg-gray-300 hover:rounded-lg">Offices</Link>
            </li>
          </ul>

          <div class="flex items-center">
            <!-- <p v-if="!user" class="text-sm mr-6">You are logged in as: <strong>Guest</strong></p> -->
            <Link v-if="!user" href="/login" class="text-sm px-3.5 py-1.5 text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg">Login</Link>
            <p v-if="user" class="text-sm mr-6">You are logged in as: &nbsp; <i class="fa-solid fa-user"></i> <strong>{{ user.username }}</strong></p>
            <!-- <a href="" class="p-3 border border-gray-100 rounded-full"><i class="fa-solid fa-user"></i></a> -->
            <Link v-if="user" href="/logout" class="text-sm px-3.5 py-1.5 bg-blue-600 text-white rounded-lg">Logout</Link>
            
          </div>
        </div>
      </nav>
    </div>
    
</template>

<script setup>
// import InertiaLogo from './components/inertia-logo.vue'
import { Link } from '@inertiajs/inertia-vue3'
import { defineProps } from 'vue'

defineProps({
    user: ''
})
</script>
