import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    alunos: [
      {
        ra: 101123,
        nome: 'Marta Souza',
        cpf: '044.293.444-00',
        
      },
      {
        ra: 323,
        nome: 'Joana Souza',
        cpf: '044.293.444-00',
        
      },
      {
        ra: 333,
        nome: 'Silvia Souza',
        cpf: '044.293.444-00',
        
      },
      {
        ra: 423,
        nome: 'Souza',
        cpf: '044.293.444-00',
        
      },
      {
        ra: 53453,
        nome: 'Paula',
        cpf: '044.1.444-00',
        
      },
      {
        ra: 101123,
        nome: 'Maria Madalena',
        cpf: '044.2.444-00',
        
      },
    ],
  },
  mutations: {
    //addStudents(state, )

  },
  actions: {
  },
  modules: {
  }
})
