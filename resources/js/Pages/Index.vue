<script setup>
import { ref, onMounted } from 'vue'

const email = ref('')
const isSubmitting = ref(false)
const isSubmitted = ref(false)
const isPlaying = ref(false)
const currentWave = ref(0)
const particles = ref([])

// Audio visualization simulation
const waveData = ref([
  [12, 8, 15, 22, 18, 25, 30, 28, 35, 40, 38, 42, 45, 40, 35, 30, 25, 20, 15, 10],
  [8, 12, 18, 25, 22, 30, 35, 32, 40, 45, 42, 48, 50, 45, 40, 35, 28, 22, 18, 12],
  [15, 10, 20, 28, 25, 32, 38, 35, 42, 48, 45, 50, 52, 48, 42, 38, 32, 25, 20, 15]
])

const handleSubmit = async () => {
  if (!email.value) return

  isSubmitting.value = true
  setTimeout(() => {
    isSubmitted.value = true
    isSubmitting.value = false
  }, 1500)
}

const toggleAudio = () => {
  isPlaying.value = !isPlaying.value
  if (isPlaying.value) {
    const interval = setInterval(() => {
      currentWave.value = (currentWave.value + 1) % waveData.value.length
    }, 150)
    setTimeout(() => {
      clearInterval(interval)
      isPlaying.value = false
    }, 3000)
  }
}

// Generate floating particles
const generateParticles = () => {
  particles.value = Array.from({ length: 50 }, (_, i) => ({
    id: i,
    x: Math.random() * 100,
    y: Math.random() * 100,
    size: Math.random() * 4 + 2,
    delay: Math.random() * 3
  }))
}

onMounted(() => {
  generateParticles()
})
</script>

