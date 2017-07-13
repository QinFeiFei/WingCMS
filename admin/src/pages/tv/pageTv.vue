<template>
  <div>
    <!-- 栏目Title -->
    <console-title title="添加电影" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <span onclick="window.history.back()"><Button type="primary"><Icon type="chevron-left"></Icon>　返回</Button></span>
      </div>
    </console-title>

    <!-- 页面修改提示信息 -->
    <Alert show-icon class="mt15">
      消息提示文案
      <template slot="desc">消息提示的描述文案消息提示的描述文案消息提示的描述文案消息提示的描述文案消息提示的描述文案</template>
    </Alert>

    <Form ref="formFields" :model="formFields" label-position="top" class="formWarp">
      <Form-item label="影视分类" class="itemWidth" style="width: 200px">
        <Select v-model="formFields.tv_type" placeholder="请选择影视类型">
          <Option :value="item.id" v-for="item in types" :key="item.id">{{ item.text }}</Option>
        </Select>
      </Form-item>

      <Form-item label="影视名称">
        <Input v-model="formFields.tv_name" placeholder="请输入影视名称" class="itemWidth" />
      </Form-item>

      <Form-item label="影视原名">
        <Input v-model="formFields.tv_alias_name" placeholder="请输入影视原名" class="itemWidth" />
      </Form-item>

      <Form-item label="简短的广告">
        <Input v-model="formFields.tv_brief" placeholder="请用一句简洁的广告吸引用户" class="itemWidth" />
      </Form-item>

      <Form-item label="剧情介绍">
        <Input v-model="formFields.tv_description" type="textarea" :autosize="{minRows: 5,maxRows: 10}" placeholder="请输入剧情介绍" class="itemWidth" />
      </Form-item>

      <Form-item label="影视类型">
        <Checkbox-group v-model="classifys">
          <Checkbox :label="item" v-for="item in classify" :key="item">
            <span>{{ item }}</span>
          </Checkbox>
        </Checkbox-group>
      </Form-item>

      <Form-item label="百度链接" >
        <Input v-model="formFields.tv_baidu_url" placeholder="请输入百度分享链接" class="itemWidth" />
      </Form-item>

      <Form-item label="百度密码" >
        <Input v-model="formFields.tv_baidu_pwd" placeholder="请输入百度分享密码" class="itemWidth" />
      </Form-item>

      <Form-item label="影视封面" >
        {{ formFields.tv_cover }}
        <Upload type="drag" action="//jsonplaceholder.typicode.com/posts/" class="itemWidth">
          <div style="padding: 20px 0">
            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
            <p>点击或将文件拖拽到这里上传</p>
          </div>
        </Upload>
      </Form-item>

      <Form-item label="上影日期" class="itemWidth">
        <Date-picker v-model="formFields.tv_show_date" type="date" placeholder="请选择上影日期" style="width: 200px"></Date-picker>
      </Form-item>

      <Form-item label="影视年代" class="itemWidth">
        <Date-picker v-model="formFields.tv_show_year" type="year" placeholder="选择年" style="width: 200px"></Date-picker>
      </Form-item>

      <Form-item label="语言" class="itemWidth">
        <Select v-model="formFields.tv_lang" placeholder="请选择影视语言" style="width: 200px">
          <Option v-for="item in langs" :key="item" :value="item.value">{{ item.label }}</Option>
        </Select>
      </Form-item>

      <Form-item label="地区" class="itemWidth">
        <Select v-model="formFields.city" placeholder="请选择地区" style="width: 200px">
          <Option v-for="item in areas" :key="item" :value="item.value">{{ item.label }}</Option>
        </Select>
      </Form-item>

      <Form-item label="时长" class="itemWidth">
        <Input-number :max="999" :min="1" :step="1" v-model="formFields.tv_minute"></Input-number>
        <p class="itemText">（单位:分钟）</p>
      </Form-item>

      <Form-item label="导演" class="itemWidth">
        <Input v-model="formFields.tv_director" placeholder="请输入导演" class="itemWidth" />
      </Form-item>

      <Form-item label="演员" class="itemWidth">
        <edit-array :toArray="formFields.tv_actors.actors" @change="updateActors"></edit-array>
      </Form-item>

      <Form-item>
        <Button type="primary" @click="create">确认添加</Button>
        <Button type="primary" @click="update">确认修改</Button>
      </Form-item>
    </Form>
  </div>
</template>
<script type="text/ecmascript-6">
  import consoleTitle from '../../components/ConsoleTitle'
  import editArray from '../../components/EditArray'
  import { tvStore } from '../../api/tv'

  export default {
    created: function () {
    },
    data: function () {
      return {
        classifys: [],
        formFields: {
          tv_id: 0,
          tv_name: '',
          tv_alias_name: '',
          tv_brief: '',
          tv_description: '',
          tv_type: 10,
          tv_cover: '',
          tv_show_date: '',
          tv_show_year: '',
          tv_lang: 0,
          tv_area: '',
          tv_actors: { actors: [] },
          tv_director: '',
          tv_minute: 0,
          tv_baidu_url: '',
          tv_baidu_pwd: ''
        }
      }
    },
    components: {
      consoleTitle,
      editArray
    },
    methods: {
      updateActors: function (arr) {
        this.formFields.tv_actors.actors = arr
      },
      create: function () {
        this.axios({
          url: tvStore,
          method: 'POST',
          data: {
          }
        }).then(response => {
        })
      },
      update: function () {
      },
      show: function () {
      }
    }
  }
</script>

<style scoped>
  .formWarp { background: #f7f7f7;padding:30px; border-radius:10px; }
  .ivu-form .ivu-form-item-label { color: #262626; }
  .itemWidth { width:600px; }
  .itemText { display:inline-block;color:#999; }
</style>
