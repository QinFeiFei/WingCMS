<template>
  <div>
    <!-- 栏目Title -->
    <console-title title="添加电影" class="console-title-border">
      <div slot="left" style="max-width:400px;">
      </div>
      <div slot="right" style="width:auto;height:auto;position:absolute;top:10px;right:0px;">
        <Button type="primary" @click="$router.back()"><Icon type="chevron-left"></Icon>　返回</Button>
      </div>
    </console-title>

    <!-- 页面修改提示信息 -->
    <Alert show-icon class="mt15">
      消息提示文案
      <template slot="desc">消息提示的描述文案消息提示的描述文案消息提示的描述文案消息提示的描述文案消息提示的描述文案</template>
    </Alert>

    <Form ref="formFields" :model="formFields" label-position="top" :rules="formRules" class="formWarp" v-loading="isLoading">
      <Alert type="success" show-icon style="position:relative;top:-10px;">
        <Icon type="ios-time" slot="icon"></Icon>
        上次更新时间：{{ formFields.updated_at }}
      </Alert>

      <Form-item label="影视分类" prop="tv_type" class="itemWidth" style="width: 200px">
        <Select v-model="formFields.tv_type" placeholder="请选择影视类型">
          <Option :value="item.value" v-for="item in types" :key="item.id">{{ item.label }}</Option>
        </Select>
      </Form-item>

      <Form-item label="影视名称" prop="tv_name">
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
          <Checkbox :label="item.value + '-' + item.label" v-for="item in classify" :key="item">
            <span>{{ item.label }}</span>
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
        <template v-if="formFields.tv_cover !== ''">
          <img :src="uploadDirUrl+formFields.tv_cover" class="w300" />
        </template>
        <Upload name="tv_cover" type="drag" :action="uploadUrl" :headers="tokenAuth" :max-size="2048" :format="['jpg','jpeg','png','gif']" :on-success="handleSuccess" :on-format-error="handleFormatError" :on-exceeded-size="handleMaxSize" :on-remove="handleRemove" :before-upload="handleBeforeUpload" class="itemWidth">
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
        <Date-picker v-model="formFields.tv_show_year" type="year" placeholder="选择年代" style="width: 200px"></Date-picker>
      </Form-item>

      <Form-item label="语言" class="itemWidth">
        <Select v-model="formFields.tv_lang" placeholder="请选择影视语言" style="width: 200px">
          <Option v-for="item in langs" :key="item" :value="item.value">{{ item.label }}</Option>
        </Select>
      </Form-item>

      <Form-item label="地区" class="itemWidth">
        <Select v-model="formFields.tv_area" placeholder="请选择地区" style="width: 200px">
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
        <Button v-if="pageType === 'TvCreate'" type="primary" @click="create">确认添加</Button>
        <Button v-if="pageType === 'TvUpdate'" type="primary" @click="update">确认修改</Button>
      </Form-item>
    </Form>
  </div>
</template>
<script type="text/ecmascript-6">
  import consoleTitle from '../../components/ConsoleTitle'
  import editArray from '../../components/EditArray'
  import { tvStore, tvUploadCover, tvShow, tvUpdate } from '../../api/tv'
  import moment from 'moment'

  export default {
    created: function () {
      this.formFields.tv_type = this.parseTvTypeValue(this.$route.params.type)  // 影视分类, 默认选中电影
      this.formFields.tv_lang = this.langs[0].value  // 影视语言, 默认选中中文
      this.formFields.tv_area = this.areas[0].value  // 影视地区, 默认选中大陆

      this.pageType = this.$route.name
      this.pageType === 'TvUpdate' ? this.loadTv() : ''
    },
    data: function () {
      return {
        pageType: '',       // 页面当前操作：TvCreate增加，TvUpdate修改
        classifys: [],
        formFields: {
          tv_id: 0,
          tv_name: '',
          tv_alias_name: '',
          tv_brief: '',
          tv_description: '',
          tv_type: '',
          tv_cover: '',
          tv_show_date: moment().format('YYYY-MM-DD'),
          tv_show_year: moment().format('YYYY'),
          tv_lang: '',
          tv_area: '',
          tv_actors: { actors: [] },
          tv_director: '',
          tv_minute: 0,
          tv_baidu_url: '',
          tv_baidu_pwd: ''
        },
        formRules: {
          tv_type: [
            { required: true, message: '影视分类不能为空', trigger: 'change' }
          ],
          tv_name: [
            { required: true, message: '影视名称不能为空', trigger: 'blur' }
          ],
          tv_lang: [
            { required: true, message: '影视语言不能为空', trigger: 'change' }
          ],
          tv_area: [
            { required: true, message: '影视地区不能为空', trigger: 'change' }
          ]
        },
        uploadUrl: tvUploadCover
      }
    },
    components: {
      consoleTitle,
      editArray
    },
    methods: {
      handleFormatError (file) {
        this.$Notice.warning({
          title: '文件格式不正确',
          desc: '文件 ' + file.name + ' 格式不正确，请上传 jpg 或 png、gif 格式的图片。'
        })
      },
      handleMaxSize (file) {
        this.$Notice.warning({
          title: '超出文件大小限制',
          desc: '文件 ' + file.name + ' 太大，不能超过 2M。'
        })
      },
      handleBeforeUpload () {
        const check = this.formFields.tv_cover === ''
        if (!check) {
          this.$Notice.warning({
            title: '影视封面已上传'
          })
        }
        return check
      },
      handleRemove (file, fileList) {
        this.formFields.tv_cover = ''
      },
      handleSuccess (res, file) {
        this.formFields.tv_cover = res.result
      },
      validForm: function () {
        let isValid = true
        this.$refs['formFields'].validate((valid) => {
          if (!valid) {
            this.$Message.error('填写信息有误,请按要求填写!')
            isValid = false
          }
        })
        return isValid
      },
      create: function () {
        if (this.validForm()) {
          this.isLoading = true
          this.axios({
            url: tvStore,
            method: 'POST',
            data: {
              classifys: this.classifys,
              formFields: this.formFields
            }
          }).then(response => {
            this.isLoading = false
            if (response.data.code !== 0) {
              this.$Message.error(response.data.msg)
            } else {
              this.$Message.success('添加成功')
              this.$router.back()
            }
          })
        }
      },
      loadTv: function () {
        this.isLoading = true
        this.axios({
          method: 'GET',
          url: tvShow + this.$route.params.tv_id
        }).then(response => {
          this.isLoading = false
          let result = response.data
          for (let info of result.classifys) {
            this.classifys.push(info.classify_key + '-' + info.classify_name)
          }

          delete result.classifys
          this.formFields = result
        })
      },
      update: function () {
        if (this.validForm()) {
          this.isLoading = true
          this.axios({
            url: tvUpdate + this.formFields.tv_id,
            method: 'PATCH',
            data: {
              classifys: this.classifys,
              formFields: this.formFields
            }
          }).then(response => {
            this.isLoading = false
            if (response.data.code !== 0) {
              this.$Message.error(response.data.msg)
            } else {
              this.$Message.success('修改成功')
              this.$router.back()
            }
          })
        }
      },
      updateActors: function (arr) {
        this.formFields.tv_actors.actors = arr
      }
    }
  }
</script>

<style scoped>
</style>
