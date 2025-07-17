<template>
  <section id="pricing" class="bg-gray-50 py-20">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-4">
        Secure your early access
      </h2>
      <p class="text-center text-gray-600 mb-12">
        We're launching with limited spots. Reserve yours now and be among the first to save money with Amulet Voice.
      </p>

      <div class="max-w-4xl mx-auto grid md:grid-cols-2 gap-8">
        <!-- Free Waitlist -->
        <div class="bg-white rounded-2xl p-8 border border-gray-200">
          <div class="text-center mb-6">
            <h3 class="text-2xl font-semibold mb-2">Free Waitlist</h3>
            <div class="text-4xl font-bold text-gray-900 mb-2">$0</div>
            <p class="text-gray-600">Join the regular queue</p>
          </div>

          <ul class="space-y-4 mb-8">
            <li class="flex items-center">
              <span class="text-green-500 mr-3">✓</span>
              <span>Get notified when we launch</span>
            </li>
            <li class="flex items-center">
              <span class="text-green-500 mr-3">✓</span>
              <span>Access within 4-6 weeks of launch</span>
            </li>
            <li class="flex items-center">
              <span class="text-green-500 mr-3">✓</span>
              <span>$1 free credit when you join</span>
            </li>
            <li class="flex items-center">
              <span class="text-green-500 mr-3">✓</span>
              <span>All features included</span>
            </li>
            <li class="flex items-center">
              <span class="text-red-500 mr-3">✗</span>
              <span>Access not guaranteed</span>
            </li>
          </ul>

          <a href="#" class="block w-full bg-gray-100 text-gray-700 py-4 rounded-lg text-lg font-semibold hover:bg-gray-200 mb-4 text-center">
            Join free waitlist
          </a>

          <div class="text-center">
            <p class="text-sm text-gray-500">
              <span class="font-semibold text-orange-600">847</span> people in queue
            </p>
          </div>
        </div>

        <!-- Priority Access -->
        <div class="bg-white rounded-2xl p-8 border-2 border-blue-500 relative">
          <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-blue-500 text-white px-4 py-1 rounded-full text-sm">
            Skip the line
          </div>

          <div class="text-center mb-6">
            <h3 class="text-2xl font-semibold mb-2">Priority Access</h3>
            <div class="text-4xl font-bold text-gray-900 mb-2">$5</div>
            <p class="text-gray-600">Get immediate access at launch</p>
          </div>

          <ul class="space-y-4 mb-8">
            <li class="flex items-center">
              <span class="text-green-500 mr-3">✓</span>
              <span><strong>Instant access</strong> on launch day</span>
            </li>
            <li class="flex items-center">
              <span class="text-green-500 mr-3">✓</span>
              <span><strong>$10 in credits</strong> (double your money)</span>
            </li>
            <li class="flex items-center">
              <span class="text-green-500 mr-3">✓</span>
              <span><strong>Priority customer support</strong></span>
            </li>
            <li class="flex items-center">
              <span class="text-green-500 mr-3">✓</span>
              <span><strong>25 exclusive extra voices</strong> (forever yours only)</span>
            </li>
            <li class="flex items-center">
              <span class="text-green-500 mr-3">✓</span>
              <span><strong>Exclusive beta tester badge</strong></span>
            </li>
          </ul>

          <button class="w-full bg-blue-600 text-white py-4 rounded-lg text-lg font-semibold hover:bg-blue-700 mb-4">
            Get priority access
          </button>

          <div class="text-center">
            <p class="text-sm text-gray-500">
              <span class="font-semibold text-green-600">127</span> priority spots secured
            </p>
          </div>
        </div>
      </div>

      <!-- Launch Timeline -->
      <div class="max-w-3xl mx-auto mt-12">
        <div class="bg-white rounded-xl p-6">
          <h3 class="text-xl font-semibold text-center mb-6">Launch Timeline</h3>
          <div class="flex items-center justify-between">
            <div class="flex flex-col items-center">
              <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-bold mb-2">
                ✓
              </div>
              <p class="text-sm text-gray-600 text-center">Pre-registration<br><strong>Open now</strong></p>
            </div>
            <div class="flex-1 h-1 bg-gray-200 mx-4">
              <div class="h-full bg-blue-500 w-1/3"></div>
            </div>
            <div class="flex flex-col items-center">
              <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold mb-2">
                2
              </div>
              <p class="text-sm text-gray-600 text-center">Beta launch<br><strong>September 2025</strong></p>
            </div>
            <div class="flex-1 h-1 bg-gray-200 mx-4"></div>
            <div class="flex flex-col items-center">
              <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center text-gray-600 font-bold mb-2">
                3
              </div>
              <p class="text-sm text-gray-600 text-center">Public launch<br><strong>January 2026</strong></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Future Pricing -->
      <div class="max-w-4xl mx-auto mt-12">
        <div class="bg-white rounded-lg border border-gray-300 overflow-hidden">
          <div class="bg-blue-600 text-white text-center py-6">
            <h3 class="text-xl font-semibold mb-1">Future Pricing (After Launch)</h3>
            <p class="text-blue-100 text-sm">Pay-per-use pricing. No subscriptions.</p>
          </div>

          <div class="p-8">
            <div class="grid md:grid-cols-3 gap-6">
              <!-- Per Character -->
              <div class="border border-gray-200 rounded p-6 text-center">
                <div class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-3">Base Rate</div>
                <div class="text-2xl font-bold text-gray-900 mb-1">$0.0167</div>
                <div class="text-sm text-gray-600">per 1,000 characters</div>
              </div>

              <!-- Per Video -->
              <div class="border border-gray-200 rounded p-6 text-center bg-gray-50">
                <div class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-3">Cost Per Video</div>
                <div class="text-2xl font-bold text-gray-900 mb-1">${{ costPerVideo }}</div>
                <div class="text-sm text-gray-600">{{ formattedDuration }} content</div>
              </div>

              <!-- Monthly Estimate -->
              <div class="border border-gray-200 rounded p-6 text-center">
                <div class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-3">Cost Per Month</div>
                <div class="text-2xl font-bold text-gray-900 mb-1">${{ totalMonthlyCost }}</div>
                <div class="text-sm text-gray-600">{{ videosPerMonth }} videos per month</div>
              </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200">
              <div class="text-center">
                <p class="text-sm text-gray-600 font-medium">
                  80% cheaper than competitors • Zero monthly commitments
                </p>
              </div>
            </div>

            <!-- Interactive Pricing Calculator -->
            <div class="mt-8 pt-6 border-t border-gray-200">
              <h4 class="text-lg font-semibold text-center mb-6 text-gray-900">Calculate Your Cost</h4>

              <div class="space-y-6">
                <!-- Minutes per video slider -->
                <div>
                  <div class="flex justify-between items-center mb-3">
                    <label class="text-sm font-medium text-gray-700">Minutes per video</label>
                    <span class="text-sm font-semibold text-blue-600">{{ formattedDuration }}</span>
                  </div>
                  <input
                    type="range"
                    v-model="minutesPerVideo"
                    min="1"
                    max="180"
                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider"
                  >
                  <div class="flex justify-between text-xs text-gray-500 mt-1">
                    <span>1 min</span>
                    <span>3 hours</span>
                  </div>
                </div>

                <!-- Videos per month slider -->
                <div>
                  <div class="flex justify-between items-center mb-3">
                    <label class="text-sm font-medium text-gray-700">Videos per month</label>
                    <span class="text-sm font-semibold text-blue-600">{{ videosPerMonth }} videos</span>
                  </div>
                  <input
                    type="range"
                    v-model="videosPerMonth"
                    min="1"
                    max="120"
                    class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider"
                  >
                  <div class="flex justify-between text-xs text-gray-500 mt-1">
                    <span>1 video</span>
                    <span>120 videos</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, computed } from 'vue'

// Reactive data for sliders
const minutesPerVideo = ref(10)
const videosPerMonth = ref(16)

// Pricing constants
const PRICE_PER_1000_CHARS = 0.0167
const CHARS_PER_MINUTE = 1000

// Computed properties for calculations
const costPerVideo = computed(() => {
  const totalChars = minutesPerVideo.value * CHARS_PER_MINUTE
  const cost = (totalChars / 1000) * PRICE_PER_1000_CHARS
  return cost.toFixed(4)
})

const totalMonthlyCost = computed(() => {
  const monthlyCost = parseFloat(costPerVideo.value) * videosPerMonth.value
  return monthlyCost.toFixed(2)
})

// Computed property for formatted duration
const formattedDuration = computed(() => {
  const hours = Math.floor(minutesPerVideo.value / 60)
  const minutes = minutesPerVideo.value % 60

  if (hours === 0) {
    return `${minutes}m`
  } else if (minutes === 0) {
    return `${hours}h`
  } else {
    return `${hours}h ${minutes}m`
  }
})
</script>

<style scoped>
/* Custom slider styling */
.slider::-webkit-slider-thumb {
  appearance: none;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  background: #2563eb;
  cursor: pointer;
  border: 2px solid #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.slider::-moz-range-thumb {
  height: 20px;
  width: 20px;
  border-radius: 50%;
  background: #2563eb;
  cursor: pointer;
  border: 2px solid #ffffff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.slider::-webkit-slider-track {
  background: #e5e7eb;
  border-radius: 5px;
}

.slider::-moz-range-track {
  background: #e5e7eb;
  border-radius: 5px;
}
</style>
