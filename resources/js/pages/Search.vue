<template>
<div>
  <el-table
    v-loading="loading"
    :data="tableDataProperties"
    style="width: 100%"
  >
    <el-table-column
      :key="column"
      :label="column"
      :prop="column.toLowerCase()"
      v-for="column in columns"
    ></el-table-column>
  </el-table>
</div>
</template>

<script>
export default {
  computed: {
    tableDataProperties () {
      return this.$store.getters['properties'].data
    },
  },
  data () {
    return {
      columns: [
        'Name',
        'Price',
        'Bedrooms',
        'Bathrooms',
        'Storeys',
        'Garages',
      ],
      filter: {
        bathrooms: null,
        bedrooms: null,
        garages: null,
        name: null,
        price: {
          from: null,
          to: null,
        },
        storeys: null,
      },
      loading: false,
    }
  },
  methods: {
    async filterProperties() {
      await this.$store.dispatch('filterProperties', this.filter)
    }
  },
  mounted () {
    this.filterProperties()
  },
  name: 'PageSearch',
}
</script>