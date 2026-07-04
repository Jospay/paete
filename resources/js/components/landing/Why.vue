<script setup lang="ts">
import { ref, onMounted, nextTick } from 'vue'

// Declare jQuery to prevent TypeScript/ESLint errors
declare const $: any

// Flag to prevent SSR hydration mismatches
const isMounted = ref(false)

onMounted(async () => {
  isMounted.value = true
  await nextTick()

  const chooseOwl = $('#choose_carousel')

  chooseOwl.owlCarousel({
    loop: true,
    margin: 20,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    dots: false,
    nav: false,
    responsive: {
      0: { items: 1 },
      576: { items: 2 },
      768: { items: 3 },
      1024: { items: 4 }
    }
  })

  // Bind custom navigation buttons
  $('.choose-prev-btn').on('click', () => {
    chooseOwl.trigger('prev.owl.carousel')
  })
  
  $('.choose-next-btn').on('click', () => {
    chooseOwl.trigger('next.owl.carousel')
  })
})
</script>

<template>
  <div class="container mx-auto px-4 max-w-6xl mb-20">
    
    <h2 class="text-center text-white py-3 my-8 rounded text-2xl font-bold bg-[#08B3E5] w-full">
      Why Choose Us?
    </h2>

    <div class="relative w-full px-4 md:px-10" v-if="isMounted">
        
      <button class="choose-prev-btn absolute top-1/2 -left-2 md:-left-6 -translate-y-1/2 w-10 h-10 rounded-full shadow-lg z-10 bg-[#08B3E5] hover:bg-[#0092c8] transition-colors flex items-center justify-center text-xl text-white">
        &#10094;
      </button>
      
      <button class="choose-next-btn absolute top-1/2 -right-2 md:-right-6 -translate-y-1/2 w-10 h-10 rounded-full shadow-lg z-10 bg-[#08B3E5] hover:bg-[#0092c8] transition-colors flex items-center justify-center text-xl text-white">
        &#10095;
      </button>

      <div id="choose_carousel" class="owl-carousel owl-theme py-4">
        
        <div class="item bg-[#F0FAFE] rounded-xl shadow-md text-center p-6 flex flex-col items-center justify-center min-h-[220px]">
          <img src="assets/fast.png"
            alt="Fast and friendly service"
            class="mb-4 mx-auto"
            style="max-width:100px; width:auto !important; height:auto;">
          <p class="font-semibold text-[#095390] text-lg leading-tight">Fast and friendly service</p>
        </div>

        <div class="item bg-[#F0FAFE] rounded-xl shadow-md text-center p-6 flex flex-col items-center justify-center min-h-[220px]">
          <img src="assets/finance.png"
            alt="Financial partner for every stage of life"
            class="mb-4 mx-auto"
            style="max-width:100px; width:auto !important; height:auto;">
          <p class="font-semibold text-[#095390] text-lg leading-tight">Financial partner for every stage of life</p>
        </div>

        <div class="item bg-[#F0FAFE] rounded-xl shadow-md text-center p-6 flex flex-col items-center justify-center min-h-[220px]">
          <img src="assets/empower.png"
            alt="Empowering our community for generations"
            class="mb-4 mx-auto"
            style="max-width:100px; width:auto !important; height:auto;">
          <p class="font-semibold text-[#095390] text-lg leading-tight">Empowering our community for generations</p>
        </div>

        <div class="item bg-[#F0FAFE] rounded-xl shadow-md text-center p-6 flex flex-col items-center justify-center min-h-[220px]">
          <img src="assets/local.png"
            alt="Local bank with a heart"
            class="mb-4 mx-auto"
            style="max-width:100px; width:auto !important; height:auto;">
          <p class="font-semibold text-[#095390] text-lg leading-tight">Local bank with a heart</p>
        </div>

      </div>
    </div>

  </div>
</template>