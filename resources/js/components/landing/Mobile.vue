<template>
  <!-- Main Background Container -->
    <div class="relative flex flex-col lg:flex-row mt-5 items-center gap-10 p-8 md:p-12 rounded-2xl shadow-sm bg-cover bg-center bg-no-repeat overflow-hidden bg-[url('assets/mbanking%20bg.jpg')]">
    
    <section class="container mx-auto px-4 md:px-8 py-10" id="mobile">
      
      <!-- Mobile Banking Label: White BG, Light Blue Text, Smaller Width -->
      <h2 class="text-center text-[#08B3E5] bg-white py-3 px-10 my-6 mx-auto rounded-full text-2xl md:text-3xl font-bold shadow-md w-fit">
        Mobile Banking
      </h2>

      <!-- Flex Container to place Image Left and Text Right -->
      <div class="flex flex-col lg:flex-row items-center justify-between mt-10">
        
        <!-- Left: Phone Mockup -->
        <div class="hidden lg:flex flex-1 justify-center relative z-10">
          <img src="assets/mobile.png" 
               alt="Mobile Banking" 
               class="max-w-[250px] xl:max-w-[300px] object-contain drop-shadow-2xl hover:-translate-y-2 transition-transform duration-500" />
        </div>

        <!-- Right: Text Content -->
        <div class="flex-1 w-full text-center lg:text-left relative z-10">
          <h1 class="text-4xl md:text-5xl font-extrabold text-gray-100 mb-6 leading-tight drop-shadow-md">
            Your bank in your hands.
          </h1>
          
          <p class="text-lg md:text-xl text-gray-100 font-medium mb-8 leading-relaxed drop-shadow-md">
            Manage your savings, transfer funds, and apply for loans, anytime, anywhere...
          </p>

          <a href="#" class="inline-block bg-[#08B3E5] hover:bg-[#0092c8] text-white font-bold text-lg py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition-all hover:-translate-y-1">
            Coming Soon!
          </a>
        </div>

      </div>

    </section>
  </div>
</template>