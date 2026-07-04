<script setup lang="ts">
import { useForm, Head, usePage } from '@inertiajs/vue3';
import { ref, computed, watch } from 'vue';
import InputError from '@/components/InputError.vue';
import PasswordInput from '@/components/PasswordInput.vue';
import TextLink from '@/components/TextLink.vue';
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
import { Spinner } from '@/components/ui/spinner';
import { login } from '@/routes';
import { store } from '@/routes/register';

defineProps<{
    passwordRules: string;
}>();

defineOptions({
    layout: {
        title: 'Create an account',
        description: 'Enter your details below to create your account',
    },
});

const page = usePage();

const steps = [
    {
        label: 'Personal info',
        fields: ['first_name', 'middle_name', 'last_name', 'email', 'mobile_number', 'date_of_birth', 'civil_status'],
    },
    {
        label: 'Address & employment',
        fields: ['address', 'occupation', 'source_of_income'],
    },
    {
        label: 'Identity verification',
        fields: ['id_type', 'id_number'],
    },
    {
        label: 'Security',
        fields: ['password', 'password_confirmation'],
    },
] as const;

function initialStepFromErrors(): number {
    const erroredFields = Object.keys(page.props.errors ?? {});

    if (erroredFields.length === 0) {
        return 0;
    }

    const stepIndex = steps.findIndex((step) =>
        step.fields.some((field) => erroredFields.includes(field)),
    );

    return stepIndex === -1 ? 0 : stepIndex;
}

const currentStep = ref(initialStepFromErrors());
const isLastStep = computed(() => currentStep.value === steps.length - 1);

const form = useForm({
    first_name: '',
    middle_name: '',
    last_name: '',
    email: '',
    mobile_number: '',
    date_of_birth: '',
    civil_status: '',
    address: '',
    occupation: '',
    source_of_income: '',
    tin: '',
    id_type: '',
    id_number: '',
    password: '',
    password_confirmation: '',
}).withPrecognition('post', '/register/validate');

const showValidatingSpinner = ref(false);
let spinnerTimer: ReturnType<typeof setTimeout> | null = null;

watch(
    () => form.validating,
    (validating) => {
        if (validating) {
            spinnerTimer = setTimeout(() => {
                showValidatingSpinner.value = true;
            }, 200);
        } else {
            if (spinnerTimer) {
                clearTimeout(spinnerTimer);
            }

            showValidatingSpinner.value = false;
        }
    },
);

function next() {
    form.validate({
        only: steps[currentStep.value].fields,
        onSuccess: () => (currentStep.value += 1),
    });
}

function submit() {
    form.post(store().url, {
        onSuccess: () => form.reset('password', 'password_confirmation'),
        onError: (errors) => {
            const erroredFields = Object.keys(errors);
            const stepIndex = steps.findIndex((step) =>
                step.fields.some((field) => erroredFields.includes(field)),
            );

            if (stepIndex !== -1) {
                currentStep.value = stepIndex;
            }
        },
    });
}
</script>

