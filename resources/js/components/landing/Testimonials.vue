<script setup lang="ts">
import { onMounted, onUnmounted, nextTick } from 'vue';

declare global {
    interface Window {
        $: any;
        jQuery: any;
    }
}

interface Testimonial {
    id: number;
    image: string;
    name: string;
    work: string;
    star: number;
    description: string;
}

const testimonials: Testimonial[] = [
    {
        id: 1,
        image: 'assets/g.png',
        name: 'Maria Santos',
        work: 'Small Business Owner',
        star: 1,
        description:
            'Rural Bank of Paete has been my trusted partner in growing my sari-sari store. Their loan process is fast, and the staff treats me like a family.',
    },
    {
        id: 2,
        image: 'assets/g.png',
        name: 'Angela Reyes',
        work: 'Teacher',
        star: 1,
        description:
            "I opened my first savings account here, and I've never looked back. They not only help me save but also guide me in reaching my financial goals.",
    },
    {
        id: 3,
        image: 'assets/b.png',
        name: 'Jonathan Dela Cruz',
        work: 'OFW',
        star: 1,
        description:
            "Every while I'm working abroad, I can easily manage my savings and send money to my family through their online banking. Truly reliable and convenient.",
    },
    {
        id: 4,
        image: 'assets/g.png',
        name: 'Maria Santos',
        work: 'Small Business Owner',
        star: 1,
        description:
            'Rural Bank of Paete has been my trusted partner in growing my sari-sari store. Their loan process is fast, and the staff treats me like a family.',
    },
    {
        id: 5,
        image: 'assets/g.png',
        name: 'Angela Reyes',
        work: 'Teacher',
        star: 1,
        description:
            "I opened my first savings account here, and I've never looked back. They not only help me save but also guide me in reaching my financial goals.",
    },
    {
        id: 6,
        image: 'assets/b.png',
        name: 'Jonathan Dela Cruz',
        work: 'OFW',
        star: 1,
        description:
            "Every while I'm working abroad, I can easily manage my savings and send money to my family through their online banking. Truly reliable and convenient.",
    },
];

function starClass(index: number, rating: number) {
    return index <= rating ? 'text-[#FFCC00]' : 'text-gray-300';
}

let $testimonialOwl: any = null;

function animateCenterCard(selector: string) {
    const $ = window.$;
    const $items = $(selector).find('.item');
    const $center = $(selector).find('.owl-item.center .item');

    $items
        .find('.testi')
        .css({ transform: 'scale(0.9)', transition: 'all 0.5s ease' })
        .removeClass('shadow-2xl shadow-primary-blue/60')
        .addClass('shadow-lg shadow-primary-blue/30');

    $center
        .find('.testi')
        .css({ transform: 'scale(1)', transition: 'all 0.5s ease' })
        .removeClass('shadow-lg shadow-primary-blue/30')
        .addClass('shadow-2xl shadow-primary-blue/60');
}

onMounted(async () => {
    await nextTick();

    if (!window.$ || !window.$.fn || !window.$.fn.owlCarousel) {
        console.error(
            'jQuery or Owl Carousel not loaded — check your CDN script tags.',
        );
        return;
    }

    const $ = window.$;
    $testimonialOwl = $('#customers-testimonials');

    $testimonialOwl.owlCarousel({
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
            1170: { items: 3 },
        },
        onTranslated: function () {
            animateCenterCard('#customers-testimonials');
        },
        onInitialized: function () {
            animateCenterCard('#customers-testimonials');
        },
    });

    $('.testimonial-prev-btn').on('click', function () {
        $testimonialOwl.trigger('prev.owl.carousel');
    });
    $('.testimonial-next-btn').on('click', function () {
        $testimonialOwl.trigger('next.owl.carousel');
    });

    setTimeout(function () {
        animateCenterCard('#customers-testimonials');
    }, 100);

    const stageOwl = document.querySelector('#testi-owl .owl-stage');
    if (stageOwl) {
        stageOwl.classList.add('py-12', 'mt-12');
    }
});

onUnmounted(() => {
    if ($testimonialOwl && $testimonialOwl.data('owl.carousel')) {
        $testimonialOwl.trigger('destroy.owl.carousel');
    }
    window.$('.testimonial-prev-btn').off('click');
    window.$('.testimonial-next-btn').off('click');
});
</script>

<template>
    <div class="container mx-auto max-w-6xl px-4">
        <h2
            class="my-8 rounded bg-primary-blue py-3 text-center text-2xl font-bold text-white"
        >
            Testimonials
        </h2>

        <section class="mb-20">
            <div class="relative mx-auto w-full max-w-5xl" id="testi-owl">
                <button
                    class="testimonial-prev-btn absolute top-1/2 -left-[30px] z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-primary-blue text-xl text-white shadow-xl transition-colors hover:bg-[#0092c8] md:-left-[50px]"
                >
                    &#10094;
                </button>

                <button
                    class="testimonial-next-btn absolute top-1/2 -right-[30px] z-10 flex h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full bg-primary-blue text-xl text-white shadow-xl transition-colors hover:bg-[#0092c8] md:-right-[50px]"
                >
                    &#10095;
                </button>

                <div id="customers-testimonials" class="owl-carousel owl-theme">
                    <div
                        v-for="testimonial in testimonials"
                        :key="testimonial.id"
                        class="item mt-8 mb-8 bg-transparent"
                    >
                        <div
                            class="testi relative rounded-xl bg-white p-6 text-center shadow-lg shadow-primary-blue/30"
                        >
                            <div
                                class="absolute -top-[55px] left-1/2 w-fit -translate-x-1/2 rounded-full border-4 border-white bg-white shadow-md"
                            >
                                <img
                                    :src="testimonial.image"
                                    :alt="testimonial.name"
                                    class="h-[90px] w-[90px] rounded-full object-cover"
                                />
                            </div>
                            <div class="h-[30px]"></div>
                            <div class="mt-2 text-xl font-bold text-[#095390]">
                                {{ testimonial.name }}
                            </div>
                            <p class="mb-1 text-base text-gray-500">
                                {{ testimonial.work }}
                            </p>
                            <div>
                                <i
                                    v-for="i in 5"
                                    :key="i"
                                    class="fa-solid fa-star"
                                    :class="starClass(i, testimonial.star)"
                                ></i>
                                <span class="ml-2 font-medium">{{
                                    testimonial.star.toFixed(1)
                                }}</span>
                            </div>
                            <div
                                class="mt-2 p-2 text-base font-medium text-gray-700"
                            >
                                {{ testimonial.description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="w-full bg-primary-blue py-3"></div>
</template>