<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white overflow-hidden">
    <!-- Floating particles background -->
    <div class="fixed inset-0 pointer-events-none">
      <div
        v-for="particle in particles"
        :key="particle.id"
        class="absolute w-1 h-1 bg-orange-400 rounded-full opacity-20 animate-float"
        :style="{
          left: particle.x + '%',
          top: particle.y + '%',
          animationDelay: particle.delay + 's',
          width: particle.size + 'px',
          height: particle.size + 'px'
        }"
      />
    </div>

    <!-- Hero Section -->
    <section class="relative max-w-7xl mx-auto px-6 py-20 md:py-32">
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <!-- Left Column - Text -->
        <div class="space-y-8">
          <div class="space-y-6">
            <h1 class="text-5xl md:text-7xl font-display font-bold leading-tight">
              Voice that
              <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">
                transcends
              </span>
              <br>artificial
            </h1>

            <p class="text-xl md:text-2xl text-slate-300 leading-relaxed max-w-lg">
              Text-to-speech API indistinguishable from human speech.
              Build audio experiences that truly connect.
            </p>
          </div>

          <!-- CTA Form -->
          <div class="space-y-4">
            <div v-if="!isSubmitted" class="flex flex-col sm:flex-row gap-4 max-w-md">
              <input
                v-model="email"
                type="email"
                placeholder="you@startup.com"
                class="flex-1 px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent backdrop-blur-sm transition-all"
                required
              />
              <button
                @click="handleSubmit"
                :disabled="isSubmitting || !email"
                class="px-8 py-4 bg-gradient-to-r from-orange-500 to-pink-500 text-white font-semibold rounded-xl hover:from-orange-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-slate-900 disabled:opacity-50 disabled:cursor-not-allowed transition-all transform hover:scale-105 active:scale-95"
              >
                {{ isSubmitting ? 'Connecting...' : 'Get Beta Access' }}
              </button>
            </div>

            <div v-else class="text-center max-w-md">
              <div class="inline-flex items-center justify-center w-16 h-16 bg-green-500/20 rounded-full mb-4 animate-pulse">
                <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <h3 class="text-xl font-semibold mb-2">Welcome to the future!</h3>
              <p class="text-slate-400">We'll grant you access within 48 hours.</p>
            </div>

            <p class="text-sm text-slate-500">
              <span class="inline-flex items-center">
                <svg class="w-4 h-4 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                First 1000 developers → Lifetime free access
              </span>
            </p>
          </div>
        </div>

        <!-- Right Column - Audio Demo -->
        <div class="relative">
          <div class="bg-gradient-to-br from-slate-800/50 to-purple-800/30 backdrop-blur-sm rounded-3xl p-8 border border-white/10">
            <div class="space-y-6">
              <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold">Live Demo</h3>
                <div class="flex items-center space-x-2 text-sm text-slate-400">
                  <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                  <span>Processing in real-time</span>
                </div>
              </div>

              <!-- Audio Waveform Visualization -->
              <div class="relative h-32 bg-slate-900/50 rounded-xl p-4 overflow-hidden">
                <div class="flex items-end justify-center space-x-1 h-full">
                  <div
                    v-for="(height, index) in waveData[currentWave]"
                    :key="index"
                    class="bg-gradient-to-t from-orange-500 to-pink-500 rounded-full transition-all duration-150"
                    :style="{
                      height: height + 'px',
                      width: '6px',
                      opacity: isPlaying ? 1 : 0.3
                    }"
                  />
                </div>

                <!-- Play button overlay -->
                <button
                  @click="toggleAudio"
                  class="absolute inset-0 flex items-center justify-center bg-black/20 hover:bg-black/40 transition-colors group"
                >
                  <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-white/20 transition-colors">
                    <svg v-if="!isPlaying" class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                    <svg v-else class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
                    </svg>
                  </div>
                </button>
              </div>

              <div class="text-center space-y-2">
                <p class="text-slate-300">"Hello, I'm an AI-generated voice that sounds completely natural"</p>
                <p class="text-sm text-slate-500">English • Female voice • Conversational tone</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="relative max-w-7xl mx-auto px-6 py-20">
      <div class="text-center mb-16">
        <h2 class="text-4xl md:text-5xl font-display font-bold mb-6">
          Technology that
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">
            redefines
          </span>
          audio
        </h2>
        <p class="text-xl text-slate-400 max-w-2xl mx-auto">
          Beyond traditional synthesis. We create voices that understand context, emotion, and human nuance.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="group relative bg-gradient-to-br from-slate-800/50 to-purple-800/30 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-orange-500/30 transition-all duration-300 hover:scale-105">
          <div class="absolute inset-0 bg-gradient-to-r from-orange-500/5 to-pink-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
          <div class="relative">
            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-pink-500 rounded-xl flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4">Sub-second latency</h3>
            <p class="text-slate-400 leading-relaxed">
              Real-time streaming with less than 300ms latency. Perfect for chatbots, assistants, and interactive applications.
            </p>
          </div>
        </div>

        <!-- Feature 2 -->
        <div class="group relative bg-gradient-to-br from-slate-800/50 to-purple-800/30 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-orange-500/30 transition-all duration-300 hover:scale-105">
          <div class="absolute inset-0 bg-gradient-to-r from-orange-500/5 to-pink-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
          <div class="relative">
            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-pink-500 rounded-xl flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4">Authentic emotions</h3>
            <p class="text-slate-400 leading-relaxed">
              Control tone, pace, and emotion with precision. From intimate whispers to energetic presentations.
            </p>
          </div>
        </div>

        <!-- Feature 3 -->
        <div class="group relative bg-gradient-to-br from-slate-800/50 to-purple-800/30 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:border-orange-500/30 transition-all duration-300 hover:scale-105">
          <div class="absolute inset-0 bg-gradient-to-r from-orange-500/5 to-pink-500/5 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
          <div class="relative">
            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-pink-500 rounded-xl flex items-center justify-center mb-6">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
              </svg>
            </div>
            <h3 class="text-xl font-semibold mb-4">Frictionless integration</h3>
            <p class="text-slate-400 leading-relaxed">
              One line of code to get started. SDKs for JavaScript, Python, Go, and more. Documentation that needs no explanation.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- API Demo Section -->
    <section class="relative max-w-7xl mx-auto px-6 py-20">
      <div class="grid lg:grid-cols-2 gap-16 items-center">
        <!-- Left - Code Example -->
        <div class="space-y-6">
          <div class="space-y-4">
            <h2 class="text-3xl md:text-4xl font-display font-bold">
              API designed for
              <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">
                builders
              </span>
            </h2>
            <p class="text-lg text-slate-400">
              Forget complex configurations. Our API speaks your programming language.
            </p>
          </div>

          <!-- Code Block -->
          <div class="bg-slate-900/80 backdrop-blur-sm rounded-2xl border border-white/10 overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 border-b border-white/10">
              <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
              </div>
              <span class="text-sm text-slate-500">voice-api.js</span>
            </div>
            <div class="p-6 overflow-x-auto">
              <pre class="text-sm leading-relaxed"><code><span class="text-purple-400">const</span> <span class="text-blue-300">response</span> <span class="text-white">=</span> <span class="text-purple-400">await</span> <span class="text-blue-300">fetch</span><span class="text-white">(</span><span class="text-green-400">'https://api.voicecraft.dev/v1/speak'</span><span class="text-white">, {</span>
  <span class="text-blue-300">method</span><span class="text-white">:</span> <span class="text-green-400">'POST'</span><span class="text-white">,</span>
  <span class="text-blue-300">headers</span><span class="text-white">: {</span>
    <span class="text-green-400">'Authorization'</span><span class="text-white">:</span> <span class="text-green-400">'Bearer your-api-key'</span><span class="text-white">,</span>
    <span class="text-green-400">'Content-Type'</span><span class="text-white">:</span> <span class="text-green-400">'application/json'</span>
  <span class="text-white">},</span>
  <span class="text-blue-300">body</span><span class="text-white">:</span> <span class="text-blue-300">JSON</span><span class="text-white">.</span><span class="text-blue-300">stringify</span><span class="text-white">({</span>
    <span class="text-blue-300">text</span><span class="text-white">:</span> <span class="text-green-400">'Hello, this sounds incredibly natural'</span><span class="text-white">,</span>
    <span class="text-blue-300">voice</span><span class="text-white">:</span> <span class="text-green-400">'elena-en'</span><span class="text-white">,</span>
    <span class="text-blue-300">emotion</span><span class="text-white">:</span> <span class="text-green-400">'conversational'</span><span class="text-white">,</span>
    <span class="text-blue-300">speed</span><span class="text-white">:</span> <span class="text-orange-400">1.0</span>
  <span class="text-white">})</span>
<span class="text-white">})</span>

