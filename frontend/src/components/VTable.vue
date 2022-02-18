<template>
  <v-card>
    <v-card-title>
      Запросы
      <v-spacer></v-spacer>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Поиск"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="dataLogs"
      :search="search"
    ></v-data-table>
  </v-card>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'HelloWorld',
  data () {
    return {
      search: '',
      headers: [
        { text: 'Дата', value: 'date' },
        { text: 'Число запросов', value: 'requests' },
        { text: 'Популярный URL', value: 'popularURL' },
        { text: 'Популярный Браузер', value: 'popularBrowser' }
      ]
    }
  },
  mounted () {
    this.$store.dispatch('fetchData')
  },
  computed: {
    ...mapGetters([
      'chartData'
    ])
  }
}
</script>
