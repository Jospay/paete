<template>
    <section class="bg-[#F7FBFD] relative">
        <div class="z-0 w-[50%] h-full absolute left-0 bg-primary-blue"></div>
        <div
            class="mx-auto grid relative max-w-7xl grid-cols-1 overflow-hidden lg:grid-cols-12"
        >
            <!-- Left Side -->
            <div
                class="flex flex-col justify-center bg-primary-blue px-10 py-12 text-white lg:col-span-4"
            >
                <div class="mb-10 h-1 w-32 rounded-full bg-white"></div>

                <h2 class="mb-3 text-3xl font-bold leading-tight">
                    Our Mission and
                    <br />
                    Vision Statement
                </h2>

                <p class="text-lg leading-6 text-slate-100">
                    Our mission and vision guide our purpose and direction,
                    ensuring every service we provide stays true to our values
                    and long-term goals for the community.
                </p>

                <div class="mt-10 h-1 w-32 rounded-full bg-white"></div>
            </div>

            <!-- Right Side -->
            <div class="bg-[#F8FCFE] py-10 px-8 lg:col-span-8">

                <!-- Mission & Vision Cards -->
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">

                    <!-- Mission -->
                    <div
                        class="relative rounded-3xl bg-white pt-12 mt-5" style="box-shadow: rgba(0, 102, 255, 0.24) 0px 3px 8px;"
                    >
                        <div
                            class="absolute -top-10 left-1/2 flex -translate-x-1/2 items-center justify-center rounded-full border-4 border-white" style="box-shadow: rgba(0, 102, 255, 0.24) 0px 3px 8px;"
                        >
                            <img src="assets/mission.png" class="h-16 w-16" alt="Mission Icon">
                        </div>

                        <div
                            class=" bg-secondary-blue py-2 text-center"
                        >
                            <h3 class="text-3xl font-bold text-white">
                                MISSION
                            </h3>
                        </div>

                        <div class="p-6 text-center">
                            <p
                                class="text-lg leading-6 text-secondary-blue"
                            >
                                To promote financial inclusion and growth in
                                rural communities by providing safe, simple,
                                and sustainable banking solutions.
                            </p>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div
                        class="relative rounded-3xl bg-white pt-14 mt-5" style="box-shadow: rgba(0, 102, 255, 0.24) 0px 3px 8px;"
                    >
                      <div
                            class="absolute -top-10 left-1/2 flex -translate-x-1/2 items-center justify-center rounded-full border-4 border-white" style="box-shadow: rgba(0, 102, 255, 0.24) 0px 3px 8px;"
                        >
                            <img src="assets/vision.png" class="h-16 w-16" alt="Vision Icon">
                        </div>

                      <div
                            class=" bg-secondary-blue py-2 text-center"
                        >
                            <h3 class="text-3xl font-bold text-white">
                                VISION
                            </h3>
                        </div>

                        <div class="p-6 text-center">
                            <p
                                class="text-lg leading-6 text-secondary-blue"
                            >
                                To be the most trusted and accessible rural
                                bank in Laguna and Southern Luzon, driven by
                                integrity, innovation, and community care.
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Team Image -->
                <div class="mt-10 overflow-hidden rounded-3xl border-4 border-secondary-blue shadow-lg">
                    <img
                        src="assets/team.png"
                        alt="Our Team"
                        class="h-[180px] w-full object-cover"
                    />
                </div>

            </div>
        </div>
    </section>
</template>
