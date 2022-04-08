<template>
  <div>
    <Menu title="Edição" />
    
    <div class="container">

      
            
        <v-form v-model="valid">
          <v-container>
            <v-row>
              <v-col
                cols="12"
                md="12"
              >
                <label for="nome">Nome</label>
                <input
                  v-model="nome"  name="nome" id="nome"
                  placeholder="Informe o nome completo"
                  required
                />
              </v-col>
              <v-col
                cols="12"
                md="12"
              >
                <label for="email">E-mail</label>
                <input
                  v-model="email"  name="email" id="email"
                  placeholder="Informe apenas um e-mail"
                  :rules="emailRules"
                  required
                />
              </v-col>
              <v-col
                cols="12"
                md="12"
              >
                <label for="ra">RA</label>
                <input readonly value='311312'
                  v-model="ra"  name="ra" id="ra"
                  
                  required
                />
              </v-col>
              <v-col
                cols="12"
                md="12"
              >
                <label for="cpf">CPF</label>
                <input readonly value='1213'
                  v-model="cpf" name="cpf" id="cpf"
                  
                  required
                />
              </v-col>
              <v-col cols="12" style="text-align:right; padding-right:50px">
                <v-btn
                  color="primary"
                  @click="salvar"
                >
                  Cancelar
                </v-btn>&nbsp;
                <v-btn
                  color="primary"
                  @click="salvar"
                >
                  Salvar
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </v-form>


    </div>
  </div>
</template>
<script>
import Menu from '../components/Menu';

export default {
  components: {
    Menu
  }, 
  data: function () {
    return {
      ra: '312',
      cpf: '014.236.365-00'
    }
  }
}
</script>
<style scoped>

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