import { getInfo } from '@/api/user'

const user = {
  state: {
    base_url: null
  },

  mutations: {
    SET_BASE_URL: (state, url) => {
      state.base_url = url
    }
  },

  actions: {
    GetInfo({ commit, state }) {
      return new Promise((resolve, reject) => {
        getInfo(state.token).then(response => {
          commit('SET_BASE_URL', response.data.base_url)
          resolve(response)
        }).catch(error => {
          reject(error)
        })
      })
    }
  }
}

export default user
