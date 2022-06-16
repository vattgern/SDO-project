<template>
<!--  <SideBarComponent></SideBarComponent>-->
  <div style="width: 100%; height: 100vh;">
    <router-view></router-view>
  </div>
</template>

<script>
import SideBarComponent from "./SideBarComponent";
export default {
  name: "MainComponent",
  components: {
      SideBarComponent
  },
  data() {
    return {
      token: window.localStorage.getItem('token')
    }
  },
}
</script>

<style scoped>

</style>
