<template>
  <div>
    <v-chart />
    <v-table />
  </div>
</template>

<script>
import VTable from '../components/VTable'
import VChart from '@/components/VChart'

export default {
  name: 'Home',
  components: {
    VTable,
    VChart
  }
}
</script>
