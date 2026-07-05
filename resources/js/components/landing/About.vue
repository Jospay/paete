<template>
    <section class="bg-[url('assets/aboutbg.jpg')] bg-cover bg-center bg-no-repeat py-12 md:py-16 lg:py-20">
        <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">

            <!-- Section Title -->
            <div class="mb-10 text-center md:mb-14">
                <h2 class="text-3xl font-extrabold tracking-tight text-secondary-blue md:text-4xl lg:text-5xl">
                    About Us
                </h2>

                <div class="mx-auto mt-4 h-1 w-32 rounded-full bg-secondary-blue md:w-52"></div>
            </div>

            <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-12 lg:gap-16">

                <!-- Illustration -->
                <div class="flex justify-center lg:col-span-6">
                    <img
                        src="assets/aboutvector.png"
                        alt="About Rural Bank"
                        class="w-full max-w-sm object-contain sm:max-w-md lg:max-w-xl"
                    />
                </div>

                <!-- Right Content -->
                <div class="space-y-6 lg:col-span-6 lg:space-y-8">

                    <!-- Who We Are -->
                    <div class="rounded-3xl bg-[#08B3E5] p-6 text-white shadow-xl sm:p-8">
                        <h3 class="mb-3 text-xl font-bold tracking-wide md:text-2xl">
                            Who we are?
                        </h3>

                        <p class="text-base leading-relaxed text-slate-50 md:text-lg">
                            Rural Bank of Paete Inc. is a proud
                            community-based bank committed to delivering
                            reliable, affordable, and inclusive financial
                            services to individuals, farmers, fisherfolk,
                            and micro-entrepreneurs in Laguna and
                            neighboring areas.
                        </p>
                    </div>

                    <!-- Our Story -->
                    <div class="rounded-3xl bg-secondary-blue p-6 text-white shadow-xl sm:p-8">
                        <h3 class="mb-3 text-xl font-bold tracking-wide md:text-2xl">
                            Our Story
                        </h3>

                        <p class="text-base leading-relaxed text-slate-100 md:text-lg">
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