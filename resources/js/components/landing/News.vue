<template>
    <!-- Added bottom padding (pb-12 etc.) so the cards don't touch the footer or next section -->
    <section id="news" class="border-t-[12px] border-secondary-blue bg-[#F7FBFD] pb-12 md:pb-16 lg:pb-20">
        <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">

            <!-- Title -->
            <div class="mb-10 flex justify-center md:mb-14">
                <div class="rounded-b-3xl bg-secondary-blue px-8 py-3 shadow-lg sm:px-10 md:px-14 md:py-5">
                    <h2 class="text-2xl font-bold tracking-tight text-white sm:text-3xl md:text-4xl">
                        News & Updates
                    </h2>
                </div>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:gap-10 xl:grid-cols-3">

                <!-- Card 1 -->
                <div class="flex flex-col overflow-hidden rounded-3xl border-4 border-primary-blue bg-white shadow-xl transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                    <!-- Date Ribbon -->
                    <!-- Added w-max so the ribbon neatly wraps the text and exposes the rounded corner properly -->
                    <div class="w-max rounded-br-[40px] bg-[#F04B45] px-6 py-3 md:px-8 md:py-4">
                        <span class="text-xl font-bold text-white md:text-2xl lg:text-3xl">
                            August 5, 2025
                        </span>
                    </div>

                    <!-- Image -->
                    <img
                        src="assets/mobile.png"
                        alt="Mobile App"
                        class="h-56 w-full object-contain bg-white p-6 sm:h-64 lg:h-72"
                    />

                    <!-- Title -->
                    <!-- Added flex-grow to ensure all title blocks stretch identically if titles are varying lengths -->
                    <div class="flex flex-grow flex-col justify-center bg-primary-blue px-5 py-4 text-center sm:px-6 sm:py-5">
                        <h3 class="text-xl font-bold leading-tight text-white md:text-2xl">
                            New Mobile Banking App Launched!
                        </h3>
                    </div>

                    <!-- Button -->
                    <div class="flex justify-center bg-white py-5 sm:py-6">
                        <button class="rounded-lg bg-[#18B000] px-6 py-2 text-base font-semibold text-white transition hover:bg-green-700 md:px-8 md:py-3 md:text-lg">
                            View Details
                        </button>
                    </div>

                </div>

                <!-- Card 2 -->
                <div class="flex flex-col overflow-hidden rounded-3xl border-4 border-primary-blue bg-white shadow-xl transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                    <div class="w-max rounded-br-[40px] bg-[#F04B45] px-6 py-3 md:px-8 md:py-4">
                        <span class="text-xl font-bold text-white md:text-2xl lg:text-3xl">
                            July 20, 2025
                        </span>
                    </div>

                    <img
                        src="assets/news2.png"
                        alt="Time Deposits"
                        class="h-56 w-full object-contain bg-white p-6 sm:h-64 lg:h-72"
                    />

                    <div class="flex flex-grow flex-col justify-center bg-primary-blue px-5 py-4 text-center sm:px-6 sm:py-5">
                        <h3 class="text-xl font-bold leading-tight text-white md:text-2xl">
                            Higher Interest Rates on Time Deposits
                        </h3>
                    </div>

                    <div class="flex justify-center bg-white py-5 sm:py-6">
                        <button class="rounded-lg bg-[#18B000] px-6 py-2 text-base font-semibold text-white transition hover:bg-green-700 md:px-8 md:py-3 md:text-lg">
                            View Details
                        </button>
                    </div>

                </div>

                <!-- Card 3 -->
                <div class="flex flex-col overflow-hidden rounded-3xl border-4 border-primary-blue bg-white shadow-xl transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                    <div class="w-max rounded-br-[40px] bg-[#F04B45] px-6 py-3 md:px-8 md:py-4">
                        <span class="text-xl font-bold text-white md:text-2xl lg:text-3xl">
                            July 1, 2025
                        </span>
                    </div>

                    <img
                        src="assets/news3.png"
                        alt="Branch Renovation"
                        class="h-56 w-full object-contain bg-white p-6 sm:h-64 lg:h-72"
                    />

                    <div class="flex flex-grow flex-col justify-center bg-primary-blue px-5 py-4 text-center sm:px-6 sm:py-5">
                        <h3 class="text-xl font-bold leading-tight text-white md:text-2xl">
                            Branch Renovation Completed
                        </h3>
                    </div>

                    <div class="flex justify-center bg-white py-5 sm:py-6">
                        <button class="rounded-lg bg-[#18B000] px-6 py-2 text-base font-semibold text-white transition hover:bg-green-700 md:px-8 md:py-3 md:text-lg">
                            View Details
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </section>
</template>
