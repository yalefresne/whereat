<template>
  <div class="search-wrapper">
    <AdvancedSearch
        v-model="model"
        :options="restaurants"
        @select="handleSearch"
    >
    </AdvancedSearch>


    <Details v-if="selected[0]" :data="selected[0]"/>
  </div>
</template>

<script>
import AdvancedSearch from 'vue-advanced-search'
import Details from "Components/details";

export default {
  components: {Details, AdvancedSearch},
  data() {
    return {
      search: '',
      model: '',
      restaurants: [
        {label: 'quick', value: 'quick', description: 'test', logo: 'https://res.cloudinary.com/jobetudiant/image/fetch/f_auto/https://s3-eu-west-1.amazonaws.com/store.jobetudiant.net/images/files/000/000/544/original/quick.gif?1503362855', locate: 'paris'},
        {label: 'burger king', value: 'burger king', description: 'test', logo: '', locate: 'paris'},
        {label: 'mac Donald\'s', value: 'mac donalds', description: 'test', logo: '', locate: 'paris'},
        {label: 'kfc', value: 'KFC', description: 'test', logo: '', locate: 'paris'},
        {label: 'kiwi', value: 'KIWI', description: 'test', logo: '', locate: 'paris'},
      ],
      selected: []
    }
  },
  methods: {
    handleSearch: function (val) {
      this.search = val
      this.selected = this.restaurants.filter(r => r.value === this.search)
    }
  }
}
</script>
<style src="vue-advanced-search/dist/AdvancedSearch.css"></style>