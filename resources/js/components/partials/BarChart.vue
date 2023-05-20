<template>
  <div>
    <Bar :options="chartOptions" :data="chartData" />
  </div>
</template>
  
<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
  name: 'BarChart',
  components: { Bar },
  props: {
    postStatsData: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      chartData: {
        labels: Object.keys(this.postStatsData),
        datasets: [
          {
            type: 'bar',
            label: 'Bar Chart',
            backgroundColor: 'rgba(112, 113, 249, 0.3)',
            borderColor: 'rgba(112, 113, 249, 0.9)',
            borderWidth: 2,
            fill: true,
            data: Object.values(this.postStatsData),
          },
        ],
      },
      chartOptions: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
      },
    }
  },
}
</script>
