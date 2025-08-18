<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="px-4 py-6 max-w-xl">
            <HeadingSmall title="Category Edition" description="Edit a Category" />
            <form class="my-6" @submit.prevent="submit">
                <div class="grid gap-2">
                    <Label>Title</Label>
                    <!-- <input type="text" v-model="form.title"> -->
                    <div>
                        <Input type="text" v-model="form.title" placeholder="Title" required></Input>
                        <!-- <div v-if="errors.title">
                            {{ errors.title }}
                        </div> -->
                        <InputError :message="errors.title"></InputError>
                    </div>
                    <Label for="">Slug</Label>
                    <div>
                        <!-- <input type="text" v-model="form.slug"> -->
                        <Input type="text" v-model="form.slug" placeholder="Slug" required />
                        <!-- <div v-if="errors.slug">
                            {{ errors.slug }}
                        </div> -->
                        <InputError :message="errors.slug"></InputError>
                    </div>

                    <!-- {{ form.errors }} -->

                    <!-- <button type="submit" class="btn btn-primary">Send</button> -->
                    <Button :disabled="form.processing" type="submit">Edit</Button>
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
        errors: Object,
        category: Object
    },
    components: {
        AppLayout,
        InputError,
        Input,
        Button,
        Label,
        HeadingSmall
    },
    setup(props) {
        Input
        InputError
        const form = useForm({
            title: props.category.title,
            slug: props.category.slug
        });

        const breadcrumbs = [
            {
                title: 'Edit Category ' + props.category.title,
                // href: '/dashboard/category/edit'
            }
        ];

        function submit() {
            //console.log(form);
            form.put(route('category.update', props.category.id));
            // router.post(route('category.update', props.category.id), form)
        }

        return {
            form,
            submit,
            breadcrumbs
        }
    }
}
</script>