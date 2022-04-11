
<template>
  <div>
     <Menu title="consulta" />    

    <div class="container">
      <template>
        <div class="text-center">
          <v-dialog
            v-model="dialog"
            width="500"
          >
    

            <v-card>
              <v-card-title class="text-h5 blue lighten-2">
                Sucesso
              </v-card-title>

              <v-card-text class='mt-5'>
                Aluno excluído com sucesso.
              </v-card-text>

              <v-divider></v-divider>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  color="primary"
                  text
                  @click="dialog = false"
                >
                  OK
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </div>
      </template>
      <template>
        <div class="text-center">
          <v-dialog
            v-model="dialogErro"
            width="500"
          >
    

            <v-card>
              <v-card-title class="text-h5 red lighten-2">
                Erro
              </v-card-title>

              <v-card-text class='mt-5'>
                Não foi possível excluir o aluno.
              </v-card-text>

              <v-divider></v-divider>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                  color="primary"
                  text
                  @click="dialogErro = false"
                >
                  OK
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </div>
      </template>
      <v-card>
          <v-card-title>
            <v-text-field class="busca"
              v-model="search"
              append-icon="mdi-magnify"
              label="Digite sua busca"
              single-line
              hide-details
              placeholder="Digite sua busca"
            ></v-text-field>
            <v-spacer ></v-spacer>
            <v-btn to="/cadastro"
              color="primary"
              class="btn"
            >CADASTRAR ALUNO</v-btn>
            
          </v-card-title>
            
          <v-data-table
                :headers="headers"
                :items=alunos
                :items-per-page="5"
                class="elevation-1"
                :search="search"
              >
            
              <template v-slot:top>
                <v-toolbar
                  flat
                >                  
                  <v-dialog v-model="dialogDelete" max-width="500px">
                    <v-card>
                      <v-card-title class="text-h5">Confirma a exclusão do aluno?</v-card-title>
                      <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" text @click="closeDelete">Cancelar</v-btn>
                        <v-btn color="blue darken-1" text @click="deleteItemConfirm">Confirmar</v-btn>
                        <v-spacer></v-spacer>
                      </v-card-actions>
                    </v-card>
                  </v-dialog>
                </v-toolbar>
              </template>

              <template v-slot:item.actions="{ item }">
                
                <v-btn  style="border:0; background: transparent; box-shadow:0;"                
                  :to="'/edicao/' + item.id"
                >
                  [Editar]
                </v-btn>
                <v-btn class="botaoTabela"
                  
                  @click="deleteItem(item)"
                >
                  [Excluir]
                </v-btn>
              </template>
              <template v-slot:no-data>
                <v-btn
                  color="primary"
                  @click="initialize"
                >
                  Reset
                </v-btn>
              </template>              



          </v-data-table>
      </v-card>
      </div>
      
  </div>
</template>
<script>
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueAxios, axios)
import Menu from '../components/Menu';
import api from '../services/api.js'
export default {

  components: {
    Menu
  },

  mounted(){
      //alert('monte 1')
      this.carregaAlunos()
  },

  data () {
      return {
        selecionado:'',
        search: '',
        alunos:[],
        dialog: false,
        dialogErro:false,
        dialogDelete: false,
        editedIndex: -1,
        headers: [
          
          { text: 'Registro acadêmico', value: 'ra' },
          { text: 'Nome', value: 'nome' },
          { text: 'CPF', value: 'cpf' },
          {
            text: '',
            align: 'center',
            sortable: false,
            value: 'actions',
          },
          
        ],
        
        
      }
  },
  watch: {          
    dialogDelete (val) {
      val || this.closeDelete()
    },
  },
  methods: {
      carregaAlunos(){
        api.get('/students').then(response => { 
          this.alunos = response.data
        }) 
      },
      deleteItem (item) {
       // this.editedIndex = this.desserts.indexOf(item)
        //this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
        this.selecionado = item.id
      },

      deleteItemConfirm () {
        //alert(this.selecionado)
          //alert(this.selecionado)
          api.delete('/students/'  + this.selecionado)
          .then(response => {
              console.log(response);          
              this.dialog = true;
              this.carregaAlunos()
              
          })
          .catch(error => {
              console.log(error);
              
            //  this.dialogErro = true;
          });


        this.closeDelete()
      },


      closeDelete () {
        this.dialogDelete = false
        
      },
  },
  
}
</script>
<style scoped>
.container {
  padding: 20px;
}
.busca { 
  margin-right: '40px';
}
.botaoTabela {

  border:0 ; background: #f00;
}
</style>