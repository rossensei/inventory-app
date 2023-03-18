<script setup>
import {Link, useForm} from '@inertiajs/inertia-vue3'
import Pagination from '../../components/Pagination.vue'
import { onMounted } from 'vue'

defineProps({
    'items': Object,
})


const closeNotif = () => {
    const toast = document.getElementById('toast-bottom-left');
    toast.style.opacity = '0'
    toast.style.transition = '.5s all ease'
}


// setTimeout(() => {
//   const toast = document.getElementById('toast-bottom-right');
// //   toast.style.display = 'none';
//   toast.style.opacity = '0';
//   toast.style.transition = '.3s all ease'

// }, 4000);

</script>

<template layout="default">
    <div class="container-md w-3/4 mx-auto p-8">

        <!-- <div v-if="$page.props.flash.message" class="border border-green-400 py-6 rounded mb-4 bg-green-200">
            <p class="text-center">{{ $page.props.flash.message }}</p>
        </div> -->
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
                        <th scope="col" class="px-6 py-3">
                            ...
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
                        <td class="px-6 py-4">
                            <!-- <button @click="deleteItem(item.id)" type="submit">delete</button> -->
                            <Link :href="'/items/' + item.id" method="delete" as="button" type="button"> Delete </Link>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Paginator -->
            <Pagination :links="items.links" class="mt-6"/>

            <div v-if="$page.props.flash.message" id="toast-bottom-left" class="transition-ease fixed flex justify-between items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-green-100 rounded-md shadow bottom-14 left-14 border-l-8 border border-green-400" role="alert">
                <div class="flex items-center">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <div class="pl-4 border-l-2 border-gray-300 text-sm font-normal ml-4">{{ $page.props.flash.message }}</div>
                </div>

                <button id="close-button" @click="closeNotif()"><i class="fa-solid fa-xmark"></i></button>
            </div>
    </div>
</template>