<template>
    <section id="loan" class="bg-[url('assets/loanbg.jpg')] bg-cover bg-center bg-no-repeat py-12 md:py-16 lg:py-20">

        <div class="relative mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">

            <!-- Title -->
            <div class="mb-10 flex justify-center md:mb-14">
                <div class="rounded-full bg-secondary-blue px-8 py-2.5 shadow-lg sm:px-10 md:px-12 md:py-3">
                    <h2 class="text-2xl font-bold tracking-tight text-white md:text-3xl">
                        Loan Services
                    </h2>
                </div>
            </div>

            <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-12 lg:gap-8">

                <!-- Left Illustration -->
                <div class="flex justify-center lg:col-span-5">
                    <img
                        src="assets/loan.png"
                        alt="Loan Services"
                        class="w-full max-w-sm object-contain sm:max-w-md lg:max-w-full"
                    />
                </div>

                <!-- Divider -->
                <div class="hidden justify-center lg:col-span-1 lg:flex lg:items-center">
                    <div class="h-72 w-1 rounded-full bg-secondary-blue xl:h-96"></div>
                </div>

                <!-- Right Content -->
                <div class="relative z-10 lg:col-span-6">

                    <h3 class="mb-6 text-xl font-bold leading-tight text-secondary-blue sm:text-2xl md:mb-8 lg:text-3xl">
                        Whether you're growing your farm,
                        starting a business, or facing an
                        emergency, we have a loan for you.
                    </h3>

                    <ul class="mb-8 space-y-3 text-lg font-medium text-secondary-blue md:mb-10 lg:text-xl">
                        <li class="flex items-start sm:items-center">
                            <span class="mr-3 shrink-0 text-primary-blue">✔</span>
                            <span>Competitive interest rates</span>
                        </li>
                        <li class="flex items-start sm:items-center">
                            <span class="mr-3 shrink-0 text-primary-blue">✔</span>
                            <span>Fast approval process</span>
                        </li>
                        <li class="flex items-start sm:items-center">
                            <span class="mr-3 shrink-0 text-primary-blue">✔</span>
                            <span>Friendly local service</span>
                        </li>
                        <li class="flex items-start sm:items-center">
                            <span class="mr-3 shrink-0 text-primary-blue">✔</span>
                            <span>Flexible payment terms</span>
                        </li>
                    </ul>

                    <div class="flex flex-col gap-4 sm:flex-row">
                        <button class="w-full rounded-xl border-2 border-primary-blue bg-white px-6 py-3 text-base font-semibold text-primary-blue transition hover:bg-primary-blue hover:text-white sm:w-auto md:px-8 md:text-lg">
                            Check Loan Requirements
                        </button>

                        <button class="w-full rounded-xl bg-secondary-blue px-6 py-3 text-base font-semibold text-white shadow-lg transition hover:bg-primary-blue sm:w-auto md:px-8 md:text-lg">
                            Apply for Loan Now
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </section>
</template>
