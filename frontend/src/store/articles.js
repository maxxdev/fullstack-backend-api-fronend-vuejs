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
    }
  }
}