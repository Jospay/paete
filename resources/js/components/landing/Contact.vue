<template>
    <section id="contact-us">
        <h2
            class="bg-secondary-blue py-4 text-center text-xl font-bold text-white"
        >
            Contact Us
        </h2>

        <div
            class="mx-auto flex max-w-7xl flex-col gap-10 p-6 md:flex-row md:p-10"
        >
            <form
                class="flex flex-1 flex-col gap-4 p-6"
                method="POST"
                action="#contact-us"
            >
                <input type="hidden" name="contact_form" value="1" />

                <input
                    type="text"
                    name="name"
                    placeholder="Your Name"
                    required
                    class="w-full rounded-xl border border-[#08B3E5] bg-[#F0FAFE] p-3 text-black focus:ring-1 focus:ring-[#08B3E5] focus:outline-none"
                />

                <input
                    type="email"
                    name="email"
                    placeholder="Email Address"
                    required
                    class="w-full rounded-xl border border-[#08B3E5] bg-[#F0FAFE] p-3 text-black focus:ring-1 focus:ring-[#08B3E5] focus:outline-none"
                />

                <input
                    type="text"
                    name="subject"
                    placeholder="Subject"
                    class="w-full rounded-xl border border-[#08B3E5] bg-[#F0FAFE] p-3 text-black focus:ring-1 focus:ring-[#08B3E5] focus:outline-none"
                />

                <textarea
                    name="message"
                    placeholder="Message"
                    rows="5"
                    class="w-full rounded-xl border border-[#08B3E5] bg-[#F0FAFE] p-3 text-black focus:ring-1 focus:ring-[#08B3E5] focus:outline-none"
                ></textarea>

                <button
                    type="submit"
                    class="mt-2 rounded-xl bg-[#00acee] px-6 py-3 font-semibold text-white transition-colors hover:bg-[#0092c8]"
                >
                    Send Message
                </button>
            </form>

            <div class="flex-1 text-[#00acee]">
                <h3 class="mb-3 text-2xl font-bold">Get In Touch</h3>
                <p class="mb-8 text-[#00acee]">
                    Have questions or need assistance? Our friendly team is
                    ready to help, reach out to us today!
                </p>

                <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2">
                    <div class="flex items-start gap-4">
                        <img
                            src="assets/contact.png"
                            alt="Call"
                            class="mt-1 h-6 w-6 object-contain"
                        />
                        <div>
                            <strong class="block font-bold text-[#00acee]"
                                >Call Us:</strong
                            >
                            <span class="text-[#00acee]">(049) 557 0006</span>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <img
                            src="assets/email.png"
                            alt="Email"
                            class="mt-1 h-6 w-6 object-contain"
                        />
                        <div>
                            <strong class="block font-bold text-[#00acee]"
                                >Email Us:</strong
                            >
                            <span class="text-[#00acee]"
                                >rbpaete1967@gmail.com</span
                            >
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <img
                            src="assets/web.png"
                            alt="Website"
                            class="mt-1 h-6 w-6 object-contain"
                        />
                        <div>
                            <strong class="block font-bold text-[#00acee]"
                                >Website:</strong
                            >
                            <a
                                href="http://www.paetebank.ph"
                                target="_blank"
                                class="text-[#00acee] hover:underline"
                                >www.paetebank.ph</a
                            >
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <img
                            src="assets/address.png"
                            alt="Address"
                            class="mt-1 h-6 w-6 object-contain"
                        />
                        <div class="leading-snug">
                            <strong class="block font-bold text-[#00acee]"
                                >Address:</strong
                            >
                            <span class="mt-1 block"
                                >J. Rizal corner J.V. Quesada Streets, Brgy.
                                Ilaya del Sur, Paete</span
                            >
                        </div>
                    </div>

                    <div class="mt-2 flex flex-col gap-2">
                        <strong class="font-bold text-[#00acee]"
                            >Follow Us On:</strong
                        >
                        <div class="mt-1 flex gap-4">
                            <a href="#"
                                ><img
                                    src="assets/FB.png"
                                    alt="Facebook"
                                    class="h-8 w-8 object-contain transition-opacity hover:opacity-80"
                            /></a>
                            <a href="#"
                                ><img
                                    src="assets/X.png"
                                    alt="X Twitter"
                                    class="h-8 w-8 object-contain transition-opacity hover:opacity-80"
                            /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
