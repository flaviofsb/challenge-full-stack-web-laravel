<template>
  <div>
    <Menu title="Cadastro" />
    
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
                    Aluno cadastrado com sucesso.
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
                    Não foi possível cadastrar o aluno.
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
       
        <form @submit.prevent="submitForm" autocomplete="off" method="post">

            
          <v-container>
            <v-row>
              <v-col
                cols="12"
                md="12"
              >
                <label for="nome">Nome</label>
                <input
                  v-model.trim="form.nome"                    

                  placeholder="Informe o nome completo"
                  
                />
                <p v-if="$v.form.nome.$invalid" class="error-message" >Nome obrigatório</p>
              </v-col>
              <v-col
                cols="12"
                md="12"
              >
                <label for="email">E-mail</label>
                <input
                  v-model.trim="form.email"  
                  placeholder="Informe um e-mail válido"
                />
                <p v-if="!$v.form.email.required" class="error-message" >E-mail obrigatório</p>
                <p v-if="!$v.form.email.email" class="error-message" >E-mail inválido</p>
              </v-col>
              <v-col
                cols="12"
                md="12"
              >
                <label for="ra">RA</label>
                <input
                  v-model.trim="form.ra"
                  placeholder="Informe o registro acadêmico"
                  v-on:keypress="NumbersOnly"
                />
                <p v-if="$v.form.ra.$invalid" class="error-message" >Registro acadêmico obrigatório</p>
              </v-col>
              <v-col
                cols="12"
                md="12"
              >
                <label for="cpf">CPF</label>

                <masked-input
                  type="text"
                  name="cpf"
                  class="input"
                  v-model.trim="form.cpf"
                  :mask="[ /\d/ , /\d/, /\d/, '.', /\d/, /\d/, /\d/, '.', /\d/ , /\d/, /\d/, '-', /\d/, /\d/]"
                  :guide="false"
                  placeholderChar="#"
                  required
                  placeholder="Informe o CPF"
                  >
                </masked-input>
                
                <p v-if="$v.form.cpf.$invalid" class="error-message" >CPF obrigatório</p>
              </v-col>
              <v-col cols="12" style="text-align:right; padding-right:50px">
                <v-btn
                  color="primary"
                  to="/"
                >
                  Cancelar
                </v-btn>&nbsp;
                <v-btn :disabled="$v.form.$invalid"
                  color="primary"
                  @click="submitForm"
                >
                  Salvar
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </form>


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
const { required, email } = require('vuelidate/lib/validators')



export default {
  data(){
    return {
      dialog: false,
      dialogErro:false,
      tituloMensagem:'',
      erros: [],
      form:{
        nome: "",
        email: "",
        cpf: "",
        ra: "",
      }

    }

  },
  validations:{

    form:{

      nome:{

        required
      },
      email:{

        required,
        email
      },
      cpf:{

        required
      },
      ra:{

        required
      },

    }

  },
  watch: {          
   // dialogResposta (val) {
      //val || this.closeDialog()
   // },
  },
  methods: {    
    NumbersOnly(evento) {
      evento = (evento) ? evento : window.event;
      var charCode = (evento.which) ? evento.which : evento.keyCode;
      if ((charCode > 31 && (charCode < 48 || charCode > 57)) && (charCode !== 46 || charCode !== 190) ) {
        evento.preventDefault();
      } else {
        return true;
      }
    },
    resetForm(){

      this.form.nome = "";
      this.form.email = "";
      this.form.ra = "";
      this.form.cpf = "";

    },
    submitForm () {      
     
      if (!this.$v.form.$invalid){

        //console.log("form enviado");

        //axios.post("");
      api.post('/students', this.form)
      .then(response => {
          console.log(response);
          this.resetForm();
          this.dialog = true;
          
      })
      .catch(error => {
          console.log(error);
          this.dialogErro = true;
      });


        
      } else {
      this.dialogErro = true;
       console.log("form com erro");
       //openDialog()
       
      }
      
    }
  },
  components: {
    Menu
  }
}
</script>
<style scoped>
.inputError {
  border: 1px solid #F00
}
.labelError {
  color: #F00
}
.container {
  padding: 20px;
}
label {

  display:inline; float:left; width:200px; border:1px solid #ddd;  background:#f1f1f1; padding:5px; padding-left:20px
}
input {
  padding:5px;
  border:1px solid #eee;
  width: 800px;
  padding-left:30px;
}

  @media only screen and (max-width: 768px) {
  label {

    display:block; width:100%; border:1px solid #ddd;  background:#f1f1f1; padding:5px; padding-left:20px
  }
  input {
    padding:5px;
    border:1px solid #eee;
    width: 100%;
    padding-left:30px;
  }
}
</style>