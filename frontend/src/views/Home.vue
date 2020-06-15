<template>
  <div class="home">
    <Articles/>
  </div>
</template>

<script>
  // @ is an alias to /src
  import Articles from '@/components/Articles.vue'

  export default {
    name: 'Home',
    components: {
      Articles
    }
  }
</script>
