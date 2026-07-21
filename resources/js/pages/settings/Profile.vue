<script setup lang="ts">
import { Form, Head, usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';
import ProfileController from '@/actions/App/Http/Controllers/Settings/ProfileController';
import DeleteUser from '@/components/DeleteUser.vue';
import Heading from '@/components/Heading.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from '@/components/ui/select';
import { edit } from '@/routes/profile';
import { send } from '@/routes/verification';

interface EnumOption {
    value: string;
    label: string;
}

defineProps<{
    civilStatuses: EnumOption[];
    idTypes: EnumOption[];
}>();

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'Profile settings',
                href: edit(),
            },
        ],
    },
});

const page = usePage();
const user = computed(() => page.props.auth.user);
</script>

<template>
    <Head title="Profile settings" />

    <h1 class="sr-only">Profile settings</h1>

    <div class="flex flex-col space-y-6">
        <Heading
            variant="small"
            title="Profile"
            description="Update your Personal Information"
        />

        <Form
            v-bind="ProfileController.update.form()"
            class="space-y-6"
            v-slot="{ errors, processing }"
        >
            <div class="grid gap-6 md:grid-cols-3">
                <div class="grid gap-2">
                    <Label for="first_name">First Name</Label>
                    <Input
                        id="first_name"
                        name="first_name"
                        :default-value="user.first_name"
                        autocomplete="given-name"
                    />
                    <InputError :message="errors.first_name" />
                </div>

                <div class="grid gap-2">
                    <Label for="middle_name">Middle Name</Label>
                    <Input
                        id="middle_name"
                        name="middle_name"
                        :default-value="user.middle_name ?? ''"
                        autocomplete="additional-name"
                    />
                    <InputError :message="errors.middle_name" />
                </div>

                <div class="grid gap-2">
                    <Label for="last_name">Last Name</Label>
                    <Input
                        id="last_name"
                        name="last_name"
                        :default-value="user.last_name"
                        autocomplete="family-name"
                    />
                    <InputError :message="errors.last_name" />
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div class="grid gap-2">
                    <Label for="email">Email Address</Label>
                    <Input
                        id="email"
                        type="email"
                        name="email"
                        :default-value="user.email"
                        autocomplete="email"
                    />
                    <InputError :message="errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="mobile_number">Mobile Number</Label>
                    <Input
                        id="mobile_number"
                        name="mobile_number"
                        :default-value="user.mobile_number ?? ''"
                        autocomplete="tel"
                    />
                    <InputError :message="errors.mobile_number" />
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div class="grid gap-2">
                    <Label for="date_of_birth">Date of Birth</Label>
                    <Input
                        id="date_of_birth"
                        type="date"
                        name="date_of_birth"
                        :default-value="user.date_of_birth?.slice(0, 10)"
                    />
                    <InputError :message="errors.date_of_birth" />
                </div>

                <div class="grid gap-2">
                    <Label for="civil_status">Civil Status</Label>
                    <Select
                        name="civil_status"
                        :default-value="user.civil_status ?? undefined"
                    >
                        <SelectTrigger id="civil_status" class="w-full">
                            <SelectValue placeholder="Select status" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem
                                v-for="option in civilStatuses"
                                :key="option.value"
                                :value="option.value"
                            >
                                {{ option.label }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
                    <InputError :message="errors.civil_status" />
                </div>
            </div>

            <div class="grid gap-2">
                <Label for="address">Address</Label>
                <Input
                    id="address"
                    name="address"
                    :default-value="user.address ?? ''"
                    autocomplete="street-address"
                />
                <InputError :message="errors.address" />
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div class="grid gap-2">
                    <Label for="occupation">Occupation</Label>
                    <Input
                        id="occupation"
                        name="occupation"
                        :default-value="user.occupation ?? ''"
                    />
                    <InputError :message="errors.occupation" />
                </div>

                <div class="grid gap-2">
                    <Label for="source_of_income">Source of Income</Label>
                    <Input
                        id="source_of_income"
                        name="source_of_income"
                        :default-value="user.source_of_income ?? ''"
                    />
                    <InputError :message="errors.source_of_income" />
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <div class="grid gap-2">
                    <Label for="tin">TIN</Label>
                    <Input
                        id="tin"
                        name="tin"
                        :default-value="user.tin ?? ''"
                    />
                    <InputError :message="errors.tin" />
                </div>

                <div class="grid gap-2">
                    <Label for="id_type">Government ID</Label>
                    <Select
                        name="id_type"
                        :default-value="user.id_type ?? undefined"
                    >
                        <SelectTrigger id="id_type" class="w-full">
                            <SelectValue placeholder="Select ID type" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem
                                v-for="option in idTypes"
                                :key="option.value"
                                :value="option.value"
                            >
                                {{ option.label }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
                    <InputError :message="errors.id_type" />
                </div>

                <div class="grid gap-2">
                    <Label for="id_number">ID Number</Label>
                    <Input
                        id="id_number"
                        name="id_number"
                        :default-value="user.id_number ?? ''"
                    />
                    <InputError :message="errors.id_number" />
                </div>
            </div>

            <div v-if="page.props.mustVerifyEmail && !user.email_verified_at">
                <p class="-mt-4 text-sm text-muted-foreground">
                    Your email address is unverified.
                    <Link
                        :href="send()"
                        as="button"
                        class="text-foreground underline decoration-neutral-300 underline-offset-4 transition-colors duration-300 ease-out hover:decoration-current! dark:decoration-neutral-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-if="page.props.status === 'verification-link-sent'"
                    class="mt-2 text-sm font-medium text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <Button :disabled="processing" data-test="update-profile-button"
                    >Save</Button
                >
            </div>
        </Form>
    </div>

    <DeleteUser />
</template>
