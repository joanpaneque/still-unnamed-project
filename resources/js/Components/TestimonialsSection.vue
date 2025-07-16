<template>
  <section class="bg-gray-50 py-20">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-12">
        What our users say
      </h2>

      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-xl">
          <div class="text-yellow-400 mb-4">★★★★★</div>
          <p class="text-gray-600 mb-6">
            "I save $300 per month compared to ElevenLabs. The quality is practically identical
            and my subscribers don't notice any difference."
          </p>
          <div class="flex items-center">
            <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
            <div>
              <div class="font-semibold">Carlos Ruiz</div>
              <div class="text-sm text-gray-500">YouTuber, 150K subs</div>
            </div>
          </div>
        </div>

        <div class="bg-white p-8 rounded-xl">
          <div class="text-yellow-400 mb-4">★★★★★</div>
          <p class="text-gray-600 mb-6">
            "The API is super easy to use. I integrated TTS into my app in less than 2 hours.
            Perfect documentation."
          </p>
          <div class="flex items-center">
            <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
            <div>
              <div class="font-semibold">Ana García</div>
              <div class="text-sm text-gray-500">Full Stack Developer</div>
            </div>
          </div>
        </div>

        <div class="bg-white p-8 rounded-xl">
          <div class="text-yellow-400 mb-4">★★★★★</div>
          <p class="text-gray-600 mb-6">
            "Perfect for my podcast. I can record episodes even when I'm sick.
            The voice sounds natural and professional."
          </p>
          <div class="flex items-center">
            <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
            <div>
              <div class="font-semibold">Miguel Torres</div>
              <div class="text-sm text-gray-500">Podcaster, "Tech Talks"</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
// Testimonials data could be fetched dynamically here
</script>
