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
    <column-search :searchFields="searchFields"></column-search>
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
          { field: 'tv_name', text: '影视名称', type: 'text' },
          { field: 'tv_lang', text: '影视语言', type: 'select', values: langs },
          { field: 'tv_area', text: '影视地区', type: 'select', values: areas },
          { field: 'created_at', text: '添加时间', type: 'time' }
        ]
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
      }
    }
  }
</script>
