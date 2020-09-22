import Vue from 'vue'
import Vuex from 'vuex'
import Articles from "./articles"
import Items from "./items"

Vue.use(Vuex)

export default new Vuex.Store({
  state: {},
  mutations: {},
  actions: {},
  modules: {Articles, Items}
})
