import VueRouter from 'vue-router';

let routes = [
	{
		name: "Home",
		path: '/',
		component: require('./components/Home.vue')
	},

	{
		name: "Races",
		path: '/races',
		component: require('./components/Races.vue')
	},
]

export default new VueRouter({
	routes: routes,
	mode: 'history',
  	base: __dirname,
	linkIsActive: 'is-active'
})