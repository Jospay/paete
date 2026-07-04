<template>
    <section
        class="bg-[url('assets/aboutbg.jpg')] bg-cover bg-center bg-no-repeat py-8"
    >
        <div class="mx-auto max-w-7xl px-4">

            <!-- Section Title -->
            <div class="mb-14 text-center">
                <h2
                    class="text-3xl font-extrabold text-secondary-blue md:text-4xl"
                >
                    About Us
                </h2>

                <div
                    class="mx-auto mt-4 h-1 w-52 rounded-full bg-secondary-blue"
                ></div>
            </div>

            <div
                class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12"
            >

                <!-- Illustration -->
                <div class="flex justify-center lg:col-span-6">
                    <img
                        src="assets/aboutvector.png"
                        alt="About Rural Bank"
                        class="w-full max-w-xl object-contain"
                    />
                </div>

                <!-- Right Content -->
                <div class="space-y-8 lg:col-span-6">

                    <!-- Who We Are -->
                    <div
                        class="rounded-3xl bg-[#08B3E5] p-8 text-white shadow-xl"
                    >
                        <h3 class="mb-2 text-2xl font-bold">
                            Who we are?
                        </h3>

                        <p class="text-lg leading-6">
                            Rural Bank of Paete Inc. is a proud
                            community-based bank committed to delivering
                            reliable, affordable, and inclusive financial
                            services to individuals, farmers, fisherfolk,
                            and micro-entrepreneurs in Laguna and
                            neighboring areas.
                        </p>
                    </div>

                    <!-- Our Story -->
                    <div
                        class="rounded-3xl bg-secondary-blue p-8 text-white shadow-xl"
                    >
                        <h3 class="mb-2 text-2xl font-bold">
                            Our Story
                        </h3>

                        <p class="text-lg leading-6">
                            Founded in 1966, our bank has been a pillar of
                            strength for the local economy. We are passionate
                            about empowering our clients, whether it's helping
                            you start your savings journey or funding your
                            farm or small business.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </section>
</template>
