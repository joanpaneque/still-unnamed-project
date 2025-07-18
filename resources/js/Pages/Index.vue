<script setup>
import Header from '@/Components/Header.vue'
import HeroSection from '@/Components/HeroSection.vue'
import BenefitsSection from '@/Components/BenefitsSection.vue'
import StatsSection from '@/Components/StatsSection.vue'
import CreatorsSection from '@/Components/CreatorsSection.vue'
import PricingSection from '@/Components/PricingSection.vue'
import ApiSection from '@/Components/ApiSection.vue'
import TestimonialsSection from '@/Components/TestimonialsSection.vue'
import FaqSection from '@/Components/FaqSection.vue'
import CtaSection from '@/Components/CtaSection.vue'
import Footer from '@/Components/Footer.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="🎙️ Amulet Voice | Generate Natural AI Voices" />
  <div class="min-h-screen bg-white">
    <Header />
    <HeroSection />
    <BenefitsSection />
    <StatsSection />
    <CreatorsSection />
    <PricingSection />
    <ApiSection />
    <TestimonialsSection />
    <FaqSection />
    <CtaSection />
    <Footer />
  </div>
</template>



<style scoped>
/* Additional styles if needed */
</style>
