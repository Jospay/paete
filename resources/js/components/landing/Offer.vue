<template>
    <!-- What We Offer Section -->
    <section id="offer" class="bg-primary-blue py-12">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-10 px-4 lg:grid-cols-12">

            <!-- Right Illustration (Now appears FIRST on mobile, but moves to the right on desktop) -->
            <div class="order-first flex justify-center lg:col-span-6 lg:order-last lg:justify-end">
                <img
                    src="assets/offer.png"
                    alt="Products and Services"
                    class="h-auto w-full max-w-lg object-contain md:max-w-xl lg:max-w-2xl"
                />
            </div>

            <!-- Left Content (Appears underneath the image on mobile, and on the left side on desktop) -->
            <div class="lg:col-span-6">
                <h2 class="mb-3 text-2xl font-bold text-white sm:text-3xl md:text-4xl">
                    What We Offer?
                </h2>

                <p class="mb-6 max-w-lg text-base text-slate-100 sm:text-lg">
                    Discover our range of financial services designed to help
                    you save, grow, and manage your money with trust and
                    convenience.
                </p>

                <div class="mb-4 inline-block rounded-xl bg-white px-5 py-2 shadow-md sm:px-6">
                    <h3 class="text-lg font-bold text-secondary-blue sm:text-xl">
                        Products we offer:
                    </h3>
                </div>

                <div class="rounded-2xl bg-white p-6 shadow-xl sm:p-8">
                    <div class="flex flex-col gap-6 text-secondary-blue md:flex-row md:gap-8">
                        <!-- Loans Column 1 -->
                        <div class="flex-1">
                            <h4 class="mb-2 text-xl font-bold sm:mb-3 sm:text-2xl">Loans</h4>
                            <ul class="space-y-1 text-base sm:text-lg lg:text-xl">
                                <li>• Agricultural Loan</li>
                                <li>• Industrial Loan</li>
                                <li>• Commercial Loan</li>
                                <li>• Medical Loan</li>
                                <li>• Housing Loan</li>
                            </ul>
                        </div>

                        <!-- Loans Column 2 -->
                        <div class="flex-1 md:pt-11">
                            <ul class="space-y-1 text-base sm:text-lg lg:text-xl">
                                <li>• Salary Loan</li>
                                <li>• O.F.W. Loan</li>
                                <li>• Pension Loan / SSS / GSIS</li>
                                <li>• Other Government Supervised Loan</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Deposit Row -->
                    <div class="mt-6 text-secondary-blue border-t border-slate-100 pt-5">
                        <h4 class="mb-2 text-xl font-bold sm:mb-3 sm:text-2xl">Deposit</h4>
                        <ul class="space-y-1 text-base sm:text-lg lg:text-xl">
                            <li>• Savings Account Deposit</li>
                            <li>• Time Deposit</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Cards Info Section -->
    <section class="bg-[#F4F8FB] py-10 border-b-[12px] border-secondary-blue">
        <div class="mx-auto grid grid-cols-1 gap-6 px-4 sm:grid-cols-2 lg:max-w-7xl lg:grid-cols-12">

            <!-- Members Card -->
            <div class="rounded-3xl bg-[#08B3E5] p-6 text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl sm:p-8 lg:col-span-5">
                <h2 class="mb-3 text-lg font-bold sm:text-xl">
                    Members
                </h2>
                <ul class="space-y-1 text-base leading-relaxed sm:text-lg lg:text-xl">
                    <li>• Philippine Deposit Insurance Corporation</li>
                    <li>• Rural Bankers Association of the Philippines</li>
                    <li>• Confederation of Southern Tagalog Rural Bank</li>
                </ul>
            </div>

            <!-- Services Card -->
            <div class="rounded-3xl bg-[#08B3E5] p-6 text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl sm:p-8 lg:col-span-4">
                <h2 class="mb-3 text-lg font-bold sm:text-xl">
                    Services We Offer
                </h2>
                <ul class="space-y-1 text-base leading-relaxed sm:text-lg lg:text-xl">
                    <li>• Bancnet - POS (Point of Sale)</li>
                    <li class="pl-5">- Cash Out</li>
                </ul>
            </div>

            <!-- CTA Card -->
            <div class="flex items-center rounded-3xl bg-secondary-blue p-6 text-white shadow-lg transition duration-300 hover:-translate-y-1 hover:shadow-xl sm:col-span-2 sm:p-8 lg:col-span-3">
                <h2 class="text-lg font-bold leading-tight sm:text-xl">
                    Let us know what <br class="hidden sm:inline">
                    you want...
                </h2>
            </div>

        </div>
    </section>
</template>