<template>
    <Head title="Register" />

    <form @submit.prevent="submit" class="flex flex-col gap-6">
        <!-- Step indicator -->
        <div class="flex items-start gap-2">
            <template v-for="(step, index) in steps" :key="step.label">
                <div class="flex flex-col items-center gap-1.5">
                    <div
                        class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full text-xs font-medium"
                        :class="index <= currentStep
                            ? 'bg-primary text-primary-foreground'
                            : 'bg-muted text-muted-foreground'"
                    >
                        {{ index + 1 }}
                    </div>
                    <span
                        class="whitespace-nowrap text-center text-xs"
                        :class="index === currentStep ? 'text-foreground font-medium' : 'text-muted-foreground'"
                    >
                        {{ step.label }}
                    </span>
                </div>
                <div
                    v-if="index < steps.length - 1"
                    class="mt-3 h-px flex-1"
                    :class="index < currentStep ? 'bg-primary' : 'bg-muted'"
                />
            </template>
        </div>

        <div class="grid gap-6">
            <!-- Step 1: Personal info -->
            <div v-show="currentStep === 0" class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="first_name">First name</Label>
                    <Input
                        id="first_name"
                        v-model="form.first_name"
                        type="text"
                        required
                        autofocus
                        autocomplete="given-name"
                        placeholder="Juan"
                        :aria-invalid="form.invalid('first_name')"
                        @blur="form.validate('first_name')"
                    />
                    <InputError v-if="form.invalid('first_name')" :message="form.errors.first_name" />
                </div>

                <div class="grid gap-2">
                    <Label for="middle_name">Middle name</Label>
                    <Input
                        id="middle_name"
                        v-model="form.middle_name"
                        type="text"
                        autocomplete="additional-name"
                        placeholder="Santos"
                        :aria-invalid="form.invalid('middle_name')"
                        @blur="form.validate('middle_name')"
                    />
                    <InputError v-if="form.invalid('middle_name')" :message="form.errors.middle_name" />
                </div>

                <div class="grid gap-2">
                    <Label for="last_name">Last name</Label>
                    <Input
                        id="last_name"
                        v-model="form.last_name"
                        type="text"
                        required
                        autocomplete="family-name"
                        placeholder="Dela Cruz"
                        :aria-invalid="form.invalid('last_name')"
                        @blur="form.validate('last_name')"
                    />
                    <InputError v-if="form.invalid('last_name')" :message="form.errors.last_name" />
                </div>

                <div class="grid gap-2">
                    <Label for="email">Email address</Label>
                    <Input
                        id="email"
                        v-model="form.email"
                        type="email"
                        required
                        autocomplete="email"
                        placeholder="email@example.com"
                        :aria-invalid="form.invalid('email')"
                        @blur="form.validate('email')"
                    />
                    <InputError v-if="form.invalid('email')" :message="form.errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="mobile_number">Mobile number</Label>
                    <Input
                        id="mobile_number"
                        v-model="form.mobile_number"
                        type="tel"
                        required
                        autocomplete="tel"
                        placeholder="09XX XXX XXXX"
                        :aria-invalid="form.invalid('mobile_number')"
                        @blur="form.validate('mobile_number')"
                    />
                    <InputError v-if="form.invalid('mobile_number')" :message="form.errors.mobile_number" />
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="grid gap-2">
                        <Label for="date_of_birth">Date of birth</Label>
                        <Input
                            id="date_of_birth"
                            v-model="form.date_of_birth"
                            type="date"
                            required
                            :aria-invalid="form.invalid('date_of_birth')"
                            @blur="form.validate('date_of_birth')"
                        />
                        <InputError v-if="form.invalid('date_of_birth')" :message="form.errors.date_of_birth" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="civil_status">Civil status</Label>
                        <Select v-model="form.civil_status" required @update:model-value="form.validate('civil_status')">
                            <SelectTrigger id="civil_status" class="w-full" :aria-invalid="form.invalid('civil_status')">
                                <SelectValue placeholder="Select status" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectItem value="single">Single</SelectItem>
                                <SelectItem value="married">Married</SelectItem>
                                <SelectItem value="widowed">Widowed</SelectItem>
                                <SelectItem value="separated">Separated</SelectItem>
                            </SelectContent>
                        </Select>
                        <InputError v-if="form.invalid('civil_status')" :message="form.errors.civil_status" />
                    </div>
                </div>
            </div>

            <!-- Step 2: Address & employment -->
            <div v-show="currentStep === 1" class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="address">Home address</Label>
                    <Input
                        id="address"
                        v-model="form.address"
                        type="text"
                        required
                        autocomplete="street-address"
                        placeholder="House no., street, barangay, city/municipality"
                        :aria-invalid="form.invalid('address')"
                        @blur="form.validate('address')"
                    />
                    <InputError v-if="form.invalid('address')" :message="form.errors.address" />
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="grid gap-2">
                        <Label for="occupation">Occupation</Label>
                        <Input
                            id="occupation"
                            v-model="form.occupation"
                            type="text"
                            required
                            placeholder="e.g. Teacher"
                            :aria-invalid="form.invalid('occupation')"
                            @blur="form.validate('occupation')"
                        />
                        <InputError v-if="form.invalid('occupation')" :message="form.errors.occupation" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="source_of_income">Source of income</Label>
                        <Input
                            id="source_of_income"
                            v-model="form.source_of_income"
                            type="text"
                            required
                            placeholder="e.g. Salary"
                            :aria-invalid="form.invalid('source_of_income')"
                            @blur="form.validate('source_of_income')"
                        />
                        <InputError v-if="form.invalid('source_of_income')" :message="form.errors.source_of_income" />
                    </div>
                </div>

                <div class="grid gap-2">
                    <Label for="tin">TIN (tax identification number)</Label>
                    <Input
                        id="tin"
                        v-model="form.tin"
                        type="text"
                        placeholder="XXX-XXX-XXX-XXX"
                        :aria-invalid="form.invalid('tin')"
                        @blur="form.validate('tin')"
                    />
                    <InputError v-if="form.invalid('tin')" :message="form.errors.tin" />
                </div>
            </div>

            <!-- Step 3: Identity verification -->
            <div v-show="currentStep === 2" class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="id_type">Government ID type</Label>
                    <Select v-model="form.id_type" required @update:model-value="form.validate('id_type')">
                        <SelectTrigger id="id_type" class="w-full" :aria-invalid="form.invalid('id_type')">
                            <SelectValue placeholder="Select ID type" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="philid">PhilID (National ID)</SelectItem>
                            <SelectItem value="passport">Passport</SelectItem>
                            <SelectItem value="drivers_license">Driver's license</SelectItem>
                            <SelectItem value="umid">UMID</SelectItem>
                            <SelectItem value="prc">PRC ID</SelectItem>
                            <SelectItem value="postal">Postal ID</SelectItem>
                        </SelectContent>
                    </Select>
                    <InputError v-if="form.invalid('id_type')" :message="form.errors.id_type" />
                </div>

                <div class="grid gap-2">
                    <Label for="id_number">ID number</Label>
                    <Input
                        id="id_number"
                        v-model="form.id_number"
                        type="text"
                        required
                        placeholder="Enter ID number"
                        :aria-invalid="form.invalid('id_number')"
                        @blur="form.validate('id_number')"
                    />
                    <InputError v-if="form.invalid('id_number')" :message="form.errors.id_number" />
                </div>
            </div>

            <!-- Step 4: Security -->
            <div v-show="currentStep === 3" class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="password">Password</Label>
                    <PasswordInput
                        id="password"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                        :passwordrules="passwordRules"
                        :aria-invalid="form.invalid('password')"
                        @blur="form.validate('password')"
                    />
                    <InputError v-if="form.invalid('password')" :message="form.errors.password" />
                </div>

                <div class="grid gap-2">
                    <Label for="password_confirmation">Confirm password</Label>
                    <PasswordInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                        :passwordrules="passwordRules"
                        :aria-invalid="form.invalid('password_confirmation')"
                        @blur="form.validate('password_confirmation')"
                    />
                    <InputError v-if="form.invalid('password_confirmation')" :message="form.errors.password_confirmation" />
                </div>
            </div>

            <!-- Navigation -->
            <div class="flex gap-3">
                <Button
                    v-if="currentStep > 0"
                    type="button"
                    variant="outline"
                    class="flex-1"
                    @click="currentStep -= 1"
                >
                    Back
                </Button>

                <Button
                    v-if="!isLastStep"
                    type="button"
                    class="flex-1"
                    :disabled="form.validating"
                    @click="next"
                >
                    <Spinner v-if="showValidatingSpinner" />
                    Next
                </Button>

                <Button
                    v-else
                    type="submit"
                    class="flex-1"
                    :disabled="form.processing"
                    data-test="register-user-button"
                >
                    <Spinner v-if="form.processing" />
                    Create account
                </Button>
            </div>
        </div>

        <div class="text-center text-sm text-muted-foreground">
            Already have an account?
            <TextLink :href="login()" class="underline underline-offset-4">
                Log in
            </TextLink>
        </div>
    </form>
</template>
