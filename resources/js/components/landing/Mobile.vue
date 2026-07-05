<template>
  <section class="container mx-auto px-4 md:px-8 max-w-6xl mb-20" id="mobile">
    
    <h2 class="text-center text-white py-4 my-8 rounded-xl text-2xl md:text-3xl font-bold bg-[#08B3E5] w-full shadow-sm">
      Mobile Banking
    </h2>

    <div class="relative flex flex-col lg:flex-row items-center justify-between gap-10 p-8 md:p-12 rounded-2xl shadow-sm bg-cover bg-center bg-no-repeat overflow-hidden bg-[url('assets/mbanking%20bg.jpg')]">
      
      <!-- <div class="absolute inset-0 bg-[#F0FAFE]/85 z-0"></div> -->

      <div class="hidden lg:flex flex-1 justify-center relative z-10">
        <img src="assets/mobile.png" 
             alt="Mobile Banking" 
             class="max-w-[250px] xl:max-w-[300px] object-contain drop-shadow-2xl hover:-translate-y-2 transition-transform duration-500" />
      </div>

      <div class="flex-1 w-full text-center lg:text-left relative z-10">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-6 leading-tight">
          Your bank in your hands.
        </h1>
        
        <p class="text-lg md:text-xl text-gray-100 font-medium mb-8 leading-relaxed">
          Manage your savings, transfer funds, and apply for loans, anytime, anywhere...
        </p>

        <a href="#" class="inline-block bg-[#08B3E5] hover:bg-[#0092c8] text-white font-bold text-lg py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition-all hover:-translate-y-1">
          Coming Soon!
        </a>
      </div>

    </div>
  </section>
</template>