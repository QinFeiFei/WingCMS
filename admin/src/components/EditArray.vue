<template>
  <div>
    <template v-for="(item, index) in dataArray_">
      <div class="editArrayWarp ">
        <input class="editInput" type="text" :value="item">
        <span @click="removeItem(index)" class="editSpan"><Icon type="close"></Icon></span>
      </div>
    </template>

    <div class="editArrayWarp editnow">
      <input class="editInput" v-model="tmpVal" type="text" placeholder="添加新的演员" />
      <span @click="addItem()" class="editSpan"><Icon type="checkmark"></Icon></span>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      toArray: {
        require: true,
        type: Array
      }
    },
    data: function () {
      return {
        tmpVal: '',
        dataArray_: []
      }
    },
    methods: {
      addItem: function () {
        this.dataArray_.push(this.tmpVal)
        this.tmpVal = ''
        this.notice()
      },
      removeItem: function (index) {
        this.dataArray_.splice(index, 1)
        this.notice()
      },
      notice: function () {
        this.$emit('change', this.dataArray_)
      }
    },
    watch: {
      toArray: function () {
        this.dataArray_ = this.toArray
      }
    }
  }
</script>
<style scoped>
  .editArrayWarp {
    display:inline-block; margin:0px 10px 10px 0px;
  }
  .editInput {
    display:inline-block;
    width:100px;
    text-align:center;
    border:1px solid #d4d4d4;
    height:30px;
    line-height:30px;
  }
  .editInput:focus {
    border:1px solid #2d8cf0;
  }
  .editSpan {
    width:30px;
    height:30px;
    background:#d4d4d4;
    text-align:center;
    display:inline-block;
    position:relative;
    top:1px;
    left:-3px;
    cursor: pointer;
  }
  .editnow input {
    border-color:#19be6b;
  }
  .editnow span {
    background:#19be6b;
    color:#fff;
  }
</style>
