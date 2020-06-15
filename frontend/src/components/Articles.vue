<template>
  <div class="articles">
    <h1>Articles</h1>
    <hr>
    <div class="filter">
      <form action="">
        <div class="filter_item">
          <label for="filter__category">Category</label>:<input type="text" id="filter__category">
        </div>
        <div class="filter_item">
          <label for="filter__title">Title</label>:<input type="text" id="filter__title">
        </div>
        <div class="filter_item">
          <label for="filter__content">Content</label>:<input type="text" id="filter__content">
        </div>
        <div class="filter_item">
          <button type="submit">Search</button>
        </div>
      </form>
    </div>
    <hr>
    <div v-if="loading">Loading...</div>
    <div v-else>
      <pre>{{articles}}</pre>
    </div>
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
  .filter form {
    display: flex;
    justify-content: left;
    justify-items: left;
  }

  .filter form .filter_item {
    padding-left: 10px;

    & label {
      padding-right: 5px;
    }
  }
</style>
