<template>
  <div class="sticky top-0 z-50">
    <!-- Barra superior de early access -->
    <div @click="scrollToPricing" class="bg-blue-600 text-white text-center py-4 text-base cursor-pointer transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-500 hover:via-purple-500 hover:to-blue-600 hover:animate-shimmer relative overflow-hidden group">
      <div class="relative z-10 inline-block">
        🚀 Limited early access spots available. Secure yours before we go public.
        <!-- Barra horizontal animada -->
        <div class="absolute bottom-0 left-0 h-0.5 bg-white/60 w-0 group-hover:w-full transition-all duration-700 ease-out"></div>
      </div>
      <!-- Efecto shimmer -->
      <div class="absolute inset-0 -translate-x-1/2 group-hover:translate-x-full transition-transform duration-500 bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-12"></div>
    </div>

    <!-- Header principal con glassmorphism -->
    <header class="bg-white/60 backdrop-blur-md shadow-sm w-full border-b border-white/20">
      <nav class="container mx-auto px-6 py-8 flex justify-between items-center">
        <div class="text-2xl font-bold text-gray-900">Amulet Voice</div>
        <div class="space-x-6 flex items-center">
          <a href="#pricing" class="text-gray-600 hover:text-gray-900">Pricing</a>
          <a href="#api" class="text-gray-600 hover:text-gray-900">API</a>
          <button @click="scrollToPricing" class="relative bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-blue-500/40 hover:bg-gradient-to-r hover:from-blue-500 hover:via-indigo-600 hover:to-purple-600 overflow-hidden group">
            <span class="relative z-10">Join waitlist</span>
            <!-- Efecto shimmer -->
            <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/30 to-transparent skew-x-12"></div>
            <!-- Glow effect -->
            <div class="absolute inset-0 rounded-lg bg-gradient-to-r from-blue-400 to-purple-600 opacity-0 group-hover:opacity-15 transition-opacity duration-300 blur-lg"></div>
          </button>
        </div>
      </nav>
    </header>
  </div>
</template>

<script setup>
const scrollToPricing = () => {
  const pricingSection = document.querySelector('#pricing');
  if (pricingSection) {
    const yOffset = -100; // Margen de 160px desde arriba
    const y = pricingSection.getBoundingClientRect().top + window.pageYOffset + yOffset;

    window.scrollTo({
      top: y,
      behavior: 'smooth'
    });
  }
}
</script>

<style scoped>
@keyframes shimmer {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(100%);
  }
}

.animate-shimmer {
  animation: shimmer 2s ease-in-out infinite;
}
</style>
