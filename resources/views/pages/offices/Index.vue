<script setup>
import {Link} from '@inertiajs/inertia-vue3'

defineProps({
    'offices': Array
})
</script>

<template layout="default">
    <div class="container-md w-3/4 mx-auto p-8">

        <div v-if="$page.props.flash.message" class="border border-green-400 py-6 rounded mb-4 bg-green-200">
            <p class="text-center">{{ $page.props.flash.message }}</p>
        </div>
        
        <div class="flex justify-between align-center">
            <h1 class="text-3xl">Offices</h1>
            <Link href="/offices/create" class="p-2 bg-blue-500 rounded text-white">Create office</Link>
        </div>
        
        <hr class="my-3">
    
        <!-- <div class="w-3/4 mx-auto"> -->
            <table class="w-full text-sm text-left text-gray 500">
                <thead class="text-sm text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Building
                        </th>
                        <th scope="col" class="px-6 py-3">
                            In-charge
                        </th>
                    </tr>
                </thead>
                <tbody v-for="office of offices" :key="office.id">
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">
                            <Link :href="'/offices/edit/' + office.id">{{ office.id }}</Link>
                        </td>
                        <td class="px-6 py-4">
                            {{ office.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ office.building }}
                        </td>
                        <td class="px-6 py-4">
                            {{ office.user.fullname }}
                        </td>
                    </tr>
                </tbody>
            </table>
        <!-- </div> -->
    </div>
</template>