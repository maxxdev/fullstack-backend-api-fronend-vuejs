<template>
  <div class="items">
    <h1>Items ({{ computedItems.length }})</h1>
    <hr>
    <div class="filter">
      <form>
        <div class="filter_item">
          <label for="filter__title">Search</label>:<input type="text" id="filter__title" v-model="filter.title">
          |
          <label for="bid_57">Brand ID: 57<input type="checkbox" v-model="filter.bids" id="bid_57" value="57"> </label>
          <label for="bid_125">Brand ID: 125<input type="checkbox" v-model="filter.bids" id="bid_125" value="125">
          </label>
          |
          <label for="category_id_445">Category ID: 445<input type="checkbox" v-model="filter.cids"
                                                              value="445"
                                                              id="category_id_445">
          </label>
        </div>
      </form>
      <div>
        <pre>{{ filter }}</pre>
      </div>
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
      bids: [],
      cids: [],
      category: {
        name: null
      },
      title: null,
      content: null
    }
  }),
  computed: {
    computedItems() {
      const bids = this.filter.bids
      const cids = this.filter.cids
      const filterKey = this.filter.title
      const itemsData = this.$store.getters["items/items"]
      let items = itemsData ? itemsData.items : []
      if (bids.length > 0) {
        items = this.filterByBrandIds(bids, items)
      }
      if (cids.length > 0) {
        items = this.filterByCatIds(cids, items)
      }
      if (filterKey) {
        items = this.filterData(filterKey, items)
      }
      return items
    }
  },
  async mounted() {
    this.loading = true
    await this.$store.dispatch('items/fetchItems')
    this.loading = false
  },
  methods: {
    filterByBrandIds(ids, items) {
      if (ids.length > 0) {
        this.loading = true
        items = items.filter(el => ids.includes(String(el.brand_id)))
        setTimeout(() => {
          this.loading = false
        }, 500)
      }
      return items
    },
    filterByCatIds(ids, items) {
      if (ids.length > 0) {
        this.loading = true
        items = items.filter(el => ids.includes(String(el.category_id)))
        setTimeout(() => {
          this.loading = false
        }, 500)
      }
      return items
    },
    filterData(filterKey, items) {
      if (filterKey) {
        this.loading = true
        items = items.filter(function (row) {
          return Object.keys(row).some(function (key) {
            return (
                String(row[key])
                    .toLowerCase()
                    .indexOf(filterKey) > -1
            )
          })
        })
        setTimeout(() => {
          this.loading = false
        }, 500)
      }
      return items
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
