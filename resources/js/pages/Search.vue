<template>
<div>
  <el-form
    :model="filter"
    label-width="120px"
    ref="filter"
    style="margin-top: 20px;"
  >
    <el-row justify="center">
      <el-col :md="11" :xs="24" :sm="24">
        <el-form-item label="Name" prop="name">
          <el-input
            placeholder="Filter by name"
            v-model="filter.name"
          ></el-input>
        </el-form-item>
        <el-form-item label="Price" prop="price">
          <el-col :span="11">
            <el-input-number
              :max="1000000"
              :min="0"
              placeholder="Filter from"
              style="width: 100%;"
              v-model="filter.priceFrom"
            ></el-input-number>
          </el-col>
          <el-col
            :span="2"
            class="line"
            style="text-align: center;"
          >-</el-col>
          <el-col :span="11">
            <el-input-number
              :max="1000000"
              :min="0"
              placeholder="Filter to"
              style="width: 100%;"
              v-model="filter.priceTo"
            ></el-input-number>
          </el-col>
        </el-form-item>
        <el-form-item label="Bedrooms" prop="bedrooms">
          <el-input-number
            :max="20"
            :min="0"
            placeholder="Filter by bedrooms"
            style="width: 100%;"
            v-model="filter.bedrooms"
          ></el-input-number>
        </el-form-item>
      </el-col>
      <el-col :md="11" :xs="24" :sm="24">
        <el-form-item label="Bathrooms" prop="bathrooms">
          <el-input-number
            :max="20"
            :min="0"
            placeholder="Filter by bathrooms"
            style="width: 100%;"
            v-model="filter.bathrooms"
          ></el-input-number>
        </el-form-item>
        <el-form-item label="Storeys" prop="storeys">
          <el-input-number
            :max="20"
            :min="0"
            placeholder="Filter by storeys"
            style="width: 100%;"
            v-model="filter.storeys"
          ></el-input-number>
        </el-form-item>
        <el-form-item label="Garages" prop="garages">
          <el-input-number
            :max="20"
            :min="0"
            placeholder="Filter by garages"
            style="width: 100%;"
            v-model="filter.garages"
          ></el-input-number>
        </el-form-item>
      </el-col>
      <el-col :span="24" justify="center">
        <el-form-item>
          <el-button
            @click="filterProperties(1)"
            type="primary"
          >Find</el-button>
          <el-button
            @click="clearFilter"
          >Clear</el-button>
        </el-form-item>
      </el-col>
    </el-row>
  </el-form>
  <el-table
    :data="properties.data"
    empty-text="No results were found."
    style="width: 100%"
    v-loading="loading"
  >
    <el-table-column
      :key="column"
      :label="column"
      :prop="column.toLowerCase()"
      v-for="column in columns"
    ></el-table-column>
  </el-table>
  <el-pagination
    :current-page="+properties.meta.current_page"
    :page-size="+properties.meta.per_page"
    :page-sizes="[3, 5, 10, 50, 100]"
    :total="+properties.meta.total"
    @current-change="currentChange"
    @size-change="sizeChange"
    layout="prev, pager, next, total, sizes"
    style="margin-top: 20px;"
    v-if="properties.meta"
  ></el-pagination>
</div>
</template>

<script>
export default {
  computed: {
    properties () {
      return this.$store.getters['properties']
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
        bathrooms: undefined,
        bedrooms: undefined,
        garages: undefined,
        name: undefined,
        priceFrom: undefined,
        priceTo: undefined,
        storeys: undefined,
      },
      loading: false,
      pagination: {
        per_page: 3,
        page: 1,
      },
    }
  },
  methods: {
    clearFilter () {
      this.$refs['filter'].resetFields()
      this.filterProperties(1)
    },
    currentChange (val) {
      this.pagination.page = val
      this.filterProperties()
    },
    async filterProperties(page = null) {
      this.loading = true
      if (page) {
        this.pagination.page = page
      }
      await this.$store.dispatch('filterProperties', {...this.filter, ...this.pagination})
      this.loading = false
    },
    sizeChange (val) {
      this.pagination.per_page = val
      this.filterProperties()
    },
  },
  mounted () {
    this.filterProperties()
  },
  name: 'PageSearch',
}
</script>