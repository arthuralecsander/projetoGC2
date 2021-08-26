<template>
  <div>
    <h2>Filtros</h2>
    <form id="form">
      <select
          v-model="modelBanca"
          id="selectBanca">
        <option value="0"> Selecione uma Banca</option>
        <option
            v-for="banca in listaBancas"
            v-bind:value="banca.id">{{ banca.banca }}</option>
      </select>
      <select
          v-model="modelOrgao"
          id="selectOrgao">
        <option value="0"> Selecione um Orgao</option>
        <option
            v-for="orgao in listaOrgaos"
            v-bind:value="orgao.id">{{ orgao.orgao }}</option>
      </select>
      <button type="button" class="btn btn-primary" v-on:click="filtro">
        Filtro
      </button>
    </form>

    <div id="app">
      <h2>Lista</h2>
      <TreeBrowser
          :nodes="listaAssuntos"
      />
    </div>
  </div>
</template>


<script>
import axios from 'axios'
import TreeBrowser from "./TreeBrowser";

export default {
  data() {
    return {
      modelBanca : '0',
      modelOrgao : '0',
      listaAssuntos: [],
      listaOrgaos: [],
      listaBancas: []
    }
  },
  async mounted() {
    await axios.get('/getBanca')
        .then((response) => {
          this.listaBancas = response.data;
        })
    await axios.get('/getOrgao')
        .then((response) => {
          this.listaOrgaos = response.data;
        })
  },
  methods: {
    filtro: async function filtro(evt) {
      evt.preventDefault();

      let url = '/getAssunto' +'?idbanca=' + this.modelBanca + '&idorgao=' + this.modelOrgao;
      console.log(url)
      await axios.get( url)
          .then((response) => {
            this.listaAssuntos = response.data;
          })
    },
  },
  watch: {
    comboBanca: function(val) {
      this.modelBanca = val;
    }
  },
  components: {
    TreeBrowser,
  },
  name: 'Prog',

};

</script>