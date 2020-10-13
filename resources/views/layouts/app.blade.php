<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laracore</title>
</head>
<body>

<main id="app">
    <v-app>
        <v-navigation-drawer app>
            <navigation></navigation>
        </v-navigation-drawer>
        <v-app-bar app>

        </v-app-bar>
        <v-main>
            <!-- Provides the application the proper gutter -->
            <v-container>
                <!-- If using vue-router -->
                <router-view></router-view>
            </v-container>
        </v-main>
    </v-app>

</main>

<script src="/js/app.js"></script>
</body>
</html>
