import { ref, computed } from 'vue'
import { defineStore } from 'pinia'
import { useRouter } from 'vue-router'

export const useUserStore = defineStore('user', () => {

  const router = useRouter()

  const user = ref({})

  // const doubleCount = computed(() => count.value * 2)
  // function increment() {
  //   count.value++
  // }

  function logout() {
    user.value = {}
    router.push('/login')
  }

  return { user, logout }
}, {
  persist: true 
})
