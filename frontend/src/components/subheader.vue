<template>
  <div class="subheader">
    <ul>
      <li>
        <router-link to="/">home</router-link>
      </li>
      <li>
        <router-link to="/items">items</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Subheader',
  data: () => ({}),

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
ul {
  display: flex;
  justify-content: space-around;
  justify-items: center;
}

</style>
