<template>
    <v-navigation-drawer permanent>
        <v-list-item>
            <v-list-item-content>
                <v-list-item-title class="title">
                    AnalysIT
                </v-list-item-title>
                <v-list-item-subtitle>
                    Automated Item Analysis
                </v-list-item-subtitle>
            </v-list-item-content>
        </v-list-item>

        <v-divider></v-divider>

        <v-list dense>
            <v-list-item
                v-for="r in routes"
                :key="r.meta.title"
                :to="{ name: r.name }"
                >
                <v-list-item-icon>
                    <v-icon v-text="'fas fa-' + r.meta.icon"></v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>{{ r.meta.title }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
import router from '../router'
export default {
// name: 'navigation'
    data() {
        return {
            routes: router.routes
        }
    },
    created() {
        console.log(this.routes)
    }
}
</script>
