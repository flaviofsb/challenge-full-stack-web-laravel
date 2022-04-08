<template>
<div>
    <v-navigation-drawer v-model="drawer"
      app>
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="text-h6">
            Módulo Acadêmico
          </v-list-item-title>
          
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list
        dense
        nav
      >
        <v-list-item
          v-for="item in items"
          :key="item.title"
          :to="item.to"
          link
        >
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>{{ title }} de alunos</v-toolbar-title>
    </v-app-bar>
</div>    
</template>

<script>
  export default {

    props:['title'],  
    data: () => ({ 
      drawer: null,
      items: [
            { title: 'Alunos', icon: 'mdi-view-dashboard', to:'/' }
           
          ]
    }),
  }
</script>    