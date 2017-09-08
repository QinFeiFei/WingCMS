<template>
  <div class="column-search">
    <!-- 简单搜索 -->
    <div class="simpleSearch" v-if="searchType == 'simple'">
      <Select v-model="simpleSearch_.field" style="width:120px">
        <Option v-for="(item, index) in searchFields" :value="item.field" :key="index">{{ item.text }}</Option>
      </Select>
      <template>
        <Input v-if="simpleSearch_.type === 'text'" v-model.trim="simpleSearch_.search" :placeholder="simpleSearch_.placeholder" style="width: 200px" />
        <Date-picker v-if="simpleSearch_.type === 'time'" v-model="simpleSearch_.search" type="datetimerange" format="yyyy-MM-dd HH:mm" :placeholder="simpleSearch_.placeholder" style="width: 300px;display:inline-block" />
        <Select  v-if="simpleSearch_.type === 'select'" v-model="simpleSearch_.search" :placeholder="simpleSearch_.placeholder" style="width:200px">
          <Option v-for="(item, index) in simpleSearch_.values" :value="item.value" :key="index">{{ item.label }}</Option>
        </Select>
      </template>
      <Button type="primary" @click="submit">搜索</Button>
    </div>

    <!-- 高级搜索 -->
    <div class="advancedSearch" v-if="advancedSearch && searchType == 'advanced'">
      <div class="advanced_field" v-for="(item, index) in searchFields_" :key="index">
        <Row>
          <Col span="7"><label class="advancedLabel" :for="'advanced_field_'+index">{{ item.text }}：</label></Col>
          <Col span="17">
            <Input :id="'advanced_field_'+index" v-if="item.type === 'text'" v-model.trim="searchFields_[index].search" :placeholder="item.placeholder" />
            <Date-picker :id="'advanced_field_'+index" v-if="item.type === 'time'" v-model="searchFields_[index].search" format="yyyy-MM-dd HH:mm" type="datetimerange" :placeholder="item.placeholder" />
            <Select :id="'advanced_field_'+index" v-if="item.type === 'select'" v-model="searchFields_[index].search" :placeholder="item.placeholder">
              <Option v-for="(iitem, index) in item.values" :value="iitem.value" :key="index">{{ iitem.label }}</Option>
            </Select>
          </Col>
        </Row>
      </div>
      <div class="clearbox" style="width:33.33%">
        <Row>
          <Col span="7"><span>&nbsp;</span></Col>
          <Col span="17">
            <Button type="primary" @click="submit">高级搜索</Button>
            <Button @click="reset">清空条件</Button>
          </Col>
        </Row>
      </div>
    </div>

    <div class="tool-bar">
      <span class="aliBtn advancedBtn" v-if="advancedSearch" @click="switchType">
        {{ searchType === 'advanced' ? '普通搜索' : '高级搜索' }}
      </span>
      <slot name="toolBar"></slot>
    </div>
  </div>
</template>

<script>
  import _ from 'lodash'

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
        searchType: 'simple',     // simple Or advanced
        searchFields_: [],
        simpleSearch_: {
          field: '',
          type: '',
          search: '',
          placeholder: '',
          values: null
        }
      }
    },
    created: function () {
      this.searchFields_ = this.searchFields

      // 普通搜索默认选择第一个
      this.simpleSearch_.field = this.searchFields[0].field
      this.simpleSearch_.type = this.searchFields[0].type
      this.simpleSearch_.placeholer = this.searchFields[0].placeholder
      this.simpleSearch_.values = this.searchFields[0].values
    },
    methods: {
      switchType: function () {
        this.searchType = this.searchType === 'simple' ? 'advanced' : 'simple'
        this.simpleSearch_.search = ''
      },
      fieldIndex: function (field) {
        return _.findIndex(this.searchFields, function (chr) {
          return chr.field === field
        })
      },
      submit: function () {
        let index = this.fieldIndex(this.simpleSearch_.field)
        this.searchFields_[index].search = this.simpleSearch_.search

        this.$emit('submit', this.searchFields_)
      },
      reset: function () {
        for (var field of this.searchFields_) {
          field.search = null
        }
      }
    },
    watch: {
      simpleSearch_: {
        handler: function (val, old) {
          let index = this.fieldIndex(val.field)
          this.simpleSearch_.type = this.searchFields[index].type
          this.simpleSearch_.placeholder = this.searchFields[index].placeholder
          this.simpleSearch_.values = this.searchFields[index].values
        },
        deep: true
      },
      searchFields_: {
        handler: function (val, old) {
          this.searchFields_ = val
        },
        deep: true
      }
    }
  }
</script>

<style scoped>
  .column-search {
    margin-top: 10px;
    margin-bottom: 10px;
    position: relative;
  }
  .tool-bar {
    position: absolute;
    bottom: 0px;
    right: 0px;
  }
  .advancedSearch {
    width: 95%;
    margin: 0 auto;
  }
  .advancedBtn {
    color:#2d8cf0;
    cursor:pointer;
    margin-right:10px;
  }
  .advanced_field {
    margin-bottom:8px;
    width:33.33%;
    display:inline-block;
  }
  .advancedLabel {
    height:32px;
    line-height:32px;
    text-align:right;
    display:block;
    padding-right:12px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }
</style>
