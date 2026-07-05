<template>
  <section class="container mx-auto px-4 md:px-8 max-w-6xl mb-20" id="security">
    
    <div class="flex items-center justify-center gap-4 bg-[#08B3E5] text-white py-4 my-8 rounded-xl text-2xl md:text-3xl font-bold w-full shadow-sm">
      <img src="assets/security icon.png" alt="Security Icon" class="w-8 h-8 md:w-10 md:h-10 object-contain">
      <span>Security & Trust</span>
    </div>

    <div class="flex flex-col lg:flex-row items-center justify-between gap-10 bg-[#F0FAFE] p-8 md:p-12 rounded-2xl shadow-sm">
      
      <div class="flex-1 w-full">
        <h4 class="text-2xl md:text-3xl font-bold text-[#095390] mb-6">
          We follow strict compliance with:
        </h4>
        
        <ul class="space-y-4 mb-8">
          <li class="flex items-center gap-3 text-lg md:text-xl text-gray-700">
            <span class="text-[#2ECC71] font-bold text-2xl">✔</span>
            <strong class="font-semibold">BSP Regulations</strong>
          </li>

          <li class="flex items-center gap-3 text-lg md:text-xl text-gray-700">
            <span class="text-[#2ECC71] font-bold text-2xl">✔</span>
            <strong class="font-semibold">AMLA &amp; KYC Guidelines</strong>
          </li>

          <li class="flex items-center gap-3 text-lg md:text-xl text-gray-700">
            <span class="text-[#2ECC71] font-bold text-2xl">✔</span>
            <strong class="font-semibold">Data Privacy Act of 2012</strong>
          </li>
        </ul>

        <a href="#" class="inline-block text-[#08B3E5] hover:text-[#095390] font-semibold text-lg hover:underline transition-colors">
          Learn more...
        </a>
      </div>

      <div class="hidden lg:flex flex-1 w-full justify-center">
        <img src="assets/security vector.png" 
             alt="Security Vector" 
             class="w-full max-w-md object-contain drop-shadow-md hover:scale-105 transition-transform duration-300" />
      </div>

    </div>
  </section>
</template>