import axios from 'axios'

const actions = {
  async fetchData ({ commit }) {
    await axios.get('http://127.0.0.1:8000/api/v1/date')
      .then(res => {
        console.log(res.data.data)
        commit('FETCH_DATA', res.data.data)
      }).catch(err => {
        console.log(err)
      })
  },
  async fetchChartData ({ commit }) {
    await axios.get('http://127.0.0.1:8000/api/v1/chart')
      .then(res => {
        console.log(res.data.data)
        commit('FETCH_CHARTDATA', res.data.data)
      }).catch(err => {
        console.log(err)
      })
  }
}

export default actions
