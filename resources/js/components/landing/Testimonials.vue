<script>
  $(document).ready(function() {
      var testimonialOwl = $('#customers-testimonials');

      testimonialOwl.owlCarousel({
          loop: true,
          center: true,
          margin: 20,
          autoplay: true,
          autoplayTimeout: 2000,
          autoplaySpeed: 1000,
          autoplayHoverPause: false,
          dots: false,
          nav: false,
          responsive: {
              0: { items: 1 },
              768: { items: 2 },
              1170: { items: 3 }
          },
          onTranslated: function() {
              animateCenterCard('#customers-testimonials');
          },
          onInitialized: function() {
              animateCenterCard('#customers-testimonials');
          }
      });

      // Testimonials custom navigation
      $('.testimonial-prev-btn').click(function() {
          testimonialOwl.trigger('prev.owl.carousel');
      });
      $('.testimonial-next-btn').click(function() {
          testimonialOwl.trigger('next.owl.carousel');
      });

      function animateCenterCard(selector) {
          var $items = $(selector).find('.item');
          var $center = $(selector).find('.owl-item.center .item');

          // Reset all items: smaller scale and normal shadow
          $items.find('.testi').css({
              transform: 'scale(0.9)',
              transition: 'all 0.5s ease'
          }).removeClass('shadow-2xl shadow-[#08B3E5]/60').addClass('shadow-lg shadow-[#08B3E5]/30');

          // Scale up center item and apply XXL light blue shadow
          $center.find('.testi').css({
              transform: 'scale(1)',
              transition: 'all 0.5s ease'
          }).removeClass('shadow-lg shadow-[#08B3E5]/30').addClass('shadow-2xl shadow-[#08B3E5]/60');
      }

      // Initial animation
      setTimeout(function() {
          animateCenterCard('#customers-testimonials');
      }, 100);

      const stageOwl = document.querySelector('#testi-owl .owl-stage');
      
      if (stageOwl) {
          stageOwl.classList.add('py-12', 'mt-12');
      }
  });
</script>

<template>
  <div class="container mx-auto px-4 max-w-6xl">
    <h2 class="text-center text-white py-3 my-8 rounded text-2xl font-bold bg-[#08B3E5]">
      Testimonials
    </h2>
    
    <section class="mb-20">
      <div class="relative w-full max-w-5xl mx-auto" id="testi-owl">
        
        <button class="testimonial-prev-btn absolute top-1/2 -left-[30px] md:-left-[50px] -translate-y-1/2 w-10 h-10 rounded-full shadow-xl z-10 bg-[#08B3E5] hover:bg-[#0092c8] transition-colors flex items-center justify-center text-xl text-white">
          &#10094;
        </button>

        <button class="testimonial-next-btn absolute top-1/2 -right-[30px] md:-right-[50px] -translate-y-1/2 w-10 h-10 rounded-full shadow-xl z-10 bg-[#08B3E5] hover:bg-[#0092c8] transition-colors flex items-center justify-center text-xl text-white">
          &#10095;
        </button>

        <div id="customers-testimonials" class="owl-carousel owl-theme">
          
          <div class="item bg-transparent mt-8 mb-8">
            <div class="testi relative text-center p-6 rounded-xl bg-white shadow-lg shadow-[#08B3E5]/30">
              <div class="absolute -top-[55px] left-1/2 -translate-x-1/2 w-fit rounded-full shadow-md border-4 border-white bg-white">
                <img src="assets/g.png" class="h-[90px] w-[90px] rounded-full object-cover" alt="Maria Santos">
              </div>
              <div class="h-[30px]"></div>
              <div class="text-xl font-bold mt-2 text-[#095390]">Maria Santos</div>
              <p class="text-gray-500 text-base mb-1">Small Business Owner</p>
              <div>
                <i class="fa-solid fa-star text-[#FFCC00]"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <span class="ml-2 font-medium">1.0</span>
              </div>
              <div class="text-base p-2 font-medium mt-2 text-gray-700">
                Rural Bank of Paete has been my trusted partner in growing my sari-sari store. Their loan process is fast, and the staff treats me like a family.
              </div>
            </div>
          </div>

          <div class="item bg-transparent mt-8 mb-8">
            <div class="testi relative text-center p-6 rounded-xl bg-white shadow-lg shadow-[#08B3E5]/30">
              <div class="absolute -top-[55px] left-1/2 -translate-x-1/2 w-fit rounded-full shadow-md border-4 border-white bg-white">
                <img src="assets/g.png" class="h-[90px] w-[90px] rounded-full object-cover" alt="Angela Reyes">
              </div>
              <div class="h-[30px]"></div>
              <div class="text-xl font-bold mt-2 text-[#095390]">Angela Reyes</div>
              <p class="text-gray-500 text-base mb-1">Teacher</p>
              <div>
                <i class="fa-solid fa-star text-[#FFCC00]"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <span class="ml-2 font-medium">1.0</span>
              </div>
              <div class="text-base p-2 font-medium mt-2 text-gray-700">
                I opened my first savings account here, and I've never looked back. They not only help me save but also guide me in reaching my financial goals.
              </div>
            </div>
          </div>

          <div class="item bg-transparent mt-8 mb-8">
            <div class="testi relative text-center p-6 rounded-xl bg-white shadow-lg shadow-[#08B3E5]/30">
              <div class="absolute -top-[55px] left-1/2 -translate-x-1/2 w-fit rounded-full shadow-md border-4 border-white bg-white">
                <img src="assets/b.png" class="h-[90px] w-[90px] rounded-full object-cover" alt="Jonathan Dela Cruz">
              </div>
              <div class="h-[30px]"></div>
              <div class="text-xl font-bold mt-2 text-[#095390]">Jonathan Dela Cruz</div>
              <p class="text-gray-500 text-base mb-1">OFW</p>
              <div>
                <i class="fa-solid fa-star text-[#FFCC00]"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <span class="ml-2 font-medium">1.0</span>
              </div>
              <div class="text-base p-2 font-medium mt-2 text-gray-700">
                Every while I'm working abroad, I can easily manage my savings and send money to my family through their online banking. Truly reliable and convenient.
              </div>
            </div>
          </div>

          <div class="item bg-transparent mt-8 mb-8">
            <div class="testi relative text-center p-6 rounded-xl bg-white shadow-lg shadow-[#08B3E5]/30">
              <div class="absolute -top-[55px] left-1/2 -translate-x-1/2 w-fit rounded-full shadow-md border-4 border-white bg-white">
                <img src="assets/g.png" class="h-[90px] w-[90px] rounded-full object-cover" alt="Maria Santos">
              </div>
              <div class="h-[30px]"></div>
              <div class="text-xl font-bold mt-2 text-[#095390]">Maria Santos</div>
              <p class="text-gray-500 text-base mb-1">Small Business Owner</p>
              <div>
                <i class="fa-solid fa-star text-[#FFCC00]"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <span class="ml-2 font-medium">1.0</span>
              </div>
              <div class="text-base p-2 font-medium mt-2 text-gray-700">
                Rural Bank of Paete has been my trusted partner in growing my sari-sari store. Their loan process is fast, and the staff treats me like a family.
              </div>
            </div>
          </div>

          <div class="item bg-transparent mt-8 mb-8">
            <div class="testi relative text-center p-6 rounded-xl bg-white shadow-lg shadow-[#08B3E5]/30">
              <div class="absolute -top-[55px] left-1/2 -translate-x-1/2 w-fit rounded-full shadow-md border-4 border-white bg-white">
                <img src="assets/g.png" class="h-[90px] w-[90px] rounded-full object-cover" alt="Angela Reyes">
              </div>
              <div class="h-[30px]"></div>
              <div class="text-xl font-bold mt-2 text-[#095390]">Angela Reyes</div>
              <p class="text-gray-500 text-base mb-1">Teacher</p>
              <div>
                <i class="fa-solid fa-star text-[#FFCC00]"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <span class="ml-2 font-medium">1.0</span>
              </div>
              <div class="text-base p-2 font-medium mt-2 text-gray-700">
                I opened my first savings account here, and I've never looked back. They not only help me save but also guide me in reaching my financial goals.
              </div>
            </div>
          </div>

          <div class="item bg-transparent mt-8 mb-8">
            <div class="testi relative text-center p-6 rounded-xl bg-white shadow-lg shadow-[#08B3E5]/30">
              <div class="absolute -top-[55px] left-1/2 -translate-x-1/2 w-fit rounded-full shadow-md border-4 border-white bg-white">
                <img src="assets/b.png" class="h-[90px] w-[90px] rounded-full object-cover" alt="Jonathan Dela Cruz">
              </div>
              <div class="h-[30px]"></div>
              <div class="text-xl font-bold mt-2 text-[#095390]">Jonathan Dela Cruz</div>
              <p class="text-gray-500 text-base mb-1">OFW</p>
              <div>
                <i class="fa-solid fa-star text-[#FFCC00]"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <i class="fa-solid fa-star text-gray-300"></i>
                <span class="ml-2 font-medium">1.0</span>
              </div>
              <div class="text-base p-2 font-medium mt-2 text-gray-700">
                Every while I'm working abroad, I can easily manage my savings and send money to my family through their online banking. Truly reliable and convenient.
              </div>
            </div>
          </div>
          
        </div>
      </div>

    </section>  
  </div>
        <div class="w-full py-3 bg-[#08B3E5]"></div>

</template>