<template>
  <div>
    <!-- 栏目Title -->
    <console-title title="Banner编辑" class="console-title-border">
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
      <Form-item label="Banner标题" prop="banner_title">
        <Input v-model="formFields.banner_title" placeholder="请输入Banner标题" class="itemWidth" />
      </Form-item>

      <Form-item label="排序">
        <InputNumber :max="255" :min="1" v-model="formFields.banner_sort" />
      </Form-item>

      <Form-item label="Banner链接">
        <Input v-model="formFields.banner_url" placeholder="例如：http://www.baidu.com" style="width:250px;" />
      </Form-item>

      <Form-item label="Banner背景色">
        <Input v-model="formFields.banner_bgcolor" placeholder="" style="width:250px;" />
        <ColorPicker v-model="formFields.banner_bgcolor" />
      </Form-item>

      <Form-item label="影视封面" >
        <template v-if="formFields.banner_src !== ''">
          <img :src="uploadDirUrl+formFields.banner_src" class="w300" />
        </template>
        <Upload name="banner_src" type="drag" :action="uploadUrl" :headers="tokenAuth" :max-size="2048" :format="['jpg','jpeg','png','gif']" :on-success="handleSuccess" :on-format-error="handleFormatError" :on-exceeded-size="handleMaxSize" :on-remove="handleRemove" :before-upload="handleBeforeUpload" class="itemWidth">
          <div style="padding: 20px 0">
            <Icon type="ios-cloud-upload" size="52" style="color: #3399ff"></Icon>
            <p>点击或将文件拖拽到这里上传</p>
          </div>
        </Upload>
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
  import { tvStore, tvUploadCover, tvShow, tvUpdate } from '../../api/tv'

  export default {
    created: function () {
      this.pageType = this.$route.name
      this.pageType === 'bannerCreate' ? this.loadTv() : ''
    },
    data: function () {
      return {
        pageType: '',
        classifys: [],
        formFields: {
          tv_id: 0,
          tv_name: '',
          banner_sort: 255,
          banner_url: '',
          banner_bgcolor: '#FFFFFF',
          tv_type: ''
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
        uploadUrl: tvUploadCover,
        tmp_tv_type: ''
      }
    },
    components: {
      consoleTitle
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
      },
      handleRemove (file, fileList) {
        this.formFields.banner_src = ''
      },
      handleSuccess (res, file) {
        this.formFields.banner_src = res.result
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
            this.classifys.push(info.tv_class_id + '-' + info.tv_class_name)
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
      }
    },
    watch: {
    }
  }
</script>

<style scoped>
</style>
