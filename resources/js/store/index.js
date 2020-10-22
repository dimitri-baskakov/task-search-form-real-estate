import Vue from 'vue'

export default {
	state: {
		properties: {},
	},

	getters: {
		properties: state => {
			return state.properties
		},
	},

  mutations: {
		setProperties (state, properties) {
			state.properties = properties
		},
  },

	actions: {
		async filterProperties ({ commit }, payload) {
			try {
				const response = await Vue.axios.get('properties/filter', {
					headers: {},
					params: payload,
				})
				commit('setProperties', response.data)
			} catch (error) {
				console.log('=== filterProperties error : ', error)
			}
		},
	},
}