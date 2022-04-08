<template>
  <div>
    <Menu title="Cadastro" />
    
    <div class="container">

      
            
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
import axios from 'axios';
import Menu from '../components/Menu';
const { required, email } = require('vuelidate/lib/validators')

export default {
  data(){
    return {
      erros: [],
      form:{
        nome: "",
        email: "",
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
  methods: {
    submitForm () {      
      
      if (!this.$v.form.$invalid){

        console.log("form enviado");

        //axios.post("");
      } else {

        console.log("form com erro");
      }
      
    },
    validEmail: function (email) {
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
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