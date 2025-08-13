<template>
    <form @submit.prevent="submit">
        <label for="">Title</label>
        <input type="text" v-model="form.title">
        <label for="">Slug</label>
        <input type="text" v-model="form.slug">

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</template>

<script>
import { useForm } from '@inertiajs/vue3';


export default {
    setup() {
        const form = useForm({
            title: '',
            slug: ''
        })

        function submit() {
            console.log(form);
            form.post(route('category.store', form));
            // router.post(route('category.store', form))
        }

        return {
            form,
            submit
        }
    }
}
</script>