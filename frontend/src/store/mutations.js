const mutations = {
  FETCH_DATA (state, data) {
    // eslint-disable-next-line no-return-assign
    return state.data = data
  },
  FETCH_CHARTDATA (state, chartData) {
    // eslint-disable-next-line no-return-assign
    return state.chartData = chartData
  }
}

export default mutations
