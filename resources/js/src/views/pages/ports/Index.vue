<template>
  <main>
    <vs-table :data="ports">

      <template slot="thead">
        <vs-th>Código</vs-th>
        <vs-th>Nombre</vs-th>
        <vs-th>País</vs-th>
        <vs-th>Activo</vs-th>
      </template>

      <template>
        <vs-tr :key="indextr" v-for="(port, indextr) in ports">
          <vs-td :data="port.code">
            {{ port.code }}
          </vs-td>
          <vs-td :data="port.name">
            {{ port.name }}
          </vs-td>

          <vs-td :data="port.country">
            {{ port.country.name }}
          </vs-td>

          <vs-td :data="port.active">
            {{ port.active }}
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
      ports: [],
      pagination: {},
      columnDefs: null,
      gridOptions: null
    }
  },
  methods: {
    async fetchPorts (page = 1) {
      try {
        const response = await axios.get(`/api/v1/ports?page=${page}`)
        const { data, current_page, per_page, last_page, total } = response.data
        this.ports = data
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
    this.fetchPorts()
  }
}

</script>
