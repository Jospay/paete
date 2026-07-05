<template>
    <section class="relative overflow-hidden bg-[#F7FBFD]">

        <div class="absolute left-0 top-0 z-0 hidden h-full w-[50%] bg-primary-blue lg:block"></div>

        <div class="relative z-10 mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-12">
            
            <!-- Left Side -->
            <div class="flex flex-col justify-center bg-primary-blue px-6 py-12 text-white sm:px-10 md:py-16 lg:col-span-4 lg:py-20">
                <div class="mb-8 h-1 w-24 rounded-full bg-white md:mb-10 md:w-32"></div>

                <h2 class="mb-4 text-3xl font-bold leading-tight md:text-4xl lg:mb-5">
                    Our Mission and
                    <br class="hidden sm:block" />
                    Vision Statement
                </h2>

                <p class="text-base leading-relaxed text-slate-100 md:text-lg">
                    Our mission and vision guide our purpose and direction,
                    ensuring every service we provide stays true to our values
                    and long-term goals for the community.
                </p>

                <div class="mt-8 h-1 w-24 rounded-full bg-white md:mt-10 md:w-32"></div>
            </div>

            <!-- Right Side -->
            <div class="bg-[#F8FCFE] px-5 py-12 sm:px-8 md:py-16 lg:col-span-8 lg:px-12">

                <!-- Mission & Vision Cards -->
                <div class="grid grid-cols-1 gap-x-8 gap-y-16 md:grid-cols-2 md:gap-y-8">

                    <!-- Mission -->
                    <div class="relative mt-5 rounded-3xl bg-white pt-12 shadow-[0_3px_8px_rgba(0,102,255,0.24)]">
                        <div class="absolute -top-10 left-1/2 flex -translate-x-1/2 items-center justify-center rounded-full border-4 border-white bg-white shadow-[0_3px_8px_rgba(0,102,255,0.24)]">
                            <img src="assets/mission.png" class="h-16 w-16 object-contain" alt="Mission Icon">
                        </div>

                        <div class="bg-secondary-blue py-3 text-center">
                            <h3 class="text-2xl font-bold tracking-wide text-white md:text-3xl">
                                MISSION
                            </h3>
                        </div>

                        <div class="p-6 text-center sm:p-8">
                            <p class="text-base leading-relaxed text-secondary-blue md:text-lg">
                                To promote financial inclusion and growth in
                                rural communities by providing safe, simple,
                                and sustainable banking solutions.
                            </p>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="relative mt-5 rounded-3xl bg-white pt-12 shadow-[0_3px_8px_rgba(0,102,255,0.24)]">
                        <div class="absolute -top-10 left-1/2 flex -translate-x-1/2 items-center justify-center rounded-full border-4 border-white bg-white shadow-[0_3px_8px_rgba(0,102,255,0.24)]">
                            <img src="assets/vision.png" class="h-16 w-16 object-contain" alt="Vision Icon">
                        </div>

                        <div class="bg-secondary-blue py-3 text-center">
                            <h3 class="text-2xl font-bold tracking-wide text-white md:text-3xl">
                                VISION
                            </h3>
                        </div>

                        <div class="p-6 text-center sm:p-8">
                            <p class="text-base leading-relaxed text-secondary-blue md:text-lg">
                                To be the most trusted and accessible rural
                                bank in Laguna and Southern Luzon, driven by
                                integrity, innovation, and community care.
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Team Image -->
                <div class="mt-12 overflow-hidden rounded-3xl border-4 border-secondary-blue shadow-lg md:mt-16">
                    <img
                        src="assets/team.png"
                        alt="Our Team"
                        class="h-auto w-full object-cover"
                    />
                </div>

            </div>
        </div>
    </section>
</template>