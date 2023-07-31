<!-- <script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3'

const photoInput = ref(null)

const form = useForm({
  name: '',
  address: '',
  email: '',
  contact: '',
  profile_pic: '',
})

function submitForm() {
  if(photoInput.value) {
    form.profile_pic = photoInput.value.files[0]
  }
  form.post('/customers')
}
</script> -->

<template>
  <AppLayout>
    <div class="mt-5 flex justify-center items-center h-screen">
      <div
        class="mt-5 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form @submit.prevent="submitForm" class="space-y-6" enctype="multipart/form-data">

          <div class="flex items-center justify-between">
            <h1 class="text-l text-gray-900 dark:text-white">CREATE A RECORD</h1>
            <a :href="(route('customers.index'))" type="button"
              class="text-dark bg-yellow-300 hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Back
            </a>
          </div>
          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile Picture</label>
            <input type="file" id="profile_pic" ref="photoInput" @change="this.photoInput = $event.target.files[0]"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
          </div>
          <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
            <input type="text" id="name" v-model="form.name" placeholder="Name" required
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
          </div>
         
          <div>
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
            <input type="text" id="address" v-model="form.address" placeholder="Address" required
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
            
          </div>
          <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" v-model="form.email" placeholder="Sample@gmail.com" required
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
            
          </div>
          <div>
            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact #</label>
            <input type="number" id="contact" v-model="form.contact" placeholder="Contact" required
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
           
          </div>
          <div>
            <button
              class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              type="submit">
              Create
            </button>
          </div>
        </form>
      </div>
    </div>
  </AppLayout>
</template>
  
<script>
import { ref } from 'vue';

export default {
  data() {
    return {
      photoInput: ref(null),
      form: {
        name: '',
        address: '',
        email: '',
        contact: '',
        profile_pic: null,
      },
    };
  },
  methods: {
    submitForm() {
      if(this.photoInput) {
        this.form.profile_pic = this.photoInput;
        // console.log(this.photoInput)
      }
      this.$inertia.post('/customers', this.form);
    },
  },
};
</script>
  


  