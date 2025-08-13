<template>
    <form @submit.prevent="submit">
        <label for="">Title</label>
        <input type="text" v-model="form.title">
        <label for="">Slug</label>
        <input type="text" v-model="form.slug">

        <div>
            {{ errors }}
        </div>

        <!-- {{ form.errors }} -->

        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</template>

<script>
import { useForm } from '@inertiajs/vue3';


export default {
    props: {
        errors: Object
    },
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