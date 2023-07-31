<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    subject: '',
    message: ''
})

function submit() {
    form.post('/customers/sendmail/send')

    form.subject = ''
    form.message = ''
}
</script>

<template>

    <AppLayout>

        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Send mail to customers</h2>
                <!-- <Link href="/accounts/create" class="px-4 py-1.5 rounded-md bg-black text-white">Create Account</Link> -->
            </div>
        </template>

        <div class="py-12">
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    
                    <div class="w-2/5 mx-auto">
                        <form @submit.prevent="submit">
                            <input v-model="form.subject" class="w-full mb-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" placeholder="Subject" id="">
                            <textarea v-model="form.message" class="w-full mb-4 min-h-[150px] border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="" id="" placeholder="Message"></textarea>
                            <div class="flex justify-end">
                                <PrimaryButton type="submit"> SUBMIT </PrimaryButton>
                            </div>
                        </form>
                    </div>
                        
                </div>
            </div>
        </div>
    </AppLayout>
</template>