import LayoutMain from './layouts/Main.vue'
import Home from './pages/Home.vue'
import Search from './pages/Search.vue'

export const routes = [
  {
    component: LayoutMain,
    path: '/',
    children: [
      {
        component: Home,
        path: '',
      },
      {
        component: Search,
        path: 'search',
      },
    ]
  },
]
