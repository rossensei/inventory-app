<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

defineProps({
    'users': Object
})

let form = useForm({
    name:'',
    building:'',
    user_id:''
})
const submit = () => {
    form.post('/offices')
}
</script>

<template layout="default">
    <div class="w-full bg-gray-50 rounded-lg shadow dark:border mx-auto md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900">
                Create Office
            </h1>
            <form class="space-y-4 md:space-y-6" @submit.prevent="submit">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                    <input v-model="form.name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.name">{{ form.errors.name }}</div>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Building</label>
                    <input v-model="form.building" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.building">{{ form.errors.building }}</div>
                </div>
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select in-charge</label>
                    <select v-model="form.user_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Choose in-charge</option>
                    <option v-for="user in users" :key="user.id" :value="user.id">{{ user.fullname }}</option>
                    
                    </select>
                    <div class="text-sm text-red-500 italic" v-if="form.errors.user_id">The in-charge field is required</div>
                </div>
                <button type="submit" class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add office</button>
            </form>
        </div>
    </div>
</template>