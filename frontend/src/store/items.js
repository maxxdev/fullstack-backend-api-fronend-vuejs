import axios from "axios";

export default {
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
        await axios.get('http://invaskapi.development/api/v1/items')
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
    async filterItems({dispatch, commit}, filter) {
      const filterStr = objectToFilterString(filter)
      try {
        let res = null
        await axios.get('/items/search' + filterStr, {baseURL: process.env.VUE_APP_API_URL})
          .then(response => {
            res = response.data
          }).catch(function (error) {
            console.log(error)
          })
        return res
      } catch (e) {
        console.warn(e)
        throw e
      }
    }
  }
}

function objectToFilterString(filter) {
  let filterStr = '?'
  Object.keys(filter).forEach(key => {
    let val = filter[key] || ''
    let propertyKey = key
    if (typeof val === 'object') {
      const subKey = Object.keys(val)[0];
      propertyKey = key + '.' + subKey
      val = filter[key][subKey]
    }
    if (val)
      filterStr += `&filter[${propertyKey}]=${val}`
  })
  return filterStr
}