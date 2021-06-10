import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		tickets: [],
		ticket: [],
		active: 0

	},
	actions: {
		async getTickets({commit}){
			let response = await fetch('http://diplom2.local/api/pdd/count')
			response = await response.json()
			console.log(response)
			commit('setTickets', response)
		},
		async getTicket({commit}, data){
			let response = await fetch(`http://diplom2.local/api/pdd/${data}`)
			response = await response.json()
			console.log(response)
			commit('setTicket', response)
		},
	},
	mutations: {
		setTickets(state, data){
			state.tickets = data
		},
		setTicket(state, data){
			state.ticket = data
		},
		setActiveTicket(state, num){
			state.active = num-1
		},
		next(state){
			state.active+=1
		},
		prev(state){
			state.active-=1
		}
	},
	getters: {
		ticekts: s => s.tickets,
		active: s => s.ticket[s.active]
	}
})