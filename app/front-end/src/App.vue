<script setup>
import Sidebar from 'primevue/sidebar';
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>
  <RouterView />
</template>

<style scoped>
* {
  margin: 0;
  padding: 0;
}

#app {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  display: flex;
}
</style>
