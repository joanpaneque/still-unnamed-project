<script setup>
import { ref, computed } from 'vue'
import AudioPlayer from './AudioPlayer.vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

const priorityQueueUsers = page.props.priorityQueueUsers
const freeAccessUsers = page.props.freeAccessUsers

const selectedLanguage = ref('en')

const scrollToPricing = (event) => {
  event.preventDefault();
  const pricingSection = document.querySelector('#pricing');
  if (pricingSection) {
    const yOffset = -100; // Margen de 100px desde arriba
    const y = pricingSection.getBoundingClientRect().top + window.pageYOffset + yOffset;

    window.scrollTo({
      top: y,
      behavior: 'smooth'
    });
  }
}

const scrollToFuturePricing = (event) => {
  event.preventDefault();
  // Buscar específicamente el elemento que contiene "Future Pricing (After Launch)"
  const elements = document.querySelectorAll('#pricing h3');
  let futurePricingSection = null;

  elements.forEach(element => {
    if (element.textContent.includes('Future Pricing')) {
      futurePricingSection = element.closest('.max-w-4xl');
    }
  });

  if (futurePricingSection) {
    const yOffset = -180; // Margen de 180px desde arriba
    const y = futurePricingSection.getBoundingClientRect().top + window.pageYOffset + yOffset;

    window.scrollTo({
      top: y,
      behavior: 'smooth'
    });
  }
}

const languages = [
  { code: 'en', name: 'English', flag: '🇺🇸' },
  { code: 'es', name: 'Español', flag: '🇪🇸' },
  { code: 'fr', name: 'Français', flag: '🇫🇷' },
  { code: 'de', name: 'Deutsch', flag: '🇩🇪' },
  { code: 'ru', name: 'Русский', flag: '🇷🇺' }
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
      id: 'fr-antoine',
      name: 'Antoine',
      description: 'Elegant voice',
      audioSrc: '/voices/antoine.mp3',
      gradientFrom: '#ef4444',
      gradientTo: '#dc2626'
    },
    {
      id: 'fr-claire',
      name: 'Claire',
      description: 'Soft tone',
      audioSrc: '/voices/claire.mp3',
      gradientFrom: '#f97316',
      gradientTo: '#ea580c'
    },
    {
      id: 'fr-gabriel',
      name: 'Gabriel',
      description: 'Rich voice',
      audioSrc: '/voices/gabriel.mp3',
      gradientFrom: '#84cc16',
      gradientTo: '#65a30d'
    },
    {
      id: 'fr-isabelle',
      name: 'Isabelle',
      description: 'Sweet voice',
      audioSrc: '/voices/isabelle.mp3',
      gradientFrom: '#a855f7',
      gradientTo: '#9333ea'
    },
    {
      id: 'fr-marc',
      name: 'Marc',
      description: 'Noble tone',
      audioSrc: '/voices/marc.mp3',
      gradientFrom: '#6366f1',
      gradientTo: '#4f46e5'
    },
    {
      id: 'fr-sophie',
      name: 'Sophie',
      description: 'Gentle voice',
      audioSrc: '/voices/sophie.mp3',
      gradientFrom: '#ec4899',
      gradientTo: '#be185d'
    }
  ],
  de: [
    {
      id: 'de-sophie',
      name: 'Sophie',
      description: 'Pro speaker',
      audioSrc: '/voices/sophiebecker.mp3',
      gradientFrom: '#6366f1',
      gradientTo: '#4f46e5'
    },
    {
      id: 'de-lukas',
      name: 'Lukas',
      description: 'Warm voice',
      audioSrc: '/voices/lukas.mp3',
      gradientFrom: '#14b8a6',
      gradientTo: '#0d9488'
    },
    {
      id: 'de-elias',
      name: 'Elias',
      description: 'Bold tone',
      audioSrc: '/voices/elias.mp3',
      gradientFrom: '#a855f7',
      gradientTo: '#9333ea'
    },
    {
      id: 'de-lena',
      name: 'Lena',
      description: 'Clear tone',
      audioSrc: '/voices/lena.mp3',
      gradientFrom: '#f59e0b',
      gradientTo: '#d97706'
    },
    {
      id: 'de-clara',
      name: 'Clara',
      description: 'Strong voice',
      audioSrc: '/voices/clara.mp3',
      gradientFrom: '#10b981',
      gradientTo: '#059669'
    },
    {
      id: 'de-jonas',
      name: 'Jonas',
      description: 'Smooth tone',
      audioSrc: '/voices/jonas.mp3',
      gradientFrom: '#ef4444',
      gradientTo: '#dc2626'
    }
  ],
  ru: [
    {
      id: 'ru-andrei',
      name: 'Andrei',
      description: 'Pro speaker',
      audioSrc: '/voices/andrei.mp3',
      gradientFrom: '#fbbf24',
      gradientTo: '#f59e0b'
    },
    {
      id: 'ru-dmitriy',
      name: 'Dmitriy',
      description: 'Deep voice',
      audioSrc: '/voices/dmitriy.mp3',
      gradientFrom: '#fb7185',
      gradientTo: '#f43f5e'
    },
    {
      id: 'ru-ekaterina',
      name: 'Ekaterina',
      description: 'Elegant tone',
      audioSrc: '/voices/ekaterina.mp3',
      gradientFrom: '#34d399',
      gradientTo: '#10b981'
    },
    {
      id: 'ru-ivan',
      name: 'Ivan',
      description: 'Strong voice',
      audioSrc: '/voices/ivan.mp3',
      gradientFrom: '#60a5fa',
      gradientTo: '#3b82f6'
    },
    {
      id: 'ru-natalia',
      name: 'Natalia',
      description: 'Warm tone',
      audioSrc: '/voices/natalia.mp3',
      gradientFrom: '#c084fc',
      gradientTo: '#a855f7'
    },
    {
      id: 'ru-olga',
      name: 'Olga',
      description: 'Soft voice',
      audioSrc: '/voices/olga.mp3',
      gradientFrom: '#22d3ee',
      gradientTo: '#06b6d4'
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
      <button @click="scrollToPricing" class="relative bg-blue-600 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/50 hover:bg-gradient-to-r hover:from-blue-500 hover:via-indigo-600 hover:to-purple-600 overflow-hidden group">
        <span class="relative z-10">Join waitlist</span>
        <!-- Efecto shimmer -->
        <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/30 to-transparent skew-x-12"></div>
        <!-- Glow effect -->
        <div class="absolute inset-0 rounded-lg bg-gradient-to-r from-blue-400 to-purple-600 opacity-0 group-hover:opacity-20 transition-opacity duration-300 blur-xl"></div>
      </button>
      <button @click="scrollToFuturePricing" class="border border-gray-300 text-gray-700 px-8 py-4 rounded-lg text-lg hover:bg-gray-50 transition-colors duration-200">
        Pricing
      </button>
    </div>

    <!-- Social Proof -->
    <div class="text-gray-500 mb-8">
      <p>Over {{ parseInt(priorityQueueUsers + freeAccessUsers).toLocaleString() }} creators already on the waitlist</p>
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
