<template>
  <div>
    <!-- 栏目Notice提醒 -->
    <top-message type="warning" @read="readNotice">阿里云技术红利大回馈，云数据库Redis版-集群版全面降价，最高降幅35%，详情查看网站 <a target="_blank" href="http://www.baidu.com">百度</a> </top-message>

    <!-- 栏目Title -->
    <console-title title="电影列表" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button><Icon type="loop" style="font-size:14px;" /></Button>
        <Button type="primary">Primary</Button>
      </div>
    </console-title>

    <!-- 栏目Search -->
    <column-search :searchFields="searchFields" :advancedSearch="true" @submit="search">
      <template slot="toolBar">
        <span class="aliBtn aliBtn-default"><Icon type="android-download"></Icon></span>
        <span class="aliBtn aliBtn-default"><Icon type="ios-gear"></Icon></span>
        <span class="aliBtn aliBtn-default"><Icon type="help"></Icon></span>
      </template>
    </column-search>

    <!-- 栏目内容列表 -->
    <Checkbox-group v-model="tableColumnsChecked" @on-change="changeTableColumns">
      <Checkbox label="show">展示</Checkbox>
      <Checkbox label="weak">唤醒</Checkbox>
      <Checkbox label="signin">登录</Checkbox>
      <Checkbox label="click">点击</Checkbox>
      <Checkbox label="active">激活</Checkbox>
      <Checkbox label="day7">7日留存</Checkbox>
      <Checkbox label="day30">30日留存</Checkbox>
      <Checkbox label="tomorrow">次日留存</Checkbox>
      <Checkbox label="day">日活跃</Checkbox>
      <Checkbox label="week">周活跃</Checkbox>
      <Checkbox label="month">月活跃</Checkbox>
    </Checkbox-group>
    <Table style="width:100%" :data="tableData2" :columns="tableColumns2" border></Table>
  </div>
</template>

<script>
  import topMessage from '../../components/ColumnTopMessage'
  import consoleTitle from '../../components/ConsoleTitle'
  import columnSearch from '../../components/ColumnSearch'
  import langs from '../../config/TvLangs'
  import areas from '../../config/TvAreas'
  export default {
    data: function () {
      return {
        simpleSearch: {
          field: '',
          search: null
        },
        searchFields: [
          { field: 'tv_name', text: '影视名称', type: 'text', placeholder: '请输入要搜索的名称', search: null },
          { field: 'tv_lang', text: '影视语言', type: 'select', values: langs, placeholder: '请选择语言', search: null },
          { field: 'tv_area', text: '影视地区', type: 'select', values: areas, placeholder: '请选地区', search: null },
          { field: 'created_at', text: '添加时间', type: 'time', placeholder: '请选择添加时间范围', search: null }
        ],

        tableData2: this.mockTableData2(),
        tableColumns2: [],
        tableColumnsChecked: ['show', 'weak', 'signin', 'click', 'active', 'day7', 'day30', 'tomorrow', 'day', 'week', 'month']
      }
    },
    components: {
      topMessage,
      consoleTitle,
      columnSearch
    },
    methods: {
      readNotice: function () {
        console.log('关闭了notice.')
      },
      search: function (obj) {
        console.log(obj)
      },
      mockTableData2: function () {
        let data = []
        function getNum () {
          return Math.floor(Math.random() * 10000 + 1)
        }
        for (let i = 0; i < 10; i++) {
          data.push({
            name: '推广名称' + (i + 1),
            fav: 0,
            show: getNum(),
            weak: getNum(),
            signin: getNum(),
            click: getNum(),
            active: getNum(),
            day7: getNum(),
            day30: getNum(),
            tomorrow: getNum(),
            day: getNum(),
            week: getNum(),
            month: getNum()
          })
        }
        return data
      },
      getTable2Columns () {
        const table2ColumnList = {
          name: {
            title: '名称',
            key: 'name',
            fixed: 'left',
            width: 200
          },
          show: {
            title: '展示',
            key: 'show',
            width: 150,
            sortable: true
          },
          weak: {
            title: '唤醒',
            key: 'weak',
            width: 150,
            sortable: true
          },
          signin: {
            title: '登录',
            key: 'signin',
            width: 150,
            sortable: true
          },
          click: {
            title: '点击',
            key: 'click',
            width: 150,
            sortable: true
          },
          active: {
            title: '激活',
            key: 'active',
            width: 150,
            sortable: true
          },
          day7: {
            title: '7日留存',
            key: 'day7',
            width: 150,
            sortable: true
          },
          day30: {
            title: '30日留存',
            key: 'day30',
            width: 150,
            sortable: true
          },
          tomorrow: {
            title: '次日留存',
            key: 'tomorrow',
            width: 150,
            sortable: true
          },
          day: {
            title: '日活跃',
            key: 'day',
            width: 150,
            sortable: true
          },
          week: {
            title: '周活跃',
            key: 'week',
            width: 150,
            sortable: true
          },
          month: {
            title: '月活跃',
            key: 'month',
            width: 150,
            sortable: true
          }
        }
        let data = [table2ColumnList.name]

        this.tableColumnsChecked.forEach(function (col) { data.push(table2ColumnList[col]) })
        return data
      },
      changeTableColumns () {
        this.tableColumns2 = this.getTable2Columns()
      },
      toggleFav (index) {
        this.tableData2[index].fav = this.tableData2[index].fav === 0 ? 1 : 0
      }
    }
  }
</script>
