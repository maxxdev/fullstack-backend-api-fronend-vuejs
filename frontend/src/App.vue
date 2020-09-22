<template>
  <div id="app">
    <Subheader/>
    <router-view/>
  </div>
</template>
<script>
import Subheader from "./components/subheader";
export default {
  components: {Subheader}
}
</script>