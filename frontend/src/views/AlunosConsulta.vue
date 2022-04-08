<template>
  <div>
     <Menu title="consulta" />    

    <div class="container">
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
                :items=$store.state.alunos
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
                <v-icon
                  small
                  class="mr-2"
                  @click="editItem(item)"
                >
                  [Editar]
                </v-icon>
                <v-icon
                  small
                  @click="deleteItem(item)"
                >
                  [Excluir]
                </v-icon>
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
import Menu from '../components/Menu';

export default {

  components: {
    Menu
  },
  data () {
      return {
        search: '',
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
    deleteItemConfirm () {
    this.desserts.splice(this.editedIndex, 1)
    this.closeDelete()
    },
    deleteItem (item) {
        this.editedIndex = this.alunos.indexOf(item)
        //this.editedItem = Object.assign({}, item)
        this.dialogDelete = true
        //alert("ola" )
    },    
    closeDelete () {
      this.dialogDelete = false
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      })
    }
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

</style>