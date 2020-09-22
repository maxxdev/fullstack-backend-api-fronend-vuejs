<template>
  <div class="items">
    <h1>Items</h1>
    <hr>
    <div class="filter">
      <form @submit.prevent="submitHandler">
        <div class="filter_item">
          <label for="filter__category">Category</label>:
          <input type="text" id="filter__category"
                 v-model="filter.category.name">
        </div>
        <div class="filter_item">
          <label for="filter__title">Title</label>:<input type="text" id="filter__title" v-model="filter.title">
        </div>
        <div class="filter_item">
          <label for="filter__content">Content</label>:<input type="text" id="filter__content" v-model="filter.content">
        </div>
        <div class="filter_item">
          <button type="submit">Search</button>
        </div>
      </form>
    </div>
    <hr>
    <div v-if="loading">Loading...</div>
    <div v-else>
      <div v-for="item in computedItems" :key="item.cat_number">
        <pre>{{ item }}</pre>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: 'Items',
  data: () => ({
    loading: true,
    items: [],
    filter: {
      category: {
        name: null
      },
      title: null,
      content: null
    }
  }),
  computed: {
    computedItems() {
      return this.$store.getters.items.items
    }
  },
  async mounted() {
    await this.$store.dispatch('fetchItems')
    this.loading = false
  },
  methods: {
    async submitHandler() {
      const filter = {...this.filter}
      this.loading = true
      this.items = await this.$store.dispatch('filterItems', filter)
      this.loading = false
    }
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
