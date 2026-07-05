<script setup lang="ts">
import { computed } from 'vue';

const currentYear = computed(() => new Date().getFullYear());
</script>

<template>
    <footer class="bg-primary-blue text-white">
        <div class="mx-auto max-w-7xl px-4">
            <div class="grid grid-cols-1 gap-8 py-10 md:grid-cols-12">
                <!-- Company Info -->
                <div class="px-5 md:col-span-4">
                    <h3 class="mb-2 text-2xl font-bold">
                        Rural Bank of Paete Inc.
                    </h3>
                    <p class="text-white/90">Maniguro, Magbangko, Umasenso</p>
                </div>

                <!-- Navigation -->
                <div class="px-5 md:col-span-2">
                    <h4 class="mb-3 text-xl font-bold">Navigation</h4>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="hover:text-white/80">Home</a>
                        </li>
                        <li>
                            <a href="#about-us" class="hover:text-white/80"
                                >About Us</a
                            >
                        </li>
                        <li>
                            <a href="#contact-us" class="hover:text-white/80"
                                >Contact Us</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div class="px-5 md:col-span-4">
                    <h4 class="mb-3 text-xl font-bold">Quick Links</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <ul class="space-y-2">
                            <li>
                                <a href="#what" class="hover:text-white/80"
                                    >What We Offer</a
                                >
                            </li>
                            <li>
                                <a href="#loan" class="hover:text-white/80"
                                    >Loan Services</a
                                >
                            </li>
                            <li>
                                <a href="#news" class="hover:text-white/80"
                                    >News & Updates</a
                                >
                            </li>
                        </ul>
                        <ul class="space-y-2">
                            <li>
                                <a href="#mobile" class="hover:text-white/80"
                                    >Mobile Banking</a
                                >
                            </li>
                            <li>
                                <a href="#security" class="hover:text-white/80"
                                    >Security & Trust</a
                                >
                            </li>
                            <li>
                                <a href="#why" class="hover:text-white/80"
                                    >Why Choose Us?</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Services -->
                <div class="px-5 md:col-span-2">
                    <h4 class="mb-3 text-xl font-bold">Services</h4>
                    <ul>
                        <li>
                            <a href="#" class="hover:text-white/80">
                                Bancnet - POS (Point of Sale)<br />- Cash Out
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Feedback (placeholder for now) -->
                <div class="px-5 md:col-span-8">
                    <h4 class="mb-3 text-xl font-bold">Feedback</h4>
                    <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                        <div class="space-y-3">
                            <input
                                type="text"
                                placeholder="Your Name"
                                disabled
                                class="w-full rounded bg-white px-4 py-3 text-sm text-gray-700 placeholder-gray-500"
                            />
                            <input
                                type="text"
                                placeholder="Occupation"
                                disabled
                                class="w-full rounded bg-white px-4 py-3 text-sm text-gray-700 placeholder-gray-500"
                            />
                        </div>
                        <div class="relative">
                            <textarea
                                placeholder="Feedback"
                                disabled
                                class="h-full min-h-[104px] w-full resize-none rounded bg-white px-4 py-3 text-sm text-gray-700 placeholder-gray-500"
                            />
                            <button
                                type="button"
                                disabled
                                class="absolute right-3 bottom-3 rounded bg-primary-blue px-4 py-1.5 text-sm font-semibold text-white"
                            >
                                Send
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Note -->
        <div
            class="flex items-center justify-between bg-[#DBF3FA] px-4 py-3 text-primary-blue"
        >
            <p class="mb-0">
                © {{ currentYear }} Rural Bank of Paete Inc. - All Rights
                Reserved
            </p>

            <a
                href="https://bb88advertising.com/"
                target="_blank"
                class="text-primary-blue no-underline"
            >
                BB88 Advertising & Digital Solutions Inc.
            </a>
        </div>
    </footer>
</template>
