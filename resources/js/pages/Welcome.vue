<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import About from '@/components/landing/About.vue';
import Banner from '@/components/landing/Banner.vue';
import Contact from '@/components/landing/Contact.vue';
import Loan from '@/components/landing/Loan.vue';
import Map from '@/components/landing/Map.vue';
import Mission from '@/components/landing/Mission.vue';
import Mobile from '@/components/landing/Mobile.vue';
import News from '@/components/landing/News.vue';
import Offer from '@/components/landing/Offer.vue';
import Security from '@/components/landing/Security.vue';
import Testimonials from '@/components/landing/Testimonials.vue';
import Why from '@/components/landing/Why.vue';
import Footer from '@/components/landing/Footer.vue';
</script>

<template>
    <Head title=" | Home" />

    <HomeLayout>
        <!-- Banner -->
        <Banner />

        <!-- Offer -->
        <Offer />

        <!-- About -->
        <About />

        <!-- Mission -->
        <Mission />

        <!-- Loan -->
        <Loan />

        <!-- News -->
        <News />

        <!-- Mobile -->
        <Mobile />

        <!-- Security -->
        <Security />

        <!-- Why Choose Us -->
        <Why />

        <!-- Testimonials -->
        <Testimonials />

        <!-- Contact -->
        <Contact />

        <!-- Map -->
        <Map />

        <!-- Footer -->
        <Footer />
    </HomeLayout>
</template>
