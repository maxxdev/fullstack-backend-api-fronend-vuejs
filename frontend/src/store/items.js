import axios from "axios";

export default {
  namespaced: true,
  state: {
    items: {items: []}
  },
  getters: {
    items: s => s.items
  },
  mutations: {
    setItems(state, items) {
      state.items = items
    }
  },
  actions: {
    async fetchItems({dispatch, commit}) {
      try {
        let res = null
        await axios.get('https://devapi.invask.ru/api/v1/items')
          .then(response => {
            res = response.data
            commit('setItems', res)
          }).catch(function (error) {
            console.log(error)
          })
        return res
      } catch (e) {
        console.warn(e)
        throw e
      }
    },
  }
}
