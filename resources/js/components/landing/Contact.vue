<template>
  <section id="contact-us">
    <h2 class="py-4 text-center text-xl font-bold text-white bg-[#095390]">Contact Us</h2>

    <div class="flex flex-col md:flex-row gap-10 max-w-7xl mx-auto p-6 md:p-10">

      <form class="flex-1 flex flex-col gap-4 p-6" method="POST" action="#contact-us">
        <input type="hidden" name="contact_form" value="1">

        <input type="text" name="name" placeholder="Your Name" required
          class="w-full p-3 rounded-xl border border-[#08B3E5] text-black bg-[#F0FAFE] focus:outline-none focus:ring-1 focus:ring-[#08B3E5]">

        <input type="email" name="email" placeholder="Email Address" required
          class="w-full p-3 rounded-xl border border-[#08B3E5] text-black bg-[#F0FAFE] focus:outline-none focus:ring-1 focus:ring-[#08B3E5]">

        <input type="text" name="subject" placeholder="Subject"
          class="w-full p-3 rounded-xl border border-[#08B3E5] text-black bg-[#F0FAFE] focus:outline-none focus:ring-1 focus:ring-[#08B3E5]">

        <textarea name="message" placeholder="Message" rows="5"
          class="w-full p-3 rounded-xl border border-[#08B3E5] text-black bg-[#F0FAFE] focus:outline-none focus:ring-1 focus:ring-[#08B3E5]"></textarea>

        <button type="submit" class="mt-2 py-3 px-6 rounded-xl font-semibold text-white bg-[#00acee] hover:bg-[#0092c8] transition-colors">
          Send Message
        </button>
      </form>

      <div class="flex-1 text-[#00acee]">
        <h3 class="text-2xl font-bold mb-3">Get In Touch</h3>
        <p class="mb-8 text-[#00acee]">Have questions or need assistance? Our friendly team is ready to help, reach out to us today!</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-8">

          <div class="flex items-start gap-4">
            <img src="assets/contact.png" alt="Call" class="w-6 h-6 object-contain mt-1">
            <div>
              <strong class="block font-bold text-[#00acee]">Call Us:</strong>
              <span class="text-[#00acee]">(049) 557 0006</span>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <img src="assets/email.png" alt="Email" class="w-6 h-6 object-contain mt-1">
            <div>
              <strong class="block font-bold text-[#00acee]">Email Us:</strong>
              <span class="text-[#00acee]">rbpaete1967@gmail.com</span>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <img src="assets/web.png" alt="Website" class="w-6 h-6 object-contain mt-1">
            <div>
              <strong class="block font-bold text-[#00acee]">Website:</strong>
              <a href="http://www.paetebank.ph" target="_blank" class="hover:underline text-[#00acee]">www.paetebank.ph</a>
            </div>
          </div>

          <div class="flex items-start gap-4">
            <img src="assets/address.png" alt="Address" class="w-6 h-6 object-contain mt-1">
            <div class="leading-snug">
              <strong class="block font-bold text-[#00acee]">Address:</strong>
              <span class="mt-1 block">J. Rizal corner J.V. Quesada Streets, Brgy. Ilaya del Sur, Paete</span>
            </div>
          </div>

          <div class="flex flex-col gap-2 mt-2">
            <strong class="font-bold text-[#00acee]">Follow Us On:</strong>
            <div class="flex gap-4 mt-1">
              <a href="#"><img src="assets/FB.png" alt="Facebook" class="w-8 h-8 object-contain hover:opacity-80 transition-opacity"></a>
              <a href="#"><img src="assets/X.png" alt="X Twitter" class="w-8 h-8 object-contain hover:opacity-80 transition-opacity"></a>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>
</template>
