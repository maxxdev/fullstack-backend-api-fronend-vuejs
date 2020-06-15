import axios from "axios";

export default {
  actions: {
    async fetchArticles({dispatch, commit}) {
      try {
        let res = null
        await axios.get('/articles', {baseURL: process.env.VUE_APP_API_URL})
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
    },
    async filterArticles({dispatch, commit}, filter) {
      const filterStr = objectToFilterString(filter)
      try {
        let res = null
        await axios.get('/articles/search' + filterStr, {baseURL: process.env.VUE_APP_API_URL})
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