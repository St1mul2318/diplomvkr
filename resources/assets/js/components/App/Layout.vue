<template>
    <div id = "wrapper">
    	<div v-if = "mode == 'tickets'" class = "grid">
    		<div v-for = "ticket in tickets" @click = "toTicket(ticket)" class = "ticket">{{ticket}}</div>
    	</div>
    	<div v-else class = "pdd">
    		<img class = "image" :src = "active.image"/>
    		<div class = "question">{{active.question}}</div>
    		<div class = "answers_vars">
    			<div v-for = "answer in active.answers" class = "answer">{{answer}}</div>
    		</div>
    		<div v-if = "active.incorrect" class = "tip">{{answer.tip}}</div>
    		<div @click = "prev" class = "prev">Предыдущий</div>
    		<div @click = "next" class = "next">Следующий</div>
    	</div>
    </div>
</template>

<style>
	.wrapper {
		width: 100%;	
		justify-content: center;
		align-items: center;
	}
	.grid {
		width: 600px;
		display: grid;
		grid-template-columns: repeat(10, 1fr)
	}
	.ticket {
		padding: 6px;
		border: 1px solid red;
	}
</style>

<script>
import {mapActions, mapGetters, mapMutations} from 'vuex'
    export default {
    	data(){
    		return {
    			mode: 'tickets',
    			incorrect: false
    		}
    	},
    	computed: {
    		...mapGetters(['tickets','active'])
    	},
    	methods: {
    		...mapActions(['next','prev','getTickets','getTicket']),
    		...mapMutations(['setActiveTicket']),
    		toTicket(ticket){
    			this.getTicket(ticket)
    			this.mode = 'pdd'
    		}
    	},
    	async created(){
    		await this.getTickets()
    	}
    }
</script>
