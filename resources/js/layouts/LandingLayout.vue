<template>
    <div
        class="relative min-h-screen overflow-x-hidden bg-gray-50/50 font-sans"
    >
        
        <div
            class="absolute right-0 bottom-0 left-0 z-0 h-[155px] bg-white"
        ></div>

        <!-- Header -->
        <header class="relative z-20">
            <div class="sticky top-0 z-50 w-full bg-primary-blue shadow-md">
                <div class="container mx-auto px-4">
                    <div
                        class="flex min-h-[75px] items-center justify-between py-2"
                    >
                        <div class="flex items-center gap-3">
                            <div
                                class="flex h-[60px] w-[60px] items-center justify-center rounded-full bg-white text-xl font-bold text-[#08B3E5]"
                            >
                                RB
                            </div>

                            <div class="text-white">
                                <h1 class="text-lg leading-tight font-bold">
                                    RB Paete Workspace
                                </h1>

                                <p class="text-[20px] leading-tight">
                                    Rural Bank of <br />
                                    Paete Inc.
                                </p>
                            </div>
                        </div>

                        <nav class="flex items-center gap-5">
                            <div
                                class="relative hidden h-10 w-72 overflow-hidden rounded-full bg-white lg:flex"
                            >
                                <input
                                    type="text"
                                    placeholder="Search..."
                                    class="h-full w-full bg-transparent px-4 pr-12 text-sm text-gray-700 placeholder-gray-400 outline-none"
                                />

                                <button
                                    type="button"
                                    class="absolute top-1/2 right-1 flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-full bg-primary-blue text-white transition-colors hover:bg-secondary-blue"
                                >
                                    <i
                                        class="fa-solid fa-magnifying-glass text-sm"
                                    ></i>
                                </button>
                            </div>

                            <ul
                                class="hidden items-center gap-4 text-lg text-white lg:flex"
                            >
                                <li class="ps-3">
                                    <a href="#about-us">About Us</a>
                                </li>
                                <li class="pe-4">
                                    <a href="#contact-us">Contact Us</a>
                                </li>

                                <li>
                                    <a
                                        href="#account"
                                        class="rounded-lg bg-white px-8 py-2 text-primary-blue"
                                    >
                                        Log in
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="bg-[#F7FBFD]">
                    <div class="container mx-auto px-4">
                        <ul
                            class="text-md flex flex-wrap justify-center gap-x-6 gap-y-2 py-2.5 text-secondary-blue"
                        >
                            <li><a href="#offer">What We Offer</a></li>
                            <li><a href="#loan">Loan Services</a></li>
                            <li><a href="#news">News & Updates</a></li>
                            <li><a href="#mobile">Mobile Banking</a></li>
                            <li><a href="#security">Security & Trust</a></li>
                            <li><a href="#why">Why Choose Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- Welcome.vue content -->
        <main class="relative z-20">
            <slot />
        </main>
    </div>
</template>
