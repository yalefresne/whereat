<template>
  <div class="details">
    <img :src="data.logo" :alt="data.label" width="120px">
    <p>
      <span class="title">Description </span> : {{ data.description }}
    </p>
    <p>
      <small><span class="title">Localisation : </span>{{ data.locate }}</small>
    </p>
  </div>
</template>

<script>
export default {
  name: "details",
  props: ['data']
}
</script>

<style lang="css">
.details {
  margin-top: 50px;
}

.title {
  font-weight: bold;
}
</style>