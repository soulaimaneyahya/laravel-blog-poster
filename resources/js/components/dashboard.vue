<template>
  <div>
    <BarChart :post-stats-data="postStatsData" />
  </div>
</template>
  
<script>
import BarChart from './partials/BarChart.vue'

export default {
  name: 'Dashboard',
  components: {
    BarChart,
  },
  props: {
    postStatsData: {
      type: Object,
      required: true,
    },
  },
}
</script>
  