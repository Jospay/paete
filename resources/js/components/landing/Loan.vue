<template>
    <section class="bg-[url('assets/loanbg.jpg')] bg-cover bg-center bg-no-repeat py-8">


        <div class="relative mx-auto max-w-7xl px-4">

            <!-- Title -->
            <div class="mb-12 flex justify-center">
                <div
                    class="rounded-full bg-secondary-blue px-12 py-3 shadow-lg"
                >
                    <h2 class="text-3xl font-bold text-white">
                        Loan Services
                    </h2>
                </div>
            </div>

            <div
                class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12"
            >

                <!-- Left Illustration -->
                <div class="flex justify-center lg:col-span-5">
                    <img
                        src="assets/loan.png"
                        alt="Loan Services"
                        class="w-full max-w-sm object-contain"
                    />
                </div>

                <!-- Divider -->
                <div
                    class="hidden lg:flex justify-center lg:col-span-1"
                >
                    <div class="h-96 w-1 bg-secondary-blue"></div>
                </div>

                <!-- Right Content -->
                <div class="relative z-10 lg:col-span-6">

                    <h3
                        class="mb-8 text-2xl font-bold leading-tight text-secondary-blue"
                    >
                        Whether you're growing your farm,
                        starting a business, or facing an
                        emergency, we have a loan for you.
                    </h3>

                    <ul
                        class="mb-10 ps-5 text-xl text-secondary-blue"
                    >
                        <li>✔ Competitive interest rates</li>
                        <li>✔ Fast approval process</li>
                        <li>✔ Friendly local service</li>
                        <li>✔ Flexible payment terms</li>
                    </ul>

                    <div
                        class="flex flex-col gap-4 sm:flex-row"
                    >
                        <button
                            class="rounded-xl border-2 bg-white border-primary-blue px-8 py-3 text-xl text-primary-blue transition hover:bg-primary-blue hover:text-white"
                        >
                            Check Loan Requirements
                        </button>

                        <button
                            class="rounded-xl bg-secondary-blue px-8 py-3 text-xl text-white shadow-lg transition hover:bg-primary-blue"
                        >
                            Apply for Loan Now
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </section>
</template>
