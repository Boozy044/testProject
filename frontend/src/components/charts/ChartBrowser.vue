<script>
import { Line } from 'vue-chartjs'

export default {
  extends: Line,
  props: {
    // chartData: {
    //   type: Array,
    //   default: null
    // },
    chartOptions: {
      type: Object,
      default: null
    }
  },
  data: () => ({
    chartData: {
      labels: ['01.02.2022', '02.02.2022', '03.02.2022', '04.02.2022', '05.02.2022', '06.02.2022', '07.02.2022', '08.02.2022', '09.02.2022', '10.02.2022', '11.02.2022', '12.02.2022', '13.02.2022', '14.02.2022', '15.02.2022', '16.02.2022', '17.02.2022', '18.02.2022', '19.02.2022', '20.02.2022', '21.02.2022', '22.02.2022', '23.02.2022', '24.02.2022', '25.02.2022'],
      datasets: [
        {
          label: 'Chrome',
          backgroundColor: 'rgba(255, 99, 132, 0.5)',
          data: [867, 521, 589, 526, 326, 708, 823, 366, 975, 342, 321, 113, 801, 778, 724, 176, 783, 601, 286, 847, 405, 508, 714, 876, 590]
        },
        {
          label: 'Safari',
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          data: [739, 227, 341, 589, 813, 742, 708, 638, 174, 550, 576, 421, 274, 494, 837, 425, 292, 649, 208, 555, 462, 531, 764, 572, 621]
        },
        {
          label: 'Opera',
          backgroundColor: 'rgba(255, 205, 86, 0.5)',
          data: [332, 588, 197, 197, 389, 337, 544, 611, 703, 328, 582, 652, 761, 742, 970, 268, 635, 126, 288, 305, 350, 897, 698, 408, 880]
        }
      ]
    }
  }),

  mounted () {
    this.renderChart(this.chartData, this.chartOptions)
  }
}
</script>