<span class="text-slate-500">// Real-time audio streaming</span>
<span class="text-purple-400">const</span> <span class="text-blue-300">audioStream</span> <span class="text-white">=</span> <span class="text-purple-400">await</span> <span class="text-blue-300">response</span><span class="text-white">.</span><span class="text-blue-300">body</span>
<span class="text-blue-300">playAudioStream</span><span class="text-white">(</span><span class="text-blue-300">audioStream</span><span class="text-white">)</span></code></pre>
            </div>
          </div>
        </div>

        <!-- Right - Benefits -->
        <div class="space-y-8">
          <div class="space-y-6">
            <div class="flex items-start space-x-4">
              <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-pink-500 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <h3 class="text-lg font-semibold mb-2">Millisecond response</h3>
                <p class="text-slate-400">First word in under 300ms. Continuous streaming for fluid experiences.</p>
              </div>
            </div>

            <div class="flex items-start space-x-4">
              <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-pink-500 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <h3 class="text-lg font-semibold mb-2">Auto-scaling</h3>
                <p class="text-slate-400">From 10 to 10M requests/day. Infrastructure adapts to your growth.</p>
              </div>
            </div>

            <div class="flex items-start space-x-4">
              <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-pink-500 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <h3 class="text-lg font-semibold mb-2">Real-time monitoring</h3>
                <p class="text-slate-400">Dashboard with detailed metrics, logs, and alerts. Debugging without mysteries.</p>
              </div>
            </div>
          </div>

          <div class="pt-6">
            <a href="#" class="inline-flex items-center text-orange-400 hover:text-orange-300 font-semibold group">
              View complete documentation
              <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Pricing Section -->
    <section class="relative max-w-7xl mx-auto px-6 py-20">
      <div class="text-center mb-16">
        <h2 class="text-4xl md:text-5xl font-display font-bold mb-6">
          Pricing that
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">
            scales
          </span>
          with you
        </h2>
        <p class="text-xl text-slate-400 max-w-2xl mx-auto">
          From your first prototype to millions of users. No surprises, no hidden limits.
        </p>
      </div>

      <div class="grid md:grid-cols-3 gap-8">
        <!-- Starter Plan -->
        <div class="relative bg-gradient-to-br from-slate-800/50 to-purple-800/30 backdrop-blur-sm rounded-2xl p-8 border border-white/10">
          <div class="space-y-6">
            <div>
              <h3 class="text-xl font-semibold mb-2">Starter</h3>
              <p class="text-slate-400">For prototypes and small projects</p>
            </div>

            <div class="space-y-2">
              <div class="flex items-baseline">
                <span class="text-4xl font-bold">$0</span>
                <span class="text-slate-400 ml-2">/month</span>
              </div>
              <p class="text-sm text-slate-500">First 10,000 characters free</p>
            </div>

            <ul class="space-y-3">
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">5 premium voices</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">REST API + WebSocket</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">Email support</span>
              </li>
            </ul>

            <button class="w-full py-3 bg-slate-700 hover:bg-slate-600 text-white font-semibold rounded-xl transition-colors">
              Start free
            </button>
          </div>
        </div>

        <!-- Pro Plan -->
        <div class="relative bg-gradient-to-br from-orange-500/10 to-pink-500/10 backdrop-blur-sm rounded-2xl p-8 border-2 border-orange-500/30 scale-105">
          <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
            <span class="bg-gradient-to-r from-orange-500 to-pink-500 text-white px-4 py-1 rounded-full text-sm font-semibold">
              Most popular
            </span>
          </div>

          <div class="space-y-6">
            <div>
              <h3 class="text-xl font-semibold mb-2">Pro</h3>
              <p class="text-slate-400">For growing startups and businesses</p>
            </div>

            <div class="space-y-2">
              <div class="flex items-baseline">
                <span class="text-4xl font-bold">$49</span>
                <span class="text-slate-400 ml-2">/month</span>
              </div>
              <p class="text-sm text-slate-500">Up to 1M characters included</p>
            </div>

            <ul class="space-y-3">
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">20+ premium voices</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">Emotion control</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">Real-time streaming</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">Priority support</span>
              </li>
            </ul>

            <button class="w-full py-3 bg-gradient-to-r from-orange-500 to-pink-500 hover:from-orange-600 hover:to-pink-600 text-white font-semibold rounded-xl transition-all transform hover:scale-105">
              Start Pro
            </button>
          </div>
        </div>

        <!-- Enterprise Plan -->
        <div class="relative bg-gradient-to-br from-slate-800/50 to-purple-800/30 backdrop-blur-sm rounded-2xl p-8 border border-white/10">
          <div class="space-y-6">
            <div>
              <h3 class="text-xl font-semibold mb-2">Enterprise</h3>
              <p class="text-slate-400">For teams that need maximum power</p>
            </div>

            <div class="space-y-2">
              <div class="flex items-baseline">
                <span class="text-4xl font-bold">Custom</span>
              </div>
              <p class="text-sm text-slate-500">Unlimited volume</p>
            </div>

            <ul class="space-y-3">
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">Custom voices</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">Dedicated infrastructure</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">99.9% SLA</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-slate-300">24/7 support</span>
              </li>
            </ul>

            <button class="w-full py-3 bg-slate-700 hover:bg-slate-600 text-white font-semibold rounded-xl transition-colors">
              Contact sales
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Final CTA Section -->
    <section class="relative max-w-4xl mx-auto px-6 py-20 text-center">
      <div class="bg-gradient-to-br from-slate-800/50 to-purple-800/30 backdrop-blur-sm rounded-3xl p-12 border border-white/10">
        <div class="space-y-8">
          <div class="space-y-6">
            <h2 class="text-4xl md:text-5xl font-display font-bold">
              The future of audio
              <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-pink-500">
                starts today
              </span>
            </h2>
            <p class="text-xl text-slate-400 max-w-2xl mx-auto">
              Join the builders creating tomorrow's audio experiences.
              Limited beta access for the first 1000 developers.
            </p>
          </div>

          <!-- Final CTA -->
          <div class="max-w-md mx-auto">
            <div v-if="!isSubmitted" class="flex flex-col sm:flex-row gap-4">
              <input
                v-model="email"
                type="email"
                placeholder="you@startup.com"
                class="flex-1 px-6 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent backdrop-blur-sm transition-all"
                required
              />
              <button
                @click="handleSubmit"
                :disabled="isSubmitting || !email"
                class="px-8 py-4 bg-gradient-to-r from-orange-500 to-pink-500 text-white font-semibold rounded-xl hover:from-orange-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-slate-900 disabled:opacity-50 disabled:cursor-not-allowed transition-all transform hover:scale-105 active:scale-95"
              >
                {{ isSubmitting ? 'Connecting...' : 'Get beta access' }}
              </button>
            </div>

            <div v-else class="text-center">
              <div class="inline-flex items-center justify-center w-16 h-16 bg-green-500/20 rounded-full mb-4 animate-pulse">
                <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
              </div>
              <h3 class="text-xl font-semibold mb-2">Welcome to the future!</h3>
              <p class="text-slate-400">Check your email in the next few hours.</p>
            </div>
          </div>

          <div class="flex items-center justify-center space-x-8 text-sm text-slate-500">
            <div class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
              <span>No credit card required</span>
            </div>
            <div class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
              <span>Setup in < 5 minutes</span>
            </div>
            <div class="flex items-center">
              <svg class="w-4 h-4 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
              </svg>
              <span>Technical support included</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-white/10 py-12">
      <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <div class="mb-4 md:mb-0">
            <p class="text-slate-500">
              © 2024 VoiceCraft. Building the future of audio with AI.
            </p>
          </div>
          <div class="flex items-center space-x-6">
            <a href="#" class="text-slate-500 hover:text-orange-400 transition-colors">Docs</a>
            <a href="#" class="text-slate-500 hover:text-orange-400 transition-colors">Status</a>
            <a href="#" class="text-slate-500 hover:text-orange-400 transition-colors">Blog</a>
            <a href="#" class="text-slate-500 hover:text-orange-400 transition-colors">GitHub</a>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<style scoped>
