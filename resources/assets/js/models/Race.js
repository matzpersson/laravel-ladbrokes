// -- Race Front-End model
class Race {

	static find(id) {
		return axios.get('/api/races/' + id)
	}

	static update(id) {
		return axios.put('/api/races/' + id)
	}

	static delete(id) {
		return axios.delete('/api/races/' + id)
	}

	static all(then) {

		return axios.get("/api/races");

	}

	static restart() {

		return axios.get("/api/races/restart");

	}

}

export default Race;