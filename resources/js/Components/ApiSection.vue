<template>
  <section id="api" class="py-20">
    <div class="container mx-auto px-6">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl font-bold mb-8 text-center">
          Amulet Voice API
        </h2>
        <p class="text-center text-gray-600 mb-12">
          Integrate voice synthesis into your app in minutes. Clear documentation, real examples.
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
                <30 secs responses
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

          <div class="bg-gray-900 text-green-400 rounded-xl font-mono text-sm overflow-hidden">
            <!-- Tabs -->
            <div class="flex border-b border-gray-700">
              <button
                v-for="tab in tabs"
                :key="tab.id"
                @click="activeTab = tab.id"
                :class="[
                  'px-4 py-3 text-sm font-medium transition-colors',
                  activeTab === tab.id
                    ? 'bg-gray-800 text-white border-b-2 border-blue-500'
                    : 'text-gray-400 hover:text-white'
                ]"
              >
                {{ tab.name }}
              </button>
            </div>

            <!-- Code Content -->
            <div class="p-6">
              <!-- cURL Tab -->
              <div v-if="activeTab === 'curl'">
                <div class="text-gray-500 mb-2">// Basic example</div>
                <div class="text-blue-400">curl</div> <span class="text-yellow-400">-X POST</span> \<br>
                <span class="ml-2 text-gray-300">https://api.amuletvoice.com/v1/tts</span> \<br>
                <span class="ml-2 text-yellow-400">-H</span> <span class="text-gray-300">"Authorization: Bearer your-api-key"</span> \<br>
                <span class="ml-2 text-yellow-400">-d</span> <span class="text-gray-300">'{"text": "Hello world", "voice": "sarah"}'</span>

                <div class="mt-4 text-gray-500">// Response</div>
                <div class="text-gray-300">
                  {<br>
                  <span class="ml-2">"audio_url": "https://cdn.amuletvoice.com/audio123.mp3",</span><br>
                  <span class="ml-2">"duration": 2.5,</span><br>
                  <span class="ml-2">"status": "completed"</span><br>
                  }
                </div>
              </div>

              <!-- Python Tab -->
              <div v-if="activeTab === 'python'">
                <div class="text-gray-500 mb-2"># Python example</div>
                <div class="text-blue-400">import</div> <span class="text-gray-300">requests</span><br><br>

                <div class="text-gray-300">url = <span class="text-yellow-400">"https://api.amuletvoice.com/v1/tts"</span></div><br>
                <div class="text-gray-300">headers = {</div><br>
                <div class="ml-4 text-gray-300"><span class="text-yellow-400">"Authorization"</span>: <span class="text-yellow-400">"Bearer your-api-key"</span></div><br>
                <div class="text-gray-300">}</div><br>
                <div class="text-gray-300">data = {</div><br>
                <div class="ml-4 text-gray-300"><span class="text-yellow-400">"text"</span>: <span class="text-yellow-400">"Hello world"</span>,</div><br>
                <div class="ml-4 text-gray-300"><span class="text-yellow-400">"voice"</span>: <span class="text-yellow-400">"sarah"</span></div><br>
                <div class="text-gray-300">}</div><br><br>

                <div class="text-gray-300">response = requests.<span class="text-blue-400">post</span>(url, headers=headers, json=data)</div><br>
                <div class="text-gray-300">audio_url = response.<span class="text-blue-400">json</span>()[<span class="text-yellow-400">"audio_url"</span>]</div>
              </div>

              <!-- Node.js Tab -->
              <div v-if="activeTab === 'nodejs'">
                <div class="text-gray-500 mb-2">// Node.js example</div>
                <div class="text-blue-400">const</div> <span class="text-gray-300">axios = <span class="text-blue-400">require</span>(<span class="text-yellow-400">'axios'</span>);</span><br><br>

                <div class="text-blue-400">const</div> <span class="text-gray-300">response = <span class="text-blue-400">await</span> axios.<span class="text-blue-400">post</span>(<span class="text-yellow-400">'https://api.amuletvoice.com/v1/tts'</span>, {</span><br>
                <div class="ml-2 text-gray-300">text: <span class="text-yellow-400">'Hello world'</span>,</div><br>
                <div class="ml-2 text-gray-300">voice: <span class="text-yellow-400">'sarah'</span></div><br>
                <div class="text-gray-300">}, {</div><br>
                <div class="ml-2 text-gray-300">headers: {</div><br>
                <div class="ml-4 text-gray-300"><span class="text-yellow-400">'Authorization'</span>: <span class="text-yellow-400">'Bearer your-api-key'</span></div><br>
                <div class="ml-2 text-gray-300">}</div><br>
                <div class="text-gray-300">});</div><br><br>

                <div class="text-blue-400">const</div> <span class="text-gray-300">audioUrl = response.data.audio_url;</span>
              </div>

              <!-- PHP Tab -->
              <div v-if="activeTab === 'php'">
                <div class="text-gray-500 mb-2">// PHP example</div>
                <div class="text-blue-400">&lt;?php</div><br><br>

                <div class="text-gray-300">$url = <span class="text-yellow-400">'https://api.amuletvoice.com/v1/tts'</span>;</div><br>
                <div class="text-gray-300">$data = <span class="text-blue-400">json_encode</span>([</div><br>
                <div class="ml-4 text-gray-300"><span class="text-yellow-400">'text'</span> => <span class="text-yellow-400">'Hello world'</span>,</div><br>
                <div class="ml-4 text-gray-300"><span class="text-yellow-400">'voice'</span> => <span class="text-yellow-400">'sarah'</span></div><br>
                <div class="text-gray-300">]);</div><br><br>

                <div class="text-gray-300">$context = <span class="text-blue-400">stream_context_create</span>([</div><br>
                <div class="ml-2 text-gray-300"><span class="text-yellow-400">'http'</span> => [</div><br>
                <div class="ml-4 text-gray-300"><span class="text-yellow-400">'method'</span> => <span class="text-yellow-400">'POST'</span>,</div><br>
                <div class="ml-4 text-gray-300"><span class="text-yellow-400">'header'</span> => <span class="text-yellow-400">'Authorization: Bearer your-api-key'</span>,</div><br>
                <div class="ml-4 text-gray-300"><span class="text-yellow-400">'content'</span> => $data</div><br>
                <div class="ml-2 text-gray-300">]</div><br>
                <div class="text-gray-300">]);</div><br><br>

                <div class="text-gray-300">$response = <span class="text-blue-400">json_decode</span>(<span class="text-blue-400">file_get_contents</span>($url, <span class="text-blue-400">false</span>, $context));</div><br>
                <div class="text-gray-300">$audioUrl = $response->audio_url;</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'

// Tabs data and active tab state
const activeTab = ref('curl')

const tabs = [
  { id: 'curl', name: 'cURL' },
  { id: 'python', name: 'Python' },
  { id: 'nodejs', name: 'Node.js' },
  { id: 'php', name: 'PHP' }
]
</script>
