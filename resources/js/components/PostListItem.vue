<template>
  <div>
    <router-link :to="{ name: 'post', params: { id: post.id } }">
      <h4 class="text-2xl pb-3 font-semibold hover:text-gray-500 transition duration-500 ease-in-out">{{ post.title }}</h4>
    </router-link>
    <p class="text-gray-600 pb-3">{{ post.lead }}</p>
    <div class="text-sm text-gray-600">
      by Felipe França 😎 &nbsp; - 50 min atras
    </div>
  </div>
</template>

<script>
export default {
  props: {
    post: Object,
  },
};
</script>

<style>
</style>
