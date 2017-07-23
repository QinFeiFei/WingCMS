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
      <div class="fleft w150">
        <Upload name="avatar" :action="uploadUrl" ref="upload" :on-success="handleSuccess" :format="['jpg','jpeg','png']" :on-format-error="handleFormatError" type="drag" style="display:inline-block;width:130px;height:130px;">
          <div style="width: 130px;height:130px;line-height: 130px; font-size:30px;">
            <Icon type="ios-person" size="30"></Icon>
          </div>
        </Upload>
      </div>

      <div class="fleft">
        <Form-item label="用户名" prop="username">
          <Input v-model="formFields.username" size="large" placeholder="请输入用户名" class="itemWidth" />
        </Form-item>

        <Form-item label="密码" prop="password">
          <Input type="password" v-model="formFields.password" size="large" placeholder="请输入密码" class="itemWidth" />
        </Form-item>

        <Form-item label="邮箱" prop="email">
          <Input v-model="formFields.email" size="large" placeholder="请输入用户邮箱" class="itemWidth" />
        </Form-item>

        <Form-item label="手机" prop="phone">
          <Input v-model="formFields.phone" size="large" placeholder="请输入手机号" class="itemWidth" />
        </Form-item>

        <Form-item>
          <Button v-if="pageType === 'UserCreate'" type="primary" @click="create">确认添加</Button>
          <Button v-if="pageType === 'UserUpdate'" type="primary" @click="update">确认修改</Button>
        </Form-item>
      </div>
      <div class="clearbox"></div>
    </Form>
  </div>
</template>

<script type="text/ecmascript-6">
  import consoleTitle from '../../components/ConsoleTitle'
  import { userStore, userUploadAvatar, userShow, userUpdate } from '../../api/user'

  export default {
    name: 'userPage',
    created: function () {
      this.pageType = this.$route.name
      this.pageType === 'UserUpdate' ? this.loadUser() : ''
    },
    data: function () {
      return {
        uploadUrl: userUploadAvatar,
        formFields: {
          user_id: 0,
          username: '',
          password: '',
          avatar: '',
          email: '',
          phone: ''
        },
        formRules: {
          username: [
            { required: true, message: '用户名不能为空', trigger: 'blur' }
          ],
          password: [
            { min: 6, max: 20, message: '密码长度为6-20位', trigger: 'blur' }
          ],
          email: [
            { type: 'email', message: '邮箱格式错误', trigger: 'blur' }
          ],
          phone: [
            { pattern: /^1[3|4|5|8][0-9]\d{4,8}$/g, message: '手机号格式错误', trigger: 'blur' }
          ]
        }
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
      handleSuccess (res, file) {
        this.formFields.avatar = res.result
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
            url: userStore,
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
      loadUser: function () {
        this.isLoading = true
        this.axios({
          method: 'GET',
          url: userShow + this.$route.params.user_id
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
            url: userUpdate + this.formFields.tv_id,
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
    }
  }
</script>

<style scoped>
</style>
