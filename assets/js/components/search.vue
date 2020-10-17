<template>
  <div class="search-wrapper">
    <label for="search-input">
      <input ref="search-input" id="search-input" type="text" v-model="search">
      <button type="submit" class="btn" @click.prevent="handleSearch">search</button>
    </label>

    <span>
      <small>
        {{search}}
      </small>
    </span>
  </div>
</template>

<script>
export default {
  data() {
    return {
      search: '',
    }
  },
  methods: {
    handleSearch: () => {
      //...
    }
  }
}
</script>
