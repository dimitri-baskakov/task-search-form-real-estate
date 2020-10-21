<template>
<div>
  <el-menu mode="horizontal" :defaultActive="activeLink" router>
    <el-menu-item index="/">Home</el-menu-item>
    <el-menu-item index="/search">Search</el-menu-item>
  </el-menu>
  <router-view></router-view>
</div>
</template>

<script>
export default {
  data() {
    return {
      activeLink: null,
    }
  },
  mounted: function () {
    let match = _.chain(this.$route.matched).sortBy(n => n.path.length).last().value();
    this.activeLink = match.path;
  },
  name: 'LayoutMain',
}
</script>