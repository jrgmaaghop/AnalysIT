<template>
    <v-container class="grey lighten-5">
        <v-row>
            <v-col cols="12" sm="4">
                <v-card elevation="2" class="pa-5">
                    <v-row>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model="number_items"
                                label="Number of Items"
                                :rules="rules"
                                type="number"
                                hide-details="auto"
                                min="1"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model="number_studs"
                                label="Number of Students"
                                :rules="rules"
                                type="number"
                                hide-details="auto"
                                min="1"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-btn block @click="setNumbers()">
                        Block Button
                    </v-btn>
                </v-card>
            </v-col>
        </v-row>
        <v-card  elevation="2">
            <v-simple-table>
                <template v-slot:default>
                    <thead>
                    <tr>
                        <th class="text-left">
                            Name
                        </th>
                        <th class="text-left">
                            Calories
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="i in items"
                        :key="i.name"
                    >
                        <td>{{ i.name }}</td>
                        <td>{{ i.calories }}</td>
                    </tr>
                    </tbody>
                </template>
            </v-simple-table>
        </v-card>
    </v-container>
</template>

<script>
import axios from 'axios'
  export default {
    data() {
      return {
          base: '',
          number_items: 1,
          number_studs: 1,
          items: [],
          rules: [
              value => !!value || 'Required.'
          ]
      }
    },
    // name: "home"
  created() {
      axios.get('/api/user')
          .then((response)=>{
                console.log(response)
                this.base = response.data.base_url
          })
  },
  methods: {
    setNumbers() {
      console.log(this.number_studs)
      console.log(this.number_items)
    },
    calculate() {
        // axios.get('/api/calculate')
        //     .then((response)=>{
        //         console.log(response)
        //         this.base = response.data.base_url
        //     })
        window.open(this.base + '/calculate', "_blank");
    }
  }
  }
</script>

<style scoped>

</style>
