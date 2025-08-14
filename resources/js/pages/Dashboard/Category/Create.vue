<template>
    <AppLayout>
        <div class="px-4 py-6 max-w-xl">
            <form @submit.prevent="submit">
                <div class="grid gap-2">
                <label for="">Title</label>
                <!-- <input type="text" v-model="form.title"> -->
                <Input type="text" v-model="form.title" placeholder="Title" required></Input>
                <!-- <div v-if="errors.title">
                    {{ errors.title }}
                </div> -->
                <InputError :message="errors.title"></InputError>

                <label for="">Slug</label>
                <!-- <input type="text" v-model="form.slug"> -->
                <Input type="text" v-model="form.slug" placeholder="Slug" required />
                <!-- <div v-if="errors.slug">
                    {{ errors.slug }}
                </div> -->
                <InputError :message="errors.slug"></InputError>


                <!-- {{ form.errors }} -->

                <!-- <button type="submit" class="btn btn-primary">Send</button> -->
                <Button :disabled="form.processing" type="submit"></Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>

<script>
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import Input from '@/components/ui/input/Input.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';


export default {
    props: {
        errors: Object
    },
    components: {
        InputError,
        Input
    },
    setup() {
        Input
        InputError
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