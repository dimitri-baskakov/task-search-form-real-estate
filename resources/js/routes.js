import LayoutMain from './layouts/Main.vue'
import Home from './pages/Home.vue'
import Search from './pages/Search.vue'
import Page404 from './pages/Page404.vue'

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
  {
    children: [
      {
        component: Page404,
        path: "*",
      },
    ],
    component: LayoutMain,
    path: "/",
  }
]
