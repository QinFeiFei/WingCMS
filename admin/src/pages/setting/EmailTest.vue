<template>
  <div>
    <!-- 栏目Title -->
    <console-title title="邮件发送测试" class="console-title-border">
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

    <Form ref="formFields" :model="formFields" label-position="top" :rules="formRules" class="formWarp">
      <div class="fleft">
        <Form-item label="发送类型">
          <p>{{ setting.MAIL_DRIVER }}</p>
        </Form-item>

        <Form-item label="邮件服务器">
          <p>{{ setting.MAIL_HOST }}</p>
        </Form-item>

        <Form-item label="端口">
          <p>{{ setting.MAIL_PORT }}</p>
        </Form-item>

        <Form-item label="发信人用户名">
          <p>{{ setting.MAIL_USERNAME }}</p>
        </Form-item>

        <Form-item label="发信人密码">
          <p>{{ setting.MAIL_PASSWORD }}</p>
        </Form-item>

        <Form-item label="发信人邮件地址">
          <p>{{ setting.MAIL_FROM_ADDRESS }}</p>
        </Form-item>

        <Form-item label="发信人">
          <p>{{ setting.MAIL_FROM_NAME }}</p>
        </Form-item>

        <Form-item label="测试接收的邮件地址" prop="email">
          <Input v-model="formFields.email" size="large" placeholder="请输入一个接收测试邮件的邮箱" class="itemWidth" />
        </Form-item>

        <Form-item>
          <Button type="primary" @click="send">发送</Button>
        </Form-item>
      </div>
      <div class="clearbox"></div>
    </Form>

  </div>
</template>
<script type="text/ecmascript-6">
  import consoleTitle from '../../components/ConsoleTitle'
  import { emailTest, sendEmail } from '../../api/setting'

  export default {
    name: 'emailTest',
    created: function () {
      this.load()
    },
    data: function () {
      return {
        setting: {
          'MAIL_DRIVER': '',
          'MAIL_HOST': '',
          'MAIL_PORT': '',
          'MAIL_USERNAME': '',
          'MAIL_PASSWORD': '',
          'MAIL_ENCRYPTION': '',
          'MAIL_FROM_ADDRESS': '',
          'MAIL_FROM_NAME': ''
        },
        formFields: {
          email: ''
        },
        formRules: {
          email: [
            { required: true, message: '邮箱不能为空', trigger: 'blur' },
            { type: 'email', message: '邮箱格式错误', trigger: 'blur' }
          ]
        }
      }
    },
    components: {
      consoleTitle
    },
    computed: {
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
      load: function () {
        this.axios({
          url: emailTest,
          method: 'GET'
        }).then(response => {
          this.setting = response.data.result
        })
      },
      send: function () {
        if (this.validForm()) {
          this.isLoading = true
          this.axios({
            url: sendEmail,
            method: 'POST',
            data: {
              email: this.formFields.email,
              type: 'test'
            }
          }).then(response => {
            this.isLoading = false
            if (response.data.code !== 0) {
              this.$Message.error(response.data.msg)
            } else {
              this.$Message.success('邮件发送成功')
            }
          })
        }
      }
    }
  }
</script>

<style scoped>
</style>
