import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

const store = () => new Vuex.Store({

  state: {
    findIngredient: null,
    findProposedIngredient: null,
    addIngredient: null
  },

  mutations: {
    SET_SEARCH_ING: function (state, food) {
      console.log('SET_SEARCH_ING')
      state.findIngredient = food
    },
    SET_SEARCH_WAIT_ING: function (state, food) {
      console.log('SET_SEARCH_WAIT_ING')
      state.findProposedIngredient = food
    },
    ADD_ING: function (state, food) {
      state.addIngredient = food
    }
  },

  actions: {
    async findIngredient ({ commit }, { food }) {
      console.log('[STORE] findIngredient')
      await axios.get(`/api/ingredients/find?search_ing=${food}`)
        .then(res => {
          let data = res.data
          console.log('data return JSON ingredients', data)
          if (data.length > 0) {
            return commit('SET_SEARCH_ING', data)
          }
          return 'nowhere to be found'
          // return data ? commit('SET_SEARCH_ING', data) : 'nowhere to be found'
        })
      await axios.get(`/api/tmp-ingredient/find?search_ing=${food}`)
        .then(res => {
          let data = res.data
          console.log('data return JSON tmp-ingredient', data)
          if (data.length > 0) {
            return commit('SET_SEARCH_WAIT_ING', data)
          }
          return 'nowhere to be found'
          // return data ? commit('SET_SEARCH_WAIT_ING', data) : 'nowhere to be found'
        })
    },
    async addIngredient ({ commit }, { food }) {
      console.log('[STORE] addIngredient', food)
      await axios.post('/api/tmp-ingredient', { title: food })
        .then((data) => {
          console.log('all done')
          commit('ADD_ING', data)
        })
    },
    async fetchTmpIngredients ({ commit }, { food }) {
      console.log('[STORE] fetchTmpIngredients', food)
      await axios.get(`/api/tmp-ingredients/find`)
        .then((data) => {
          console.log('all done')
          commit('ADD_ING', data)
        })
    },
    async confirmVote ({ commit }, { payload }) {
      await axios.put('/api/tmp-ingredient/' + payload.id , { positive_votes : payload.positive_votes })
        .then((data) => {
          console.log('all done')
          commit('ADD_ING', data)
        })
    },
  }
})

export default store
