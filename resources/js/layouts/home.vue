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
                                :disabled="!editable"
                                :rules="rules"
                                type="number"
                                hide-details="auto"
                                min="1"
                                @update="setNumbers()"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-text-field
                                v-model="number_studs"
                                label="Number of Students"
                                :disabled="!editable"
                                :rules="rules"
                                type="number"
                                hide-details="auto"
                                min="1"
                                @update="setNumbers()"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="12" sm="6">
                            <v-btn block @click="setNumbers()">
                                Generate Table
                            </v-btn>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-btn block @click="reset()">
                                Reset
                            </v-btn>
                        </v-col>
                    </v-row>
                    <br>
                    <v-btn block @click="calculate()">
                        Calculate
                    </v-btn>
                </v-card>
            </v-col>
        </v-row>
        <v-card v-if="render_table" elevation="2">
            <v-tabs
                v-model="tab"
                dark
                background-color="teal darken-3"
                show-arrows
            >
                <v-tabs-slider color="teal lighten-3"></v-tabs-slider>

                <v-tab
                    v-for="n in Number(number_studs)"
                    :key="n"
                >
                    Student {{ n }}
                </v-tab>
            </v-tabs>
            <v-tabs-items v-model="tab">
                <v-tab-item
                    v-for="item in items"
                    :key="item.key"
                >
                    <v-card class="pa-5" flat>
                        <v-card-text>I am student {{ item.key }} {{tab}}</v-card-text>
                        <v-row
                            class="mb-6"
                            no-gutters>
                            <v-col cols="12" sm="6">
                                <v-card
                                    class="pa-2"
                                    tile
                                    outlined>
                                    <v-text-field
                                        v-model="item.name"
                                        :key="'s' + item.key"
                                        :label="'Student Name' +  + item.key"
                                        :rules="rules"
                                        type="text"
                                        hide-details="auto"></v-text-field>
                                </v-card>
                            </v-col>
                            <v-col cols="12" sm="6">
                                <v-card
                                    class="pa-2"
                                    tile
                                    outlined>
                                    <v-text-field
                                        v-for="s in item.scores"
                                        v-model="s.value"
                                        :key="'scr-' + tab + '-' +(Number(s.key))"
                                        :label="'scr-' + tab + '-' + (Number(s.key))"
                                        :rules="rules"
                                        type="Number"
                                        hide-details="auto"
                                        min="1"></v-text-field>
                                </v-card>
                            </v-col>
                        </v-row>

                    </v-card>
                </v-tab-item>
            </v-tabs-items>
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
          form: { key: null, name: '', scores: [] },
          rules: [
              value => !!value || 'Required.'
          ],
          render_table: false,
          tab: 0,
          editable: true
      }
    },
    // name: "home"
  created() {
      axios.get('/api/user')
          .then((response)=>{
            // console.log(response)
            this.base = response.data.base_url
          })
  },
  methods: {
    reset() {
        this.number_items = 1
        this.number_studs  = 1
        this.items = []
        this.form = { key: null, name: '', scores: [] }
        this.render_table = false
        this.tab = 0
        this.editable = true
    },
    setNumbers() {
        for (let n = 0; n < this.number_studs; n++) {
            this.form = { key: n, name: '', scores: [] }
            // this.form.key = n
            this.items[n] = this.form
            // this.items.push(this.form)
            for (let i = 0; i < this.number_items; i++) {
                this.items[n].scores.push({ key: i, value: 0 })
            }
        }
        this.editable = false
        this.render_table = true
    },
    calculate() {
        axios.post('/api/calculate',
            {
                // responseType: 'blob',
                    data: this.items,
                    num_items: this.number_items,
                    num_studs: this.number_studs
                }, {}
                )
            .then((response)=>{
                console.log(response)
                // var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                // var fileLink = document.createElement('a');
                //
                // fileLink.href = fileURL;
                // fileLink.setAttribute('download', 'file.xls');
                // document.body.appendChild(fileLink);
                //
                // fileLink.click();
            })
        console.log(this.items)

        // window.open(this.base + '/calculate', "_blank");
    },
    generate() {
        console.log(this.items)
    }
  }
}
</script>

<style scoped>

</style>
