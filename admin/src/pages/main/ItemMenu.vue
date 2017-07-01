<template>
  <div class="item-menu" :class="fold ? '' : 'w0'">
    <div class="view-body-navbar" :class="fold ? '' : 'hide'">
      <h2 class="item-menu-title">{{ childMenus_.title }}</h2>
      <div class="item-menu-list">
        <ul>
          <li :class="{ active: (item.active && !item.child) || (item.active && item.child && !item.display) }" v-for="(item, index) in childMenus_.menus" @click="toggleActive(item, index, null)">
            <router-link :to="{ name: item.routeName }">
              <div class="menu-icon"><Icon :type="item.display ? 'arrow-down-b' : 'arrow-right-b' " v-if="item.child"></Icon></div>
              <div class="menu-name" @click="toggleItem(item, index)">{{ item.itemName }}</div>
            </router-link>
            <ul v-if="item.child" :class="[item.display ? 'show' : 'hide']">
              <li :class="{ active: childItem.active }" v-for="(childItem, childIndex) in item.child" @click.stop="toggleActive(item, index, childIndex)">
                <router-link :to="{ name: childItem.routeName }">
                  <div class="menu-icon"></div>
                  <div class="menu-name">{{ childItem.childName }}</div>
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div class="view-body-collapse" :class="{ collapse_un: !fold }" @click="changeFold">
      <Icon :type="fold ? 'chevron-left' : 'chevron-right'"></Icon>
    </div>
  </div>
</template>

<script>
export default {
  name: 'itemMenu',
  props: {
    childMenus: {
      type: Object,
      required: true
    }
  },
  data: function () {
    return {
      childMenus_: {},
      fold: true
    }
  },
  created: function () {
    this.childMenus_ = this.childMenus
  },
  methods: {
    toggleItem: function (item, index) {
      if (this.childMenus_.menus[index].display) {
        this.childMenus_.menus[index].display = false
      } else {
        this.childMenus_.menus[index].display = true
      }
    },
    toggleActive: function (item, index, childIndex) {
      this.childMenus_.menus.forEach(function (item, i) {
        item.active = false
        if (item.child) {
          item.child.forEach(function (childItem, i) {
            childItem.active = false
          })
        }
      })

      this.childMenus_.menus[index].active = true
      if (childIndex != null) {
        this.childMenus_.menus[index].child[childIndex].active = true
      }
    },
    changeFold: function () {
      this.fold = !this.fold
      this.$emit('fold', this.fold)
    }
  }
}
</script>

<style scoped>
</style>
