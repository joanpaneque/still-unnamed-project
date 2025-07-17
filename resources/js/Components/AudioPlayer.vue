<template>
  <div class="group relative bg-gradient-to-r from-gray-50 to-white p-4 rounded-2xl border border-gray-100 hover:border-gray-200 hover:shadow-lg transition-all duration-300 w-96 mx-auto">
    <!-- Decorative line -->
    <div
      class="absolute left-0 top-4 bottom-4 w-1 rounded-full opacity-60"
      :style="{ background: `linear-gradient(to bottom, ${gradientFromColor}, ${gradientToColor})` }"
    ></div>

    <div class="flex items-center pl-4">
      <!-- Avatar -->
      <div class="relative flex-shrink-0">
        <div
          class="w-16 h-16 rounded-2xl flex items-center justify-center shadow-lg"
          :style="{ background: `linear-gradient(to bottom right, ${gradientFromColor}, ${gradientToColor})` }"
        >
          <span class="text-white font-medium text-xl tracking-wide">{{ avatarLetter }}</span>
        </div>
        <!-- Status indicator -->
        <div v-if="isPlaying" class="absolute -top-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white animate-pulse"></div>
      </div>

      <!-- Voice info -->
      <div class="ml-3 min-w-0 flex-1 text-left">
        <h4 class="text-lg font-medium text-gray-900 mb-1">{{ name }}</h4>
        <p class="text-gray-500 text-sm font-light">{{ description }}</p>

        <!-- Progress bar -->
        <div class="mt-2">
          <div class="flex items-center space-x-2 text-xs text-gray-500 mb-1">
            <span>{{ formatTime(currentTime) }}</span>
            <span>{{ formatTime(duration) }}</span>
          </div>
          <div class="relative w-full h-1.5 bg-gray-200 rounded-full">
            <div
              class="absolute top-0 left-0 h-full rounded-full transition-all duration-100"
              :style="{
                width: progressPercentage + '%',
                background: `linear-gradient(to right, ${gradientFromColor}, ${gradientToColor})`
              }"
            ></div>
          </div>
        </div>
      </div>

      <!-- Control buttons -->
      <div class="flex items-center justify-end space-x-1.5 w-20 flex-shrink-0">
        <button
          v-if="!isPlaying && !isPaused"
          @click="play"
          class="w-9 h-9 bg-gray-900 hover:bg-gray-800 text-white rounded-lg transition-all duration-200 flex items-center justify-center shadow-lg hover:shadow-xl hover:scale-105"
        >
          <svg class="w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M8 5v14l11-7z"/>
          </svg>
        </button>

        <template v-if="isPlaying">
          <button
            @click="pause"
            class="w-9 h-9 bg-gray-900 hover:bg-amber-600 text-white rounded-lg transition-all duration-200 flex items-center justify-center shadow-lg hover:shadow-xl hover:scale-105"
          >
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
            </svg>
          </button>

          <button
            @click="stop"
            class="w-9 h-9 bg-gray-900 hover:bg-red-600 text-white rounded-lg transition-all duration-200 flex items-center justify-center shadow-lg hover:shadow-xl hover:scale-105"
          >
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6 6h12v12H6V6z"/>
            </svg>
          </button>
        </template>

        <template v-if="isPaused">
          <button
            @click="resume"
            class="w-9 h-9 bg-gray-900 hover:bg-gray-800 text-white rounded-lg transition-all duration-200 flex items-center justify-center shadow-lg hover:shadow-xl hover:scale-105"
          >
            <svg class="w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M8 5v14l11-7z"/>
            </svg>
          </button>

          <button
            @click="stop"
            class="w-9 h-9 bg-gray-900 hover:bg-red-600 text-white rounded-lg transition-all duration-200 flex items-center justify-center shadow-lg hover:shadow-xl hover:scale-105"
          >
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M6 6h12v12H6V6z"/>
            </svg>
          </button>
        </template>
      </div>
    </div>

    <!-- Hidden audio element -->
    <audio
      ref="audio"
      preload="metadata"
      @loadedmetadata="onLoadedMetadata"
      @timeupdate="onTimeUpdate"
      @ended="onEnded"
      @play="onPlay"
      @pause="onPause"
    >
      <source :src="audioSrc" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue'

// Props
const props = defineProps({
  audioSrc: {
    type: String,
    required: true
  },
  gradientFromColor: {
    type: String,
    default: '#fb923c' // orange-400
  },
  gradientToColor: {
    type: String,
    default: '#ec4899' // pink-500
  },
  name: {
    type: String,
    required: true
  },
  description: {
    type: String,
    default: ''
  }
})

// Unique ID for this player instance
const playerId = ref(Math.random().toString(36).substr(2, 9))

// Refs
const audio = ref(null)

// State
const isPlaying = ref(false)
const isPaused = ref(false)
const currentTime = ref(0)
const duration = ref(0)
const progressPercentage = ref(0)

// Computed
const avatarLetter = computed(() => {
  return props.name.charAt(0).toUpperCase()
})

// Global audio control - pause all other players
const pauseOtherPlayers = () => {
  // Dispatch custom event to pause all other players
  window.dispatchEvent(new CustomEvent('pauseAllAudioPlayers', {
    detail: { exceptPlayerId: playerId.value }
  }))
}

// Listen for pause events from other players
const handlePauseAllPlayers = (event) => {
  // Only pause if this event is not from this player
  if (event.detail.exceptPlayerId !== playerId.value) {
    if (audio.value && !audio.value.paused) {
      audio.value.pause()
    }
  }
}

// Format time helper
const formatTime = (seconds) => {
  if (!seconds || isNaN(seconds)) return '0:00'
  const minutes = Math.floor(seconds / 60)
  const remainingSeconds = Math.floor(seconds % 60)
  return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`
}

// Audio controls
const play = () => {
  if (audio.value) {
    // Pause all other players first
    pauseOtherPlayers()

    audio.value.play().catch(error => {
      console.error('Error playing audio:', error)
    })
  }
}

const pause = () => {
  if (audio.value) {
    audio.value.pause()
  }
}

const resume = () => {
  if (audio.value) {
    // Pause all other players first
    pauseOtherPlayers()

    audio.value.play().catch(error => {
      console.error('Error resuming audio:', error)
    })
  }
}

const stop = () => {
  if (audio.value) {
    audio.value.pause()
    audio.value.currentTime = 0
    isPlaying.value = false
    isPaused.value = false
    currentTime.value = 0
    progressPercentage.value = 0
  }
}

// Event handlers
const onLoadedMetadata = () => {
  if (audio.value) {
    duration.value = audio.value.duration
  }
}

const onTimeUpdate = () => {
  if (audio.value) {
    currentTime.value = audio.value.currentTime
    if (duration.value > 0) {
      progressPercentage.value = (audio.value.currentTime / duration.value) * 100
    }
  }
}

const onPlay = () => {
  isPlaying.value = true
  isPaused.value = false
}

const onPause = () => {
  isPlaying.value = false
  if (audio.value && audio.value.currentTime > 0 && audio.value.currentTime < duration.value) {
    isPaused.value = true
  }
}

const onEnded = () => {
  isPlaying.value = false
  isPaused.value = false
  currentTime.value = 0
  progressPercentage.value = 0
}

// Lifecycle hooks
onMounted(() => {
  // Listen for global pause events
  window.addEventListener('pauseAllAudioPlayers', handlePauseAllPlayers)
})

onUnmounted(() => {
  // Clean up event listener
  window.removeEventListener('pauseAllAudioPlayers', handlePauseAllPlayers)

  if (audio.value) {
    audio.value.pause()
  }
})
</script>
