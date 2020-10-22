import axios from 'axios'

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
				let params = payload
				const response = await axios.get(`http://localhost:3000/api/v1/properties/filter`, {
					headers: {},
					params
				})
				commit('setProperties', response.data)
			} catch (error) {
				console.log('=== filterProperties error : ', error)
			}
		},
	},
}