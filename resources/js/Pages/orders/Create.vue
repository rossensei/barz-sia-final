<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>

<template>
<AppLayout>
  <div class="mt-5 flex justify-center items-center h-screen">
    <div
      class="mt-5 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
      <form @submit.prevent="submitForm" class="space-y-6">
      
        <div class="flex items-center justify-between">
          <h1 class="text-l text-gray-900 dark:text-white">CREATE A RECORD</h1>
          <a :href="(route('customers.index'))" type="button"
            class="text-dark bg-yellow-300 hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
          Back
          </a>
        </div>
        <div>
          <label for="order_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Name</label>
          <input type="text" id="order_name" v-model="form.order_name" placeholder="Name" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
        </div>
       
        <div>
          <label for="order_details" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Order Details</label>
          <input type="text" id="order_details" v-model="form.order_details" placeholder="Order Details" required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
          
        </div>

        <div>
          <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
          <input type="number" id="amount" v-model="form.amount" placeholder="₱&nbsp;" required
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
export default {
  props: ['customer'],

  data() {
    return {
      form: {
        order_name: '',
        order_details: '',
        amount: null
      }
    };
  },

  methods: {
    submitForm() {
      axios.post(`/customers/${this.customer.id}/store-order`, this.form)
        .then(response => {
          window.location.href = '/customers'; // Redirect to the customers index page
        })
        .catch(error => {
          if (error.response) {
            // Handle HTTP error response
            alert('Error creating order: ' + error.response.data.message);
          } else {
            // Handle other errors
            alert('Error creating order: ' + error.message);
          }
        });
    }
  }
};
</script>
