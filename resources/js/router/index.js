import Home from '../layouts/home'
import About from '../layouts/about'

export default {
    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
            meta: {
                show: true,
                title: 'Home',
                icon: 'check'
            }
        },
        {
            path: '/about',
            name: 'about',
            component: About,
            meta: {
                show: true,
                title: 'About',
                icon: 'eye'
            }
        }
    ]
}
