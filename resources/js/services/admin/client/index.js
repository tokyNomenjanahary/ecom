import axios from "axios";
import { ref } from "vue";

export default function useUser() {
  const users = ref([])
  const user = ref([])
  const usersCount = ref()

  const getUsers = async () => {
    try {
      let response = await axios.get('/api/users')
      users.value = response.data.data
      usersCount.value = users.value.length
    } catch (error) {
      console.log(error)
    }
  }

  const destroyUser = async (id) => {
      await axios.delete('/api/users/' + id, user.value)
      await getUsers()
  }

  return {
    getUsers,
    users,
    destroyUser,
    user,
    usersCount
  }
}