<template>
  <div>
    <router-link :to="{ name: 'post', params: { id: post.id } }">
      <h4
        class="text-2xl pb-3 font-semibold hover:text-gray-500 transition duration-500 ease-in-out"
      >
        {{ post.title }}
      </h4>
    </router-link>
    <p class="text-gray-600 pb-3">{{ post.lead }}</p>
    <div class="text-sm text-gray-600">
      by
      <router-link
        :to="{ name: 'author', params: { id: post.author.id } }"
        class="text-blue-900 hover:text-blue-700 transition ease-in duration-300"
      >
        {{ post.author.name }}
      </router-link>
      😎 em
      <router-link
        :to="{ name: 'topic', params: { slug: post.topic.slug } }"
        class="text-blue-900 hover:text-blue-700 transition ease-in duration-300"
      >
        {{ post.topic.name }}
      </router-link>
      - {{ post.created_at | formatTime }}
    </div>
  </div>
</template>

<script>
import { formatRelative, parseISO } from "date-fns"
import pt from "date-fns/locale/pt-BR"
export default {
  props: {
    post: Object,
  },
  filters: {
    formatTime(value) {
      let dateISO = parseISO(value)
      return formatRelative(dateISO, new Date(), { locale: pt })
    },
  },
};
</script>
<style>
</style>
