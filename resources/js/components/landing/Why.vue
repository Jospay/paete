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
  <section id="why" class="w-full bg-[#08B3E5] py-12 mb-20">
    <div class="container mx-auto px-4 max-w-6xl">

      <!-- Using standard sky-500 instead of [#08B3E5] -->
      <h2 class="text-center text-[#08B3E5] py-3 mb-8 rounded-lg text-2xl font-bold bg-white w-full shadow-sm">
        Why Choose Us?
      </h2>

      <div class="relative w-full px-4 md:px-10" v-if="isMounted">

        <!-- Navigation Buttons using standard sky colors -->
        <button class="choose-prev-btn absolute top-1/2 -left-2 md:-left-6 -translate-y-1/2 w-10 h-10 rounded-full shadow-lg z-10 bg-white hover:bg-[#08B3E5] transition-colors flex items-center justify-center text-xl text-[#08B3E5] hover:text-white">
          &#10094;
        </button>

        <button class="choose-next-btn absolute top-1/2 -right-2 md:-right-6 -translate-y-1/2 w-10 h-10 rounded-full shadow-lg z-10 bg-white hover:bg-[#08B3E5] transition-colors flex items-center justify-center text-xl text-[#08B3E5] hover:text-white">
          &#10095;
        </button>

        <div id="choose_carousel" class="owl-carousel owl-theme py-4">

          <!-- Card 1 -->
          <div class="item bg-white rounded-xl shadow-md text-center p-6 flex flex-col items-center justify-center min-h-56">
            <!-- Removed inline style, added max-w-24 (96px) -->
            <img src="assets/fast.png"
              alt="Fast and friendly service"
              class="mb-4 mx-auto max-w-24 w-auto h-auto">
            <p class="font-semibold text-sky-900 text-lg leading-tight">Fast and friendly service</p>
          </div>

          <!-- Card 2 -->
          <div class="item bg-white rounded-xl shadow-md text-center p-6 flex flex-col items-center justify-center min-h-56">
            <img src="assets/finance.png"
              alt="Financial partner for every stage of life"
              class="mb-4 mx-auto max-w-24 w-auto h-auto">
            <p class="font-semibold text-sky-900 text-lg leading-tight">Financial partner for every stage of life</p>
          </div>

          <!-- Card 3 -->
          <div class="item bg-white rounded-xl shadow-md text-center p-6 flex flex-col items-center justify-center min-h-56">
            <img src="assets/empower.png"
              alt="Empowering our community for generations"
              class="mb-4 mx-auto max-w-24 w-auto h-auto">
            <p class="font-semibold text-sky-900 text-lg leading-tight">Empowering our community for generations</p>
          </div>

          <!-- Card 4 -->
          <div class="item bg-white rounded-xl shadow-md text-center p-6 flex flex-col items-center justify-center min-h-56">
            <img src="assets/local.png"
              alt="Local bank with a heart"
              class="mb-4 mx-auto max-w-24 w-auto h-auto">
            <p class="font-semibold text-sky-900 text-lg leading-tight">Local bank with a heart</p>
          </div>

        </div>
      </div>

    </div>
  </section>
</template>
