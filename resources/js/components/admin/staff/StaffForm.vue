<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { LoaderCircle } from '@lucide/vue';
import { computed } from 'vue';

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
import { Textarea } from '@/components/ui/textarea';

import { store, update } from '@/routes/admin/staff';

import type { User } from '@/types';

interface EnumOption {
    value: string;
    label: string;
}

const props = defineProps<{
    user?: User | null;
    roles: EnumOption[];
    civilStatuses: EnumOption[];
    idTypes: EnumOption[];
}>();

const isEdit = computed(() => !!props.user);

const maxDateOfBirth = computed(() => {
    const date = new Date();
    date.setFullYear(date.getFullYear() - 18);

    return date.toISOString().split('T')[0];
});

const form = useForm({
    first_name: props.user?.first_name ?? '',
    middle_name: props.user?.middle_name ?? '',
    last_name: props.user?.last_name ?? '',

    email: props.user?.email ?? '',

    mobile_number: props.user?.mobile_number ?? '',

    date_of_birth: props.user?.date_of_birth ?? '',
    civil_status: props.user?.civil_status ?? '',
    address: props.user?.address ?? '',

    occupation: props.user?.occupation ?? '',
    source_of_income: props.user?.source_of_income ?? '',

    tin: props.user?.tin ?? '',

    id_type: props.user?.id_type ?? '',
    id_number: props.user?.id_number ?? '',

    role: props.user?.primary_role ?? '',

    // Only sent/relevant when creating a new user.
    password: '',
    password_confirmation: '',
});

function submit() {
    if (isEdit.value && props.user) {
        form.put(update(props.user).url, {
            preserveScroll: true,
        });

        return;
    }

    form.post(store().url, {
        preserveScroll: true,
    });
}
</script>

<template>
    <form class="flex flex-col gap-6" @submit.prevent="submit">
        <div class="grid gap-4 sm:grid-cols-3">
            <div class="grid gap-2">
                <Label for="first_name">First name *</Label>

                <Input
                    id="first_name"
                    v-model="form.first_name"
                    required
                    maxlength="255"
                    autofocus
                    autocomplete="given-name"
                />

                <p
                    v-if="form.errors.first_name"
                    class="text-sm text-destructive"
                >
                    {{ form.errors.first_name }}
                </p>
            </div>

            <div class="grid gap-2">
                <Label for="middle_name">Middle name</Label>

                <Input
                    id="middle_name"
                    v-model="form.middle_name"
                    maxlength="255"
                    autocomplete="additional-name"
                />

                <p
                    v-if="form.errors.middle_name"
                    class="text-sm text-destructive"
                >
                    {{ form.errors.middle_name }}
                </p>
            </div>

            <div class="grid gap-2">
                <Label for="last_name">Last name *</Label>

                <Input
                    id="last_name"
                    v-model="form.last_name"
                    required
                    maxlength="255"
                    autocomplete="family-name"
                />

                <p
                    v-if="form.errors.last_name"
                    class="text-sm text-destructive"
                >
                    {{ form.errors.last_name }}
                </p>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div class="grid gap-2">
                <Label for="email">Email *</Label>

                <Input
                    id="email"
                    v-model="form.email"
                    type="email"
                    required
                    maxlength="255"
                    autocomplete="email"
                />

                <p v-if="form.errors.email" class="text-sm text-destructive">
                    {{ form.errors.email }}
                </p>
            </div>

            <div class="grid gap-2">
                <Label for="mobile_number">Mobile number *</Label>

                <Input
                    id="mobile_number"
                    v-model="form.mobile_number"
                    required
                    placeholder="09171234567"
                    pattern="^(09|\+639)\d{9}$"
                    title="Use format 09XXXXXXXXX or +639XXXXXXXXX"
                    autocomplete="tel"
                />

                <p
                    v-if="form.errors.mobile_number"
                    class="text-sm text-destructive"
                >
                    {{ form.errors.mobile_number }}
                </p>
            </div>
        </div>

        <div v-if="!isEdit" class="grid gap-4 sm:grid-cols-2">
            <div class="grid gap-2">
                <Label for="password">Password *</Label>

                <Input
                    id="password"
                    v-model="form.password"
                    type="password"
                    required
                    autocomplete="new-password"
                />

                <p v-if="form.errors.password" class="text-sm text-destructive">
                    {{ form.errors.password }}
                </p>
            </div>

            <div class="grid gap-2">
                <Label for="password_confirmation">Confirm password *</Label>

                <Input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                />
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div class="grid gap-2">
                <Label for="date_of_birth">Date of birth *</Label>

                <Input
                    id="date_of_birth"
                    v-model="form.date_of_birth"
                    type="date"
                    required
                    :max="maxDateOfBirth"
                />

                <p class="text-xs text-muted-foreground">
                    Must be 18 years or older.
                </p>

                <p
                    v-if="form.errors.date_of_birth"
                    class="text-sm text-destructive"
                >
                    {{ form.errors.date_of_birth }}
                </p>
            </div>

            <div class="grid gap-2">
                <Label for="civil_status">Civil status *</Label>

                <Select v-model="form.civil_status">
                    <SelectTrigger id="civil_status" class="w-full">
                        <SelectValue placeholder="Select civil status" />
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

                <p
                    v-if="form.errors.civil_status"
                    class="text-sm text-destructive"
                >
                    {{ form.errors.civil_status }}
                </p>
            </div>
        </div>

        <div class="grid gap-2">
            <Label for="address">Address *</Label>

            <Textarea
                id="address"
                v-model="form.address"
                required
                maxlength="255"
                rows="2"
            />

            <p v-if="form.errors.address" class="text-sm text-destructive">
                {{ form.errors.address }}
            </p>
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div class="grid gap-2">
                <Label for="occupation">Occupation *</Label>

                <Input
                    id="occupation"
                    v-model="form.occupation"
                    required
                    maxlength="255"
                />

                <p
                    v-if="form.errors.occupation"
                    class="text-sm text-destructive"
                >
                    {{ form.errors.occupation }}
                </p>
            </div>

            <div class="grid gap-2">
                <Label for="source_of_income">Source of income *</Label>

                <Input
                    id="source_of_income"
                    v-model="form.source_of_income"
                    required
                    maxlength="255"
                />

                <p
                    v-if="form.errors.source_of_income"
                    class="text-sm text-destructive"
                >
                    {{ form.errors.source_of_income }}
                </p>
            </div>
        </div>

        <div class="grid gap-4 sm:grid-cols-3">
            <div class="grid gap-2">
                <Label for="tin">TIN</Label>

                <Input
                    id="tin"
                    v-model="form.tin"
                    placeholder="000-000-000"
                    pattern="^\d{3}-\d{3}-\d{3}(-\d{3})?$"
                    title="Use format 000-000-000 or 000-000-000-000"
                />

                <p v-if="form.errors.tin" class="text-sm text-destructive">
                    {{ form.errors.tin }}
                </p>
            </div>

            <div class="grid gap-2">
                <Label for="id_type">ID type *</Label>

                <Select v-model="form.id_type">
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

                <p v-if="form.errors.id_type" class="text-sm text-destructive">
                    {{ form.errors.id_type }}
                </p>
            </div>

            <div class="grid gap-2">
                <Label for="id_number">ID number *</Label>

                <Input
                    id="id_number"
                    v-model="form.id_number"
                    required
                    maxlength="50"
                />

                <p
                    v-if="form.errors.id_number"
                    class="text-sm text-destructive"
                >
                    {{ form.errors.id_number }}
                </p>
            </div>
        </div>

        <div class="grid gap-2 sm:w-1/2">
            <Label for="role">Role *</Label>

            <Select v-model="form.role">
                <SelectTrigger id="role" class="w-full">
                    <SelectValue placeholder="Select role" />
                </SelectTrigger>

                <SelectContent>
                    <SelectItem
                        v-for="option in roles"
                        :key="option.value"
                        :value="option.value"
                    >
                        {{ option.label }}
                    </SelectItem>
                </SelectContent>
            </Select>

            <p v-if="form.errors.role" class="text-sm text-destructive">
                {{ form.errors.role }}
            </p>
        </div>

        <div class="flex justify-end gap-2">
            <Button type="submit" :disabled="form.processing">
                <LoaderCircle
                    v-if="form.processing"
                    class="mr-2 size-4 animate-spin"
                />
                {{ isEdit ? 'Save changes' : 'Create user' }}
            </Button>
        </div>
    </form>
</template>
