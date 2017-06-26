<template>
  <div class="item-menu">
    <div class="view-body-navbar">
      <h2 class="item-menu-title">{{ childMenus_.title }}</h2>
      <div class="item-menu-list">
        <ul>
          <li :class="{ active: item.active }" v-for="(item, index) in childMenus_.menus">
            <router-link :to="{ name: item.routeName }">
              <div class="menu-icon"><Icon :type="item.display ? 'arrow-down-b' : 'arrow-right-b' " v-if="item.child"></Icon></div>
              <div class="menu-name" @click="toggleItem(item, index)">{{ item.itemName }}</div>
            </router-link>
            <ul v-if="item.child" :class="[item.display ? 'show' : 'hide']">
              <li v-for="(childItem, childIndex) in item.child">
                <a href="">
                  <div class="menu-icon"></div>
                  <div class="menu-name">{{ childItem.childName }}</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div class="view-body-collapse">
      <Icon type="chevron-left"></Icon>
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
      childMenus_: {}
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
    }
  }
}
</script>

<style scoped>

</style>
