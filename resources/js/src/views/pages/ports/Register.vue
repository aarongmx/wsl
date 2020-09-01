<template>
  <form @submit.prevent="registerPort">

    <div class="vx-row mb-2">
      <div class="vx-col w-full md:w-1/3 mt-5">
        <vs-input type="text" class="w-full" icon-pack="feather" icon="icon-user" icon-no-border label-placeholder="Código" v-model="port.code" />
      </div>
      <div class="vx-col w-full md:w-1/3 mt-5">
        <vs-input type="text" class="w-full" icon-pack="feather" icon="icon-mail" icon-no-border label-placeholder="Nombre" v-model="port.name" />
      </div>
      <div class="vx-col w-full md:w-1/3 mt-5">
        <v-select :options="countries" v-model="port.country_id" :dir="$vs.rtl ? 'rtl' : 'ltr'" class="mt-5" />
      </div>
    </div>
    <div class="vx-row mb-2">
      <div class="vx-col w-full mt-5">
        <vs-checkbox class="inline-flex" v-model="port.active">Activo</vs-checkbox>
      </div>
    </div>
    <div class="vx-row">
      <div class="vx-col w-full md:w-1/2 mt-5">
        <vs-button class="mr-3 mb-2" button="submit">Registrar</vs-button>
        <vs-button color="warning" type="border" class="mb-2" @click="input21 = input22 = input23 = input24 = ''; check6 = false;">Reset</vs-button>
      </div>
    </div>
  </form>
</template>

<script>
import VSButton from '../../components/vuesax/button/Button'
import VSelect from 'vue-select'
import axios from 'axios'

export default {
  components: {
    VSButton,
    VSelect
  },
  data () {
    return {
      port: {
        code: '',
        name: '',
        country_id: '',
        active: false
      },
      countries: []
    }
  },
  methods: {
    async fetchCountries () {
      const response = await axios.get('/api/v1/countries')
      const { data } = response.data
      this.countries = data.map(el => {
        return { label: el.name, value: el.id }
      })
      console.log(response)
    },
    async registerPort () {
      const { value } = this.port.country_id
      const response = await axios.post('/api/v1/ports', {
        ...this.port,
        country_id: value
      })

      console.log(response)
    }
  },
  mounted () {
    this.fetchCountries()
  }
}
</script>
