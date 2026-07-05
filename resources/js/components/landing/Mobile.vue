<template>
    <!-- Main Background Container (Cleaned up the accidental flex classes here) -->
    <div
        class="relative mx-auto mt-5 overflow-hidden bg-[url('/assets/mbanking%20bg.jpg')] bg-cover bg-center bg-no-repeat shadow-sm"
    >
        <section class="container mx-auto px-4 py-8 md:px-8" id="mobile">
            <!-- Mobile Banking Label: Reduced margin-top (mt-2 instead of my-6) -->
            <h2
                class="mx-auto mt-2 mb-8 w-fit rounded-full bg-white px-5 py-3 text-center text-2xl font-bold text-[#08B3E5] shadow-md md:text-3xl"
            >
                Mobile Banking
            </h2>

            <!-- Flex Container: Added max-w-4xl and mx-auto to tightly center the image and text -->
            <div
                class="mx-auto flex max-w-4xl flex-col items-center justify-between gap-10 lg:flex-row lg:gap-16"
            >
                <!-- Left: Phone Mockup -->
                <div class="relative z-10 hidden flex-1 justify-end lg:flex">
                    <img
                        src="/assets/mobile.png"
                        alt="Mobile Banking"
                        class="max-w-[220px] object-contain drop-shadow-2xl transition-transform duration-500 hover:-translate-y-2 xl:max-w-[260px]"
                    />
                </div>

                <!-- Right: Text Content -->
                <div
                    class="relative z-10 w-full flex-1 text-center lg:text-left"
                >
                    <h1
                        class="mb-6 text-4xl leading-tight font-extrabold text-white drop-shadow-md md:text-5xl"
                    >
                        Your bank in your hands.
                    </h1>

                    <p
                        class="mb-8 text-lg leading-relaxed font-medium text-white drop-shadow-md md:text-xl"
                    >
                        Manage your savings, transfer funds, and apply for
                        loans, anytime, anywhere...
                    </p>

                    <a
                        href="#"
                        class="inline-block rounded-full bg-[#08B3E5] px-8 py-3 text-lg font-bold text-white shadow-lg transition-all hover:-translate-y-1 hover:bg-[#0092c8] hover:shadow-xl"
                    >
                        Coming Soon!
                    </a>
                </div>
            </div>
        </section>
    </div>
</template>
