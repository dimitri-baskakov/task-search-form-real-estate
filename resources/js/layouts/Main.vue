<template>
<div>
  <el-menu mode="horizontal" :defaultActive="$route.path" router>
    <el-menu-item index="/">Home</el-menu-item>
    <el-menu-item index="/search">Search Property</el-menu-item>
  </el-menu>
  <router-view></router-view>
</div>
</template>

<script>
export default {
  data() {
    return {
    }
  },
  name: 'LayoutMain',
}
</script>