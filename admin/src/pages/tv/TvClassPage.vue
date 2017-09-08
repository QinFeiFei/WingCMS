<template>
  <div>
    <!-- 栏目Title -->
    <console-title title="添加分类标签" class="console-title-border">
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
      <Form-item label="影视分类" prop="tv_type" class="itemWidth" style="width: 200px">
        <Select v-model="formFields.tv_type" placeholder="请选择影视类型">
          <Option :value="item.value" v-for="(item, index) in types" :key="index">{{ item.label }}</Option>
        </Select>
      </Form-item>

      <Form-item label="分类标签名称" prop="tv_class_name">
        <Input v-model="formFields.tv_class_name" placeholder="请输入分类标签名称" class="itemWidth" style="width:200px;" />
      </Form-item>

      <Form-item>
        <Button v-if="pageType === 'TvClassCreate'" type="primary" @click="create">确认添加</Button>
        <Button v-if="pageType === 'TvClassUpdate'" type="primary" @click="update">确认修改</Button>
      </Form-item>
    </Form>
  </div>
</template>
<script type="text/ecmascript-6">
  import consoleTitle from '../../components/ConsoleTitle'
  import { tvClassStore, tvClassShow, tvClassUpdate } from '../../api/tv'

  export default {
    created: function () {
      this.pageType = this.$route.name
      this.pageType === 'TvClassUpdate' ? this.loadTvClass() : ''
    },
    data: function () {
      return {
        pageType: '',
        classifys: [],
        formFields: {
          tv_class_id: 0,
          tv_class_name: '',
          tv_type: ''
        },
        formRules: {
          tv_class_name: [
            { required: true, message: '分类标签不能为空', trigger: 'change' }
          ],
          tv_type: [
            { required: true, message: '影视分类不能为空', trigger: 'blur' }
          ]
        },
        tmp_tv_type: ''
      }
    },
    components: {
      consoleTitle
    },
    methods: {
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
            url: tvClassStore,
            method: 'POST',
            data: {
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
      loadTvClass: function () {
        this.isLoading = true
        this.axios({
          method: 'GET',
          url: tvClassShow + this.$route.params.tv_class_id
        }).then(response => {
          this.isLoading = false
          response.data.tv_type = response.data.tv_type.toString()
          this.formFields = response.data
        })
      },
      update: function () {
        if (this.validForm()) {
          this.isLoading = true
          this.axios({
            url: tvClassUpdate + this.formFields.tv_class_id,
            method: 'PATCH',
            data: {
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
