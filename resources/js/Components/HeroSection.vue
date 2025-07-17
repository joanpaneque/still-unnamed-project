<template>
  <section class="container mx-auto px-6 py-16 text-center">
    <div class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold inline-block mb-6">
      🚀 Coming Soon • Limited Early Access
    </div>

    <h1 class="text-5xl font-bold text-gray-900 mb-6">
      Turn text into natural voice<br>
      <span class="text-blue-600">for 80% less money</span>
    </h1>
    <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
      Generate professional audio for your videos, podcasts and content.
      Nearly identical quality to ElevenLabs, but saving you hundreds of dollars every month.
    </p>

    <div class="flex justify-center space-x-4 mb-12">
      <a href="#" class="bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 inline-block">
        Join waitlist free
      </a>
      <button class="border border-gray-300 text-gray-700 px-8 py-4 rounded-lg text-lg hover:bg-gray-50">
        See our pricing
      </button>
    </div>

    <!-- Social Proof -->
    <div class="text-gray-500 mb-8">
      <p>Over 1,247 creators already on the waitlist</p>
    </div>

    <!-- Language Selector -->
    <div class="mb-8">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Choose your language</h3>
      <div class="flex justify-center space-x-2">
        <button
          v-for="language in languages"
          :key="language.code"
          @click="selectedLanguage = language.code"
          :class="[
            'px-6 py-3 rounded-lg font-medium transition-colors',
            selectedLanguage === language.code
              ? 'bg-blue-600 text-white'
              : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
          ]"
        >
          {{ language.flag }} {{ language.name }}
        </button>
      </div>
    </div>

    <!-- Audio Player -->
    <div class="flex flex-wrap justify-center gap-4">
      <AudioPlayer
        v-for="voice in currentVoices"
        :key="voice.id"
        class="w-96 flex-shrink-0"
        :audio-src="voice.audioSrc"
        :gradient-from-color="voice.gradientFrom"
        :gradient-to-color="voice.gradientTo"
        :name="voice.name"
        :description="voice.description"
      />
    </div>

    <!-- More voices text -->
    <div class="mt-8 text-center">
      <p class="text-gray-600 text-lg">
        +50 more realistic voices in {{ currentLanguageName }}
      </p>
    </div>

  </section>
</template>

<script setup>
import { ref, computed } from 'vue'
import AudioPlayer from './AudioPlayer.vue'

const selectedLanguage = ref('en')

const languages = [
  { code: 'en', name: 'English', flag: '🇺🇸' },
  { code: 'es', name: 'Español', flag: '🇪🇸' },
  { code: 'fr', name: 'Français', flag: '🇫🇷' },
  { code: 'de', name: 'Deutsch', flag: '🇩🇪' }
]

const voices = {
  es: [
    {
      id: 'es-laura',
      name: 'Laura',
      description: 'Warm and friendly',
      audioSrc: '/voices/laura.mp3',
      gradientFrom: '#f59e0b',
      gradientTo: '#d97706'
    },
    {
      id: 'es-asco',
      name: 'Asco',
      description: 'Repelent voice',
      audioSrc: '/voices/asco.mp3',
      gradientFrom: '#ec4899',
      gradientTo: '#be185d'
    },
    {
      id: 'es-jorge',
      name: 'Jorge',
      description: 'Clear voice',
      audioSrc: '/voices/jorge.mp3',
      gradientFrom: '#10b981',
      gradientTo: '#059669'
    },
    {
      id: 'es-pablo',
      name: 'Pablo',
      description: 'Secure and confident',
      audioSrc: '/voices/pablo.mp3',
      gradientFrom: '#8b5cf6',
      gradientTo: '#7c3aed'
    },
    {
      id: 'es-ernesto',
      name: 'Ernesto',
      description: 'Bold documentary voice',
      audioSrc: '/voices/ernesto.mp3',
      gradientFrom: '#ef4444',
      gradientTo: '#dc2626'
    },
    {
      id: 'es-lucia',
      name: 'Lucía',
      description: 'Sweet tone',
      audioSrc: '/voices/lucia.mp3',
      gradientFrom: '#06b6d4',
      gradientTo: '#0891b2'
    }
  ],
  en: [
    {
      id: 'en-grandpa',
      name: 'Grandpa',
      description: 'Wise elder',
      audioSrc: '/voices/grandpa.mp3',
      gradientFrom: '#fb923c',
      gradientTo: '#ec4899'
    },
    {
      id: 'en-caleb',
      name: 'Caleb',
      description: 'Pro narrator',
      audioSrc: '/voices/caleb.mp3',
      gradientFrom: '#3b82f6',
      gradientTo: '#1d4ed8'
    },
    {
      id: 'en-emily',
      name: 'Emily',
      description: 'Fun and friendly',
      audioSrc: '/voices/emily.mp3',
      gradientFrom: '#8b5cf6',
      gradientTo: '#7c3aed'
    },
    {
      id: 'en-frida',
      name: 'Frida',
      description: 'Vibing',
      audioSrc: '/voices/frida.mp3',
      gradientFrom: '#84cc16',
      gradientTo: '#65a30d'
    },
    {
      id: 'en-evelyn',
      name: 'Evelyn',
      description: 'Calm and cool',
      audioSrc: '/voices/evelyn.mp3',
      gradientFrom: '#f97316',
      gradientTo: '#ea580c'
    },
    {
      id: 'en-jaxson',
      name: 'Jaxson',
      description: 'Fun and energetic',
      audioSrc: '/voices/jaxson.mp3',
      gradientFrom: '#14b8a6',
      gradientTo: '#0d9488'
    }
  ],
  fr: [
    {
      id: 'fr-pierre',
      name: 'Pierre',
      description: 'Elegant voice',
      audioSrc: '/voices/fr/pierre.mp3',
      gradientFrom: '#ef4444',
      gradientTo: '#dc2626'
    },
    {
      id: 'fr-claire',
      name: 'Claire',
      description: 'Soft tone',
      audioSrc: '/voices/fr/claire.mp3',
      gradientFrom: '#f97316',
      gradientTo: '#ea580c'
    },
    {
      id: 'fr-antoine',
      name: 'Antoine',
      description: 'Rich voice',
      audioSrc: '/voices/fr/antoine.mp3',
      gradientFrom: '#84cc16',
      gradientTo: '#65a30d'
    },
    {
      id: 'fr-marie',
      name: 'Marie',
      description: 'Sweet voice',
      audioSrc: '/voices/fr/marie.mp3',
      gradientFrom: '#a855f7',
      gradientTo: '#9333ea'
    },
    {
      id: 'fr-louis',
      name: 'Louis',
      description: 'Noble tone',
      audioSrc: '/voices/fr/louis.mp3',
      gradientFrom: '#6366f1',
      gradientTo: '#4f46e5'
    },
    {
      id: 'fr-camille',
      name: 'Camille',
      description: 'Gentle voice',
      audioSrc: '/voices/fr/camille.mp3',
      gradientFrom: '#ec4899',
      gradientTo: '#be185d'
    }
  ],
  de: [
    {
      id: 'de-hans',
      name: 'Hans',
      description: 'Pro speaker',
      audioSrc: '/voices/de/hans.mp3',
      gradientFrom: '#6366f1',
      gradientTo: '#4f46e5'
    },
    {
      id: 'de-greta',
      name: 'Greta',
      description: 'Warm voice',
      audioSrc: '/voices/de/greta.mp3',
      gradientFrom: '#14b8a6',
      gradientTo: '#0d9488'
    },
    {
      id: 'de-klaus',
      name: 'Klaus',
      description: 'Bold tone',
      audioSrc: '/voices/de/klaus.mp3',
      gradientFrom: '#a855f7',
      gradientTo: '#9333ea'
    },
    {
      id: 'de-anna',
      name: 'Anna',
      description: 'Clear tone',
      audioSrc: '/voices/de/anna.mp3',
      gradientFrom: '#f59e0b',
      gradientTo: '#d97706'
    },
    {
      id: 'de-wilhelm',
      name: 'Wilhelm',
      description: 'Strong voice',
      audioSrc: '/voices/de/wilhelm.mp3',
      gradientFrom: '#10b981',
      gradientTo: '#059669'
    },
    {
      id: 'de-ingrid',
      name: 'Ingrid',
      description: 'Smooth tone',
      audioSrc: '/voices/de/ingrid.mp3',
      gradientFrom: '#ef4444',
      gradientTo: '#dc2626'
    }
  ]
}

const currentVoices = computed(() => {
  return voices[selectedLanguage.value] || voices.en
})

const currentLanguageName = computed(() => {
  const language = languages.find(lang => lang.code === selectedLanguage.value)
  return language ? language.name : 'English'
})
</script>
