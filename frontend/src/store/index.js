import Vue from 'vue'
import Vuex from 'vuex'
import articles from "./articles"
import items from "./items"

Vue.use(Vuex)

export default new Vuex.Store({
  namespaced: true,
  state: {},
  mutations: {},
  actions: {},
  modules: {articles, items}
})
