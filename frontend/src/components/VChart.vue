<template>
  <div>
    <chart-requests :chart-options="chartOptions"/>
    <chart-browser :chart-options="chartOptions"/>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import ChartRequests from '@/components/charts/ChartRequests'
import ChartBrowser from '@/components/charts/ChartBrowser'

export default {
  name: 'VChart',
  components: {
    ChartRequests,
    ChartBrowser
  },
  data () {
    return {
      chartOptions: {
        responsive: true,
        maintainAspectRatio: false
      }
    }
  },
  mounted () {
    // this.$store.dispatch('fetchChartData')
  },
  computed: {
    ...mapGetters([
      'chartData'
    ])
  }
}
</script>
