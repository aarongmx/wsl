<template>
<form @submit.prevent="registerContainer">

  <div class="vx-row mb-2">
    <div class="vx-col w-full md:w-1/3 mt-5">
      <vs-input type="number" class="w-full" icon-pack="feather" icon="icon-user" icon-no-border label-placeholder="Largo" v-model="container.large" />
    </div>
    <div class="vx-col w-full md:w-1/3 mt-5">
      <vs-input type="number" class="w-full" icon-pack="feather" icon="icon-mail" icon-no-border label-placeholder="Ancho" v-model="container.width" />
    </div>
    <div class="vx-col w-full md:w-1/3 mt-5">
      <vs-input class="w-full" icon-pack="feather" icon="icon-smartphone" icon-no-border label-placeholder="Alto" v-model="container.height" />
    </div>
  </div>
  <div class="vx-row mb-2">
    <div class="vx-col w-full md:w-1/3 mt-5">
      <vs-input type="number" class="w-full" icon-pack="feather" icon="icon-box" icon-no-border label-placeholder="Volumen" v-model="container.volume" />
    </div>
    <div class="vx-col w-full md:w-1/3 mt-5">
      <vs-input type="number" class="w-full" icon-pack="feather" icon="icon-lock" icon-no-border label-placeholder="Peso" v-model="container.weight" />
    </div>
    <div class="vx-col w-full md:w-1/3 mt-5">
      <vs-input type="number" class="w-full" icon-pack="feather" icon="icon-lock" icon-no-border label-placeholder="Peso máximo" v-model="container.max_weight" />
    </div>
  </div>
  <div class="vx-row mb-6">
    <div class="vx-col w-full md:w-1/3 mt-5">
      <vs-input type="number" class="w-full" icon-pack="feather" icon="icon-lock" icon-no-border label-placeholder="TEUS" v-model="container.teus" />
    </div>
    <div class="vx-col w-full mt-5">
      <vs-checkbox class="inline-flex" v-model="container.active">Activo</vs-checkbox>
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
import axios from 'axios'

export default {
  components: {
    VSButton
  },
  data () {
    return {
      container: {
        large: '',
        width: '',
        height: '',
        volume: '',
        weight: '',
        max_weight: '',
        teus: '',
        description: '',
        comments: '',
        active: false
      }
    }
  },
  methods: {
    async registerContainer () {
      const response = await axios.post('/api/v1/containers', {
        ...this.container
      })

      console.log(response)
    }
  }
}
</script>
