<template>
  <div class="articles">
    <h1>Articles</h1>
    <pre>{{articles}}</pre>
  </div>
</template>

<script>
  export default {
    name: 'Articles',
    data: () => ({
      loading: true,
      articles: []
    }),
    async mounted() {
      this.articles = await this.$store.dispatch('fetchArticles')
      this.loading = false
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
