<template>
    <section class="bg-[#F7FBFD] border-t-[12px] border-secondary-blue">
        <div class="mx-auto max-w-7xl px-4">

            <!-- Title -->
            <div class="mb-14 flex justify-center">
                <div
                    class="rounded-b-3xl bg-secondary-blue px-14 py-5 shadow-lg"
                >
                    <h2 class="text-4xl font-bold text-white">
                        News & Updates
                    </h2>
                </div>
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">

                <!-- Card -->
                <div
                    class="overflow-hidden rounded-3xl border-4 border-primary-blue bg-white shadow-xl transition duration-300 hover:-translate-y-2 hover:shadow-2xl"
                >

                    <!-- Date Ribbon -->
                    <div
                        class="rounded-br-[40px] bg-[#F04B45] px-8 py-4"
                    >
                        <span class="text-3xl font-bold text-white">
                            August 5, 2025
                        </span>
                    </div>

                    <!-- Image -->
                    <img
                        src="assets/mobile.png"
                        class="h-72 w-full object-contain bg-white p-6"
                    />

                    <!-- Title -->
                    <div
                        class="bg-primary-blue px-6 py-5 text-center"
                    >
                        <h3
                            class="text-2xl font-bold leading-tight text-white"
                        >
                            New Mobile Banking App Launched!
                        </h3>
                    </div>

                    <!-- Button -->
                    <div class="flex justify-center bg-white py-6">
                        <button
                            class="rounded-lg bg-[#18B000] px-8 py-3 text-lg font-semibold text-white transition hover:bg-green-700"
                        >
                            View Details
                        </button>
                    </div>

                </div>

                <!-- Card -->
                <div
                    class="overflow-hidden rounded-3xl border-4 border-primary-blue bg-white shadow-xl transition duration-300 hover:-translate-y-2 hover:shadow-2xl"
                >

                    <div class="rounded-br-[40px] bg-[#F04B45] px-8 py-4">
                        <span class="text-3xl font-bold text-white">
                            July 20, 2025
                        </span>
                    </div>

                    <img
                        src="assets/news2.png"
                        class="h-72 w-full object-contain bg-white p-6"
                    />

                    <div class="bg-primary-blue px-6 py-5 text-center">
                        <h3
                            class="text-2xl font-bold leading-tight text-white"
                        >
                            Higher Interest Rates on Time Deposits
                        </h3>
                    </div>

                    <div class="flex justify-center bg-white py-6">
                        <button
                            class="rounded-lg bg-[#18B000] px-8 py-3 text-lg font-semibold text-white transition hover:bg-green-700"
                        >
                            View Details
                        </button>
                    </div>

                </div>

                <!-- Card -->
                <div
                    class="overflow-hidden rounded-3xl border-4 border-primary-blue bg-white shadow-xl transition duration-300 hover:-translate-y-2 hover:shadow-2xl"
                >

                    <div class="rounded-br-[40px] bg-[#F04B45] px-8 py-4">
                        <span class="text-3xl font-bold text-white">
                            July 1, 2025
                        </span>
                    </div>

                    <img
                        src="assets/news3.png"
                        class="h-72 w-full object-contain bg-white p-6"
                    />

                    <div class="bg-primary-blue px-6 py-5 text-center">
                        <h3
                            class="text-2xl font-bold leading-tight text-white"
                        >
                            Branch Renovation Completed
                        </h3>
                    </div>

                    <div class="flex justify-center bg-white py-6">
                        <button
                            class="rounded-lg bg-[#18B000] px-8 py-3 text-lg font-semibold text-white transition hover:bg-green-700"
                        >
                            View Details
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </section>
</template>
