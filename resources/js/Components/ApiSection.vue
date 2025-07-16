<template>
  <section id="api" class="py-20">
    <div class="container mx-auto px-6">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold mb-8 text-center">
          API for developers
        </h2>
        <p class="text-center text-gray-600 mb-12">
          Integrate TTS into your app in minutes. Clear documentation, real examples.
        </p>

        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div>
            <h3 class="text-xl font-semibold mb-6">Simple integration</h3>
            <ul class="space-y-4 text-gray-600">
              <li class="flex items-start">
                <span class="text-green-500 mr-3">✓</span>
                REST API with JSON responses
              </li>
              <li class="flex items-start">
                <span class="text-green-500 mr-3">✓</span>
                SDKs for Python, Node.js, PHP
              </li>
              <li class="flex items-start">
                <span class="text-green-500 mr-3">✓</span>
                Webhooks for long processes
              </li>
              <li class="flex items-start">
                <span class="text-green-500 mr-3">✓</span>
                99.9% uptime guaranteed
              </li>
            </ul>

            <div class="mt-8">
              <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 mr-4">
                View documentation
              </button>
              <button class="border border-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-50">
                Try API
              </button>
            </div>
          </div>

          <div class="bg-gray-900 text-green-400 p-6 rounded-xl font-mono text-sm">
            <div class="text-gray-500 mb-2">// Basic example</div>
            <div class="text-blue-400">curl</div> <span class="text-yellow-400">-X POST</span> \<br>
            <span class="ml-2 text-gray-300">https://api.voicegen.com/v1/tts</span> \<br>
            <span class="ml-2 text-yellow-400">-H</span> <span class="text-gray-300">"Authorization: Bearer your-api-key"</span> \<br>
            <span class="ml-2 text-yellow-400">-d</span> <span class="text-gray-300">'{"text": "Hello world", "voice": "sarah"}'</span>

            <div class="mt-4 text-gray-500">// Response</div>
            <div class="text-gray-300">
              {<br>
              <span class="ml-2">"audio_url": "https://cdn.voicegen.com/audio123.mp3",</span><br>
              <span class="ml-2">"duration": 2.5,</span><br>
              <span class="ml-2">"status": "completed"</span><br>
              }
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
// API documentation links and code examples could be dynamic here
</script>
