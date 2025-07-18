<template>
  <section class="bg-gray-50 py-20">
    <div class="container mx-auto px-6">
      <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-16">
          <h2 class="text-3xl font-bold mb-6">
            We've been secretly using our own tech for over a year
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            These are our real earnings from our own channel, built entirely with Amulet Voice.
            After proving it works for over a year, we've decided it's time to share this technology with other creators.
          </p>
        </div>

        <!-- Video Section - Full Width -->
        <div class="mb-16">
          <div class="max-w-4xl mx-auto">
            <div class="relative rounded-xl overflow-hidden shadow-xl bg-gray-900" style="aspect-ratio: 16/9;">
              <video
                controls
                class="w-full h-full object-cover"
              >
                <source src="/stats/stats1.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>

              <!-- Video overlay badge -->
              <div class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                Built with Amulet Voice
              </div>
            </div>
          </div>
        </div>

        <!-- Stats Grid - Below Video -->
        <div class="grid md:grid-cols-3 gap-8 mb-16">
          <!-- Main Revenue Stat -->
          <div class="bg-white p-8 rounded-xl">
            <div class="text-blue-600 mb-4 text-3xl">📊</div>
            <h3 class="text-xl font-semibold mb-4">Our monthly revenue</h3>
            <div class="text-3xl font-bold text-gray-900 mb-2">+$3,600</div>
            <p class="text-gray-600">Built with our own voice technology</p>
          </div>

          <!-- Cost Comparison -->
          <div class="bg-white p-8 rounded-xl">
            <div class="text-red-500 mb-4 text-3xl">💸</div>
            <h3 class="text-xl font-semibold mb-4">ElevenLabs cost</h3>
            <div class="text-3xl font-bold text-gray-900 mb-2">$99/month</div>
            <p class="text-gray-600">What we would have spent for the same usage</p>
          </div>

          <!-- Our Cost -->
          <div class="bg-white p-8 rounded-xl">
            <div class="text-green-500 mb-4 text-3xl">💰</div>
            <h3 class="text-xl font-semibold mb-4">Our actual cost</h3>
            <div class="text-3xl font-bold text-gray-900 mb-2">~$4/month</div>
            <p class="text-gray-600">Using our own Amulet Voice technology</p>
          </div>
        </div>

        <!-- Savings Highlight -->
        <div class="bg-white p-8 rounded-xl mb-16 text-center">
          <h3 class="text-2xl font-bold mb-4">Total savings over 12 months</h3>
          <div class="text-5xl font-bold text-green-600 mb-4">~$1,140</div>
          <p class="text-gray-600">Money we reinvested into growing our channel instead of paying voice synthesis fees</p>
        </div>

        <!-- Benefits Section -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
          <div class="bg-white p-6 rounded-xl text-center">
            <div class="text-2xl mb-4">📈</div>
            <h4 class="font-semibold mb-2">Better content</h4>
            <p class="text-gray-600 text-sm">Reinvested in equipment and editing</p>
          </div>
          <div class="bg-white p-6 rounded-xl text-center">
            <div class="text-2xl mb-4">⚡</div>
            <h4 class="font-semibold mb-2">Scaled production</h4>
            <p class="text-gray-600 text-sm">More videos without higher voice costs</p>
          </div>
          <div class="bg-white p-6 rounded-xl text-center">
            <div class="text-2xl mb-4">🔬</div>
            <h4 class="font-semibold mb-2">Perfected tech</h4>
            <p class="text-gray-600 text-sm">Refined the technology you'll access</p>
          </div>
          <div class="bg-white p-6 rounded-xl text-center">
            <div class="text-2xl mb-4">🏆</div>
            <h4 class="font-semibold mb-2">Sustainable growth</h4>
            <p class="text-gray-600 text-sm">Built a profitable, scalable channel</p>
          </div>
        </div>

        <!-- Bottom CTA -->
        <div class="text-center">
          <p class="text-gray-600 mb-6 text-lg">
            We've proven this works for <span class="font-semibold text-blue-600">over a year</span>. Now it's your turn to build your own success story.
          </p>
          <button
            @click="scrollToPricing"
            class="bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition-colors duration-200"
          >
            Get the same technology we use
          </button>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
const scrollToPricing = (event) => {
  event.preventDefault();
  const pricingSection = document.querySelector('#pricing');
  if (pricingSection) {
    const yOffset = -100;
    const y = pricingSection.getBoundingClientRect().top + window.pageYOffset + yOffset;

    window.scrollTo({
      top: y,
      behavior: 'smooth'
    });
  }
}
</script>
