<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router, Link } from '@inertiajs/vue3'

const prop = defineProps({
  customers: Array
})

function performSearch(ev) {
  router.visit('/customers/search/' + ev.target.value)
}

function toggleActive(customer) {
  router.visit('/customers/toggle/' + customer)
}
</script>
<template>
  <AppLayout>
    <div class="container mx-auto my-4">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="relative mt-5 mb-2 mx-5 flex justify-between items-center">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
          </div>
          <input type="text" @keydown.enter="performSearch($event)"
            id="table-search"
            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search for items" />
          <div class="flex items-center space-x-3">
            <Link href="/customers/sendmail" class="px-3 py-1 rounded-full text-base bg-black text-white">Send mail to customers</Link>
            <a :href="route('customers.create')" type="button"
            class="text-black bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create</a>
          </div>

        </div>

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-5">
          <thead
            class="text-m text-gray-700 uppercase bg-blue-400 border-b dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 text-center">
            <tr>
              <th scope="col" class="px-6 py-3">Photo</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Address</th>
              <th scope="col" class="px-6 py-3">Email</th>
              <th scope="col" class="px-6 py-3">Contact No</th>
              <th scope="col" class="px-6 py-3">Toggle Active</th>
              <th scope="col" class="px-6 py-3">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="customer in customers.data" :key="customer.id" class="text-lg border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="text-center"><img :src="customer.profile_pic_url" class="w-[50px] mx-auto" alt=""></td>
              <td class="text-center">{{ customer.name }}</td>
              <td class="text-center">{{ customer.address }}</td>
              <td class="text-center">{{ customer.email }}</td>
              <td class="text-center">{{ customer.contact }}</td>
              <td class="text-center">
                <label class="switch" :for="'status-' + customer.id">
                  <input type="checkbox" :id="'status-' + customer.id" :checked="customer.active" @change="toggleActive(customer.id)">
                  <span class="slider round"></span>
                </label>
              </td>

              <td class=" text-center">
                <a :href="`/customers/${customer.id}/edit`" type="button"
                  class="px-3 py-2 text-xs font-medium text-black bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-center mr-2 mb-2">
                  Edit
                </a>
                <a :href="`/customers/${customer.id}`" type="button" class="px-3 py-2 text-xs font-medium text-black bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 shadow-lg shadow-lime-500/50 dark:shadow-lg dark:shadow-lime-800/80 font-medium rounded-lg mr-2 mb-2">Show</a>
                <a href="#" @click="deleteCustomer(customer.id)" type="button"
                  class="px-3 py-2 text-xs font-medium text-black bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-center mr-2 mb-2">
                  Delete
                </a>
                <a :href="`/customers/${customer.id}/create-order`" type="button"
                  class="px-3 py-2 text-xs font-medium text-black bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 shadow-lg shadow-yellow-500/50 dark:shadow-lg dark:shadow-yellow-800/80 font-medium rounded-lg text-center mr-2 mb-2">
                  Orders
                </a>
              </td>
            </tr>
          </tbody>

        </table>
      </div>
    </div>
  </AppLayout>
</template>
  
<script>
export default {
  props: {
    customers: Array,
  },
  methods: {
    deleteCustomer(customerId) {
      if (confirm('Are you sure you want to delete this customer?')) {
        this.$inertia.delete(`/customers/${customerId}`);
      }
    },
  },
};
</script>

<style scoped>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
  



  