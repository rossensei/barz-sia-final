<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>
<template>
    <AppLayout>
        <div class="flex items-center justify-center">
            <div
                class="mt-5 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

                <div class="d-inline text-center">
                    <h1 class="text-3xl font-bold mb-4 text-center font-serif text-uppercase">{{ customer.name }}</h1>
                    <a :href="(route('customers.index'))" type="button"
                        class="text-dark bg-yellow-300 hover:bg-yellow-400 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Back
                    </a>

                    <a :href="`/customers/${customer.id}?pdf=true`" type="button" target="_blank"
                        class="text-dark bg-green-300 hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800">
                        View in PDF
                    </a>


                </div>
                <hr class="my-4">

                <div class="mb-4">
                    <p><strong>Address:</strong> <span class="float-right">{{ customer.address }}</span></p>
                    <p><strong>Email:</strong> <span class="float-right">{{ customer.email }}</span></p>
                    <p><strong>Contact:</strong> <span class="float-right">{{ customer.contact }}</span></p>

                </div>

                <div class="flex items-center justify-between">
                    <h1 class="text-1xl font-bold mb-4 text-center font-serif text-uppercase">ORDER DETAILS:</h1>
                </div>
                <ul>
                    <li v-for="order in orders" :key="order.id" class="border-b py-3">

                        <p><strong>Order Name:</strong> <span class="float-right">{{ order.order_name }}</span></p>
                        <p><strong>Details:</strong> <span class="float-right">{{ order.order_details }}</span></p>
                        <p><strong>Amount:</strong> <span class="float-right">₱&nbsp;{{ order.amount }}</span></p>
                        <p><strong>Action:</strong> <span class="float-right"> <a
                            :href="route('orders.edit', { customer: customer.id, order: order.id })" type="button"
                                    class="text-dark bg-blue-300 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-xs px-4 py-1.5 text-center mb-2 dark:bg-blue-800 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Update
                                </a>
                            </span></p>
                    </li>
                    
                </ul>
            </div>
        </div>
    </AppLayout>
</template>

<script>
export default {
    props: ['customer', 'orders'],
    methods: {
    updateOrder(orderId) {
      const url = `/customers/orders/${orderId}`;
      axios.put(url)
        .then(response => {
          alert('Order updated successfully');
          // Perform any necessary actions after successful update
        })
        .catch(error => {
          alert('Error updating order: ' + error.message);
        });
    }
  }
};
</script>
