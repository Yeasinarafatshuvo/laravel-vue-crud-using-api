<template>
    <div >
        <HeaderPart />
        <router-view></router-view>
    </div>
</template>

<script>

import HeaderPart from './components/HeaderPart.vue'
export default {
  name: 'App',
  components: {
    HeaderPart,
  }
}
</script>

<style>

</style>