/* Import Satoshi font */
@import url('https://fonts.googleapis.com/css2?family=Satoshi:wght@400;500;600;700;900&display=swap');

/* Import JetBrains Mono for code */
@import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&display=swap');

/* Apply fonts */
* {
  font-family: 'Satoshi', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

.font-display {
  font-family: 'Satoshi', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  font-weight: 900;
}

pre, code {
  font-family: 'JetBrains Mono', 'Fira Code', Consolas, monospace;
}

/* Custom animations */
@keyframes float {
  0%, 100% { transform: translateY(0px) rotate(0deg); }
  33% { transform: translateY(-10px) rotate(1deg); }
  66% { transform: translateY(5px) rotate(-1deg); }
}

.animate-float {
  animation: float 6s ease-in-out infinite;
}

/* Scrollbar styling */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: rgba(51, 65, 85, 0.3);
}

::-webkit-scrollbar-thumb {
  background: rgba(249, 115, 22, 0.5);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: rgba(249, 115, 22, 0.7);
}

/* Custom utilities */
.backdrop-blur-sm {
  backdrop-filter: blur(8px);
}

/* Gradient text selection */
::selection {
  background: rgba(249, 115, 22, 0.3);
  color: white;
}

/* Focus states */
button:focus-visible,
input:focus-visible {
  outline: 2px solid rgb(249 115 22);
  outline-offset: 2px;
}

/* Hover effects */
.group:hover .group-hover\:translate-x-1 {
  transform: translateX(0.25rem);
}

.group:hover .group-hover\:bg-white\/20 {
  background-color: rgba(255, 255, 255, 0.2);
}

.group:hover .group-hover\:bg-black\/40 {
  background-color: rgba(0, 0, 0, 0.4);
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .font-display {
    font-size: 2.5rem;
    line-height: 1.2;
  }

  .animate-float {
    animation-duration: 8s;
  }
}
</style>
