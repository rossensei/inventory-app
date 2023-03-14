<script setup>
import { useForm } from '@inertiajs/inertia-vue3'
let form = useForm({
    username:'',
    password:'',
    fullname:'',
    designation:'',
    department:''
})
const submit = () => {
    form.post('/users')
}
</script>

<template layout="default">
    <div class="w-full bg-gray-50 rounded-lg shadow dark:border mx-auto md:mt-0 sm:max-w-md xl:p-0">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900">
                Create user account
            </h1>
            <form class="space-y-4 md:space-y-6" @submit.prevent="submit">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                    <input v-model="form.username" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.username">{{ form.errors.username }}</div>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input v-model="form.password" type="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.password">{{ form.errors.password }}</div>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Full name</label>
                    <input v-model="form.fullname" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.fullname">{{ form.errors.fullname }}</div>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Designation</label>
                    <input v-model="form.designation" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.designation">{{ form.errors.designation }}</div>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Department</label>
                    <input v-model="form.department" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.department">{{ form.errors.department }}</div>
                </div>
                <button type="submit" class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create account</button>
            </form>
        </div>
    </div>
</template>