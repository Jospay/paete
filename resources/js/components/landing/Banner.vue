<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount, nextTick } from 'vue'

// Declare jQuery
declare const $: any

const isMounted = ref(false)

let bannerCarousel: any = null

onMounted(async () => {
  isMounted.value = true
  await nextTick()

  bannerCarousel = $('.owl-banner-1')

  bannerCarousel.owlCarousel({
    loop: true,
    margin: 20,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    dots: false,
    nav: false,
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 2
      },
      768: {
        items: 3
      },
      1024: {
        items: 4
      }
    }
  })

  $('.owl-banner-1-prev').on('click', () => {
    bannerCarousel.trigger('prev.owl.carousel')
  })

  $('.owl-banner-1-next').on('click', () => {
    bannerCarousel.trigger('next.owl.carousel')
  })
})

onBeforeUnmount(() => {
  $('.owl-banner-1-prev').off('click')
  $('.owl-banner-1-next').off('click')

  if (bannerCarousel) {
    bannerCarousel.trigger('destroy.owl.carousel')
  }
})
</script>

<template>
    <div class="bg-[url('assets/landing.jpg')] bg-cover bg-center bg-no-repeat">
        <div class="relative max-w-7xl mx-auto px-4 pt-8">
            <div
                class="grid grid-cols-1 items-start gap-8 pt-4 pb-40 lg:grid-cols-12"
            >
                <div
                    class="relative z-1 flex w-full flex-col items-start pb-5 text-left lg:col-span-12"
                >
                    <span
                        class="mb-4 text-3xl leading-tight font-bold text-white md:text-6xl"
                    >
                        Welcome to <br />
                        Rural Bank of Paete Inc.
                    </span>

                    <p
                        class="mb-6 max-w-[550px] text-base leading-6 text-slate-100 md:text-xl"
                    >
                        Serving our community with trust, care, and financial
                        empowerment since 1966. We offer secure and accessible
                        banking services tailored to the needs of individuals,
                        families, farmers, and small businesses in Paete and
                        beyond.
                    </p>

                    <span
                        class="mb-3 inline-block rounded-full bg-[#FFCC00] px-5 py-2 text-base font-bold text-white capitalize shadow-sm md:text-3xl"
                    >
                        SOW, SAVE, GROW WITH US!
                    </span>

                    <div class="mb-6 flex gap-2 text-sm text-white">
                        <span>✔ Safe & Secure Banking</span>
                        <span>✔ Trusted by Generations</span>
                        <span>✔ Locally Grown, Digitally Ready</span>
                    </div>

                    <a
                        href="#"
                        class="inline-block w-full rounded-xl border-3 border-white bg-secondary-blue px-10 py-2 text-center text-2xl font-bold text-white shadow-lg hover:bg-[#003b6d] sm:w-auto"
                    >
                        Open an Account Now!
                    </a>
                </div>
            </div>

            <div class="absolute right-0 bottom-0 z-0 hidden lg:block">
                <img
                    src="assets/banner.png"
                    alt="Rural Bank"
                    class="max-h-full w-full max-w-xl self-end object-contain"
                />
            </div>
        </div>
    </div>

    <div class="container mx-auto -mt-[134px] mb-2 max-w-6xl px-4">
        <div class="relative w-full px-4 md:px-10" v-if="isMounted">

            <!-- Previous -->
            <button
                class="owl-banner-1-prev absolute top-1/2 -left-2 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-[#08B3E5] text-xl text-white shadow-lg transition-colors hover:bg-[#0092c8] md:-left-6"
            >
                &#10094;
            </button>

            <!-- Next -->
            <button
                class="owl-banner-1-next absolute top-1/2 -right-2 z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-[#08B3E5] text-xl text-white shadow-lg transition-colors hover:bg-[#0092c8] md:-right-6"
            >
                &#10095;
            </button>

            <!-- Carousel -->
            <div class="owl-carousel owl-theme owl-banner-1 py-4">

                <div class="item my-2 flex min-h-[220px] flex-col items-center justify-center rounded-xl bg-[#F0FAFE] p-6 text-center shadow-md">
                    <img
                        src="assets/icon1.png"
                        alt="Regular Savings"
                        class="mx-auto mb-4"
                        style="max-width:100px;width:auto !important;height:auto;"
                    />
                    <p class="text-lg leading-tight font-semibold text-[#095390]">
                        Regular Savings
                    </p>
                </div>

                <div class="item my-2 flex min-h-[220px] flex-col items-center justify-center rounded-xl bg-[#F0FAFE] p-6 text-center shadow-md">
                    <img
                        src="assets/icon2.png"
                        alt="Basic Deposit Account"
                        class="mx-auto mb-4"
                        style="max-width:100px;width:auto !important;height:auto;"
                    />
                    <p class="text-lg leading-tight font-semibold text-[#095390]">
                        Basic Deposit Account
                    </p>
                </div>

                <div class="item my-2 flex min-h-[220px] flex-col items-center justify-center rounded-xl bg-[#F0FAFE] p-6 text-center shadow-md">
                    <img
                        src="assets/icon3.png"
                        alt="Time Deposit Account"
                        class="mx-auto mb-4"
                        style="max-width:100px;width:auto !important;height:auto;"
                    />
                    <p class="text-lg leading-tight font-semibold text-[#095390]">
                        Time Deposit Account
                    </p>
                </div>

                <div class="item my-2 flex min-h-[220px] flex-col items-center justify-center rounded-xl bg-[#F0FAFE] p-6 text-center shadow-md">
                    <img
                        src="assets/icon4.png"
                        alt="Checking Account"
                        class="mx-auto mb-4"
                        style="max-width:100px;width:auto !important;height:auto;"
                    />
                    <p class="text-lg leading-tight font-semibold text-[#095390]">
                        Checking Account
                    </p>
                </div>

            </div>
        </div>
    </div>
</template>
