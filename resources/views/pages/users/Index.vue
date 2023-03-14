<script setup>
import {Link} from '@inertiajs/inertia-vue3'

defineProps({
    'users': Array
})
</script>

<template layout="default">
<div class="container-md w-3/4 mx-auto p-8">

    <div v-if="$page.props.flash.message" class="border border-green-400 py-6 rounded mb-4 bg-green-200">
        <p class="text-center">{{ $page.props.flash.message }}</p>
    </div>
    
    <div class="flex justify-between align-center">
        <h1 class="text-3xl">Users</h1>
        <Link href="/users/create" class="p-2 bg-blue-500 rounded text-white">Create User</Link>
    </div>
    
    <hr class="my-3">

    <!-- <div class="w-3/4 mx-auto"> -->
        <table class="w-full text-sm text-left text-gray 500">
            <thead class="text-sm text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Serial no.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Full Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Designation
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Department
                    </th>
                </tr>
            </thead>
            <tbody v-for="user of users" :key="user.id">
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        <Link :href="'/users/edit/' + user.id">{{ ('00000' + user.id) }}</Link>
                    </td>
                    <td class="px-6 py-4">
                        {{ user.fullname }}
                    </td>
                    <td class="px-6 py-4">
                        {{ user.designation }}
                    </td>
                    <td class="px-6 py-4">
                        {{ user.department }}
                    </td>
                </tr>
            </tbody>
        </table>
    <!-- </div> -->
</div>
</template>
