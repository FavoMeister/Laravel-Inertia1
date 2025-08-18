<template>
    <AppLayout>
        
        <div class="px-4 py-6 max-w-xl">
            <HeadingSmall title="Category information" description="Create new categories" />
            <form class="space-y-6" @submit.prevent="submit">
                <div class="grid gap-2">
                <Label>Title</Label>
                <!-- <input type="text" v-model="form.title"> -->
                <Input type="text" v-model="form.title" placeholder="Title" required></Input>
                <!-- <div v-if="errors.title">
                    {{ errors.title }}
                </div> -->
                <InputError :message="errors.title"></InputError>

                <Label for="">Slug</Label>
                <!-- <input type="text" v-model="form.slug"> -->
                <Input type="text" v-model="form.slug" placeholder="Slug" required />
                <!-- <div v-if="errors.slug">
                    {{ errors.slug }}
                </div> -->
                <InputError :message="errors.slug"></InputError>


                <!-- {{ form.errors }} -->

                <!-- <button type="submit" class="btn btn-primary">Send</button> -->
                <Button :disabled="form.processing" type="submit">Send</Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>

<script>
import { useForm } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';

import InputError from '@/components/InputError.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';

import { Button } from '@/components/ui/button';
import HeadingSmall from '@/components/HeadingSmall.vue';

export default {
    props: {
        errors: Object
    },
    components: {
        AppLayout,
        InputError,
        Input,
        Button,
        Label,
        HeadingSmall
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