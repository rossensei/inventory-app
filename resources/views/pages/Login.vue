<script setup>
import {useForm} from '@inertiajs/inertia-vue3'
let form = useForm({
    'username': '',
    'password': ''
})
let submit = () => {
    form.post('/login')
}
</script>

<template layout="default">
    <!-- <div class="flex flex-col items-center justify-center mx-auto md:h-screen lg:py-0"> -->
      <div class="w-full bg-gray-50 rounded-lg shadow dark:border mx-auto md:mt-0 sm:max-w-md xl:p-0">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900">
                  Log in to your account
              </h1>
              <div class="text-sm text-red-500 italic" v-if="form.errors.authentication">{{ form.errors.authentication }}</div>
              <form class="space-y-4 md:space-y-6" @submit.prevent="submit">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                      <input v-model="form.username" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                      <div class="text-sm text-red-500 italic" v-if="form.errors.username">{{ form.errors.username }}</div>
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                      <input v-model="form.password" type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                      <div class="text-sm text-red-500 italic" v-if="form.errors.password">{{ form.errors.password }}</div>
                  </div>
                  <button type="submit" class="w-full text-white bg-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Log in</button>
              </form>
          </div>
      </div>
  <!-- </div> -->
</template>
