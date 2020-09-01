<template>
  <main>
    <vs-table :data="containers">

      <template slot="thead">
        <vs-th>Largo</vs-th>
        <vs-th>Ancho</vs-th>
        <vs-th>Alto</vs-th>
        <vs-th>Volumen</vs-th>
        <vs-th>Peso</vs-th>
        <vs-th>Peso Máximo</vs-th>
        <vs-th>TEUS</vs-th>
        <vs-th>Activo</vs-th>
      </template>

      <template>
        <vs-tr :key="indextr" v-for="(container, indextr) in containers">
          <vs-td :data="container.large">
            {{ container.large }}
          </vs-td>
          <vs-td :data="container.width">
            {{ container.width }}
          </vs-td>
          <vs-td :data="container.height">
            {{ container.height }}
          </vs-td>
          <vs-td :data="container.volume">
            {{ container.volume }}
          </vs-td>
          <vs-td :data="container.weight">
            {{ container.weight }}
          </vs-td>
          <vs-td :data="container.max_weight">
            {{ container.max_weight }}
          </vs-td>
          <vs-td :data="container.teus">
            {{ container.teus }}
          </vs-td>
          <vs-td :data="container.active">
            {{ container.active }}
          </vs-td>

        </vs-tr>
      </template>

    </vs-table>
  </main>
</template>


<script>
import { AgGridVue } from 'ag-grid-vue'
import axios from 'axios'
import '@sass/vuexy/extraComponents/agGridStyleOverride.scss'

export default {
  components: {
    AgGridVue
  },
  data () {
    return {
      containers: [],
      pagination: {},
      columnDefs: null,
      gridOptions: null
    }
  },
  methods: {
    async fetchContainers (page = 1) {
      try {
        const response = await axios.get(`/api/v1/containers?page=${page}`)
        const { data, current_page, per_page, last_page, total } = response.data
        this.containers = data
        this.pagination = {
          current_page,
          per_page,
          last_page,
          total
        }


      } catch (error) {
        console.log(error)
      }
    }
  },
  beforeMount () {
    this.columnDefs = [
      {headerName: 'Large', field: 'large'},
      {headerName: 'Width', field: 'width'},
      {headerName: 'Height', field: 'height'}
    ]
    this.gridOptions = {
      debug: true,
      pagination: true,
      paginationPageSize: 25,
      enableColResize: true,
      animateRows: true,
      enableSorting: true,
      rowSelection: 'single',
      headerHeight: 42,
      floatingFiltersHeight: 42,
      rowHeight: 36
    }
    this.fetchContainers()
  }
}

</script>
