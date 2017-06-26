<template>
  <div class="item-menu">
    <div class="view-body-navbar">
      <h2 class="item-menu-title">{{ childMenus.title }}</h2>
      <div class="item-menu-list">
        <ul>
          <li :class="{ active: item.active }" v-for="(item, index) in childMenus.menus">
            <router-link :to="{ name: item.routeName }">
              <div class="menu-icon"><Icon type="arrow-right-b" v-if="item.child" ></Icon></div>
              <div class="menu-name">{{ item.itemName }}</div>
            </router-link>
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
    return {}
  },
  created: function () {
  },
  methods: {

  }
}
</script>

<style scoped>

</style>
