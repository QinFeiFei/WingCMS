<template>
  <div class="column-search">
    <!-- 简单搜索 -->
    <div class="simpleSearch">
      <Select v-model="simpleField" style="width:120px">
        <Option v-for="item in searchFields" :value="item.field" :key="item">{{ item.text }}</Option>
      </Select>
      <Input v-model="simpleSearch" :placeholder="simplePlaceholder" style="width: 200px" />
      <Button type="primary">搜索</Button>
    </div>

    <!-- 高级搜索 -->
    <div class="advancedSearch" v-if="advancedSearch">
      advancedSearch
    </div>

    <div class="tool-bar">
      <span class="advancedBtn" v-if="advancedSearch">高级搜索</span>
    </div>
  </div>
</template>

<script>
  export default {
    props: {
      advancedSearch: {
        type: Boolean,
        required: false,
        default: false
      },
      searchFields: {
        type: Array,
        required: true
      }
    },
    data: function () {
      return {
        simpleField: '',
        simpleSearch: '',
        simplePlaceholder: ''
      }
    },
    created: function () {
      this.simpleField = this.searchFields[0].field
    },
    methods: function () {
    },
    watch: {
      simpleField: function (val, oldVal) {
        this.simpleSearch = ''
        this.simplePlaceholder = ''
      }
    }
  }
</script>

<style scoped>
  .column-search {
    margin-top: 10px;
    position: relative;
  }
  .tool-bar {
    position: absolute;
    bottom: 7px;
    right: 0;
  }
  .advancedBtn {
    color:#2d8cf0;
    cursor:pointer;
  }
</style>
