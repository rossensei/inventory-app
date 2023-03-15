<script setup>
import {Link} from '@inertiajs/inertia-vue3'
import Pagination from '../../components/Pagination.vue'

defineProps({
    'items': Object
})
</script>

<template layout="default">
    <div class="container-md w-3/4 mx-auto p-8">
        <div v-if="$page.props.flash.message" class="border border-green-400 py-6 rounded mb-4 bg-green-200">
            <p class="text-center">{{ $page.props.flash.message }}</p>
        </div>
        <div class="flex justify-between align-center">
            <h1 class="text-3xl">Items</h1>
            <Link href="/items/create" class="p-2 bg-blue-500 rounded text-white">Add item</Link>
        </div>
        
        <hr class="my-3">
    
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
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Value
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Office
                        </th>
                    </tr>
                </thead>
                <tbody v-for="item of items.data" :key="item.id">
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">
                           <Link :href="'/items/edit/' + item.id">{{ item.id }}</Link>
                        </td>
                        <td class="px-6 py-4">
                            {{ item.name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.value }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.status }}
                        </td>
                        <td class="px-6 py-4">
                            {{ item.office.name }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Paginator -->
            <Pagination :links="items.links" class="mt-6"/>
    </div>
</template>