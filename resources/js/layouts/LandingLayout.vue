<script setup lang="ts">
import { ref, watch } from 'vue'

const isOpen = ref(false)

// Optional helper: Disables page background scrolling when mobile drawer is fully expanded
watch(isOpen, (newValue) => {
  if (newValue) {
    document.body.classList.add('overflow-hidden')
  } else {
    document.body.classList.remove('overflow-hidden')
  }
})
</script>

<template>
  <div class="relative min-h-screen overflow-x-hidden bg-gray-50/50 font-sans">
    <!-- Header Container -->
    <header class="relative z-30">

      <!-- Top Anniversary Banner (Scrolls away naturally) -->
      <div class="bg-[#F7FBFD] sm:p-4 p-1">
        <div class="max-w-7xl mx-auto">
          <img
            src="assets/60.jpg"
            class="shadow-2xl w-full h-auto object-cover"
            alt="60 Years Anniversary Banner"
          >
        </div>
      </div>

      <!-- Sticky Wrapper Group (Locks cleanly to the top when the banner scrolls out of view) -->
      <div class="sticky top-0 z-50 w-full shadow-md transition-shadow duration-300">

        <!-- Primary Navbar -->
        <div class="bg-primary-blue w-full">
          <div class="max-w-7xl mx-auto px-4">
            <div class="flex min-h-[75px] items-center justify-between py-4">

              <!-- Logo & Title Section -->
              <div class="flex items-center gap-3">
                <div class="flex h-[50px] w-[50px] sm:h-[60px] sm:w-[60px] flex-shrink-0 items-center justify-center rounded-full bg-white text-base sm:text-xl font-bold text-[#08B3E5] overflow-hidden p-1">
                  <img src="assorted/ruralbanklogo.png" alt="Rural Bank Logo" class="w-full h-full object-contain">
                </div>

                <div class="text-white">
                  <h1 class="text-md sm:text-2xl md:text-2xl leading-tight font-bold whitespace-nowrap">
                    Rural Bank of <br class="sm:hidden"> Paete Inc.
                  </h1>
                </div>
              </div>

              <!-- Desktop & Mobile Navigation Controller -->
              <nav class="flex items-center gap-5">
                <!-- Desktop Search Bar -->
                <div class="relative hidden h-10 w-72 overflow-hidden rounded-full bg-white lg:flex items-center">
                  <input
                    type="text"
                    placeholder="Search..."
                    class="h-full w-full bg-transparent px-4 pr-12 text-sm text-gray-700 placeholder-gray-400 outline-none"
                  />
                  <button
                    type="button"
                    class="absolute right-1 flex h-8 w-8 items-center justify-center rounded-full bg-primary-blue text-white transition-colors hover:bg-secondary-blue"
                  >
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                  </button>
                </div>

                <!-- Desktop Top-Level Links -->
                <ul class="hidden items-center gap-4 text-lg text-white lg:flex">
                  <li class="ps-3">
                    <a href="#about-us" class="hover:underline transition-all">About Us</a>
                  </li>
                  <li class="pe-4">
                    <a href="#contact-us" class="hover:underline transition-all">Contact Us</a>
                  </li>
                  <li>
                    <a
                      href="/login"
                      class="rounded-lg bg-white px-8 py-2 text-primary-blue font-semibold hover:bg-gray-100 transition-colors inline-block"
                    >
                      Log in
                    </a>
                  </li>
                </ul>

                <!-- Mobile Hamburger Menu Button -->
                <button
                  @click="isOpen = !isOpen"
                  type="button"
                  class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-secondary-blue focus:outline-none lg:hidden transition-colors"
                  aria-label="Toggle menu"
                  :aria-expanded="isOpen"
                >
                  <i v-if="!isOpen" class="fa-solid fa-bars text-2xl"></i>
                  <i v-else class="fa-solid fa-xmark text-2xl"></i>
                </button>
              </nav>
            </div>
          </div>
        </div>

        <!-- Desktop Secondary Navbar Sub-menu -->
        <div class="hidden lg:block bg-[#F7FBFD] border-b border-gray-200">
          <div class="max-w-7xl mx-auto px-4">
            <ul class="text-md flex flex-wrap justify-center gap-x-6 gap-y-2 py-2.5 text-secondary-blue font-medium">
              <li><a href="#offer" class="hover:underline transition-all">What We Offer</a></li>
              <li><a href="#loan" class="hover:underline transition-all">Loan Services</a></li>
              <li><a href="#news" class="hover:underline transition-all">News & Updates</a></li>
              <li><a href="#mobile" class="hover:underline transition-all">Mobile Banking</a></li>
              <li><a href="#security" class="hover:underline transition-all">Security & Trust</a></li>
              <li><a href="#why" class="hover:underline transition-all">Why Choose Us</a></li>
            </ul>
          </div>
        </div>

        <!-- Responsive Mobile Menu Drawer Wrapper (Smooth Transition Max Height Engine) -->
        <div
          class="lg:hidden bg-primary-blue border-t border-secondary-blue overflow-y-auto transition-all duration-300 ease-in-out"
          :class="isOpen ? 'max-h-[calc(100vh-75px)] opacity-100' : 'max-h-0 opacity-0 pointer-events-none'"
        >
          <div class="px-4 pt-4 pb-6 space-y-5">
            <!-- Mobile Search Bar -->
            <div class="relative h-10 w-full overflow-hidden rounded-full bg-white flex items-center">
              <input
                type="text"
                placeholder="Search..."
                class="h-full w-full bg-transparent px-4 pr-12 text-sm text-gray-700 placeholder-gray-400 outline-none"
              />
              <button
                type="button"
                class="absolute right-1 flex h-8 w-8 items-center justify-center rounded-full bg-primary-blue text-white"
              >
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
              </button>
            </div>

            <!-- Mobile Core Navigation Links -->
            <ul class="space-y-3 text-white text-base font-semibold border-b border-secondary-blue/50 pb-3">
              <li><a @click="isOpen = false" href="#about-us" class="block py-1 hover:text-gray-200 transition-colors">About Us</a></li>
              <li><a @click="isOpen = false" href="#contact-us" class="block py-1 hover:text-gray-200 transition-colors">Contact Us</a></li>
            </ul>

            <!-- Mobile Banking Services Menu -->
            <ul class="space-y-3 text-white text-sm opacity-90 pb-4 border-b border-secondary-blue/50">
              <li><a @click="isOpen = false" href="#offer" class="block py-1 hover:text-gray-200 transition-colors">What We Offer</a></li>
              <li><a @click="isOpen = false" href="#loan" class="block py-1 hover:text-gray-200 transition-colors">Loan Services</a></li>
              <li><a @click="isOpen = false" href="#news" class="block py-1 hover:text-gray-200 transition-colors">News & Updates</a></li>
              <li><a @click="isOpen = false" href="#mobile" class="block py-1 hover:text-gray-200 transition-colors">Mobile Banking</a></li>
              <li><a @click="isOpen = false" href="#security" class="block py-1 hover:text-gray-200 transition-colors">Security & Trust</a></li>
              <li><a @click="isOpen = false" href="#why" class="block py-1 hover:text-gray-200 transition-colors">Why Choose Us</a></li>
            </ul>

            <!-- Mobile Action Button -->
            <div class="pt-1">
              <a
                href="/login"
                @click="isOpen = false"
                class="block w-full text-center rounded-lg bg-white py-2.5 text-primary-blue font-bold shadow transition-colors hover:bg-gray-100"
              >
                Log in
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content Slot -->
    <main class="relative z-20">
      <slot />
    </main>
  </div>
</template>
