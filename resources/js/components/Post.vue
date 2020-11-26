<template>
  <div class="container mx-auto px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2 mt-20">
    <div v-if="$apollo.loading">Loading...</div>
    <div v-else>
      <h1 class="text-5xl mt-10 font-bold mb-5">{{ post.title }}</h1>
      <div class="text-sm text-gray-600">
        By <router-link :to="{name: 'author', params: {id: post.author.id}}" class="text-blue-900">{{ post.author.name }}</router-link> 😎 em
        <router-link
          :to="{ name: 'topic', params: { slug: post.topic.slug } }"
          class="text-blue-900"
          >{{ post.topic.name }}</router-link
        >
        - {{ post.created_at | formatTimeAgo }}
      </div>
      <p class="text-gray-700 pb-3 mb-12 whitespace-pre-line">
        {{ post.content }}
      </p>
      <div class="mb-24 flex">
        <div class="mr-6">
          <img
            src="https://i.pravatar.cc/100"
            :alt="post.author.name"
            class="w-16 h-16 rounded-full"
          />
        </div>
        <div class="flex flex-col justify-center">
          <div class="text-xl text-gray-600">
            Escrito por
            <span class="text-gray-700 font-semibold">{{
              post.author.name
            }}</span>
          </div>
          <div class="text-gray-600">Publicado em {{ post.created_at }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { format, formatRelative, parseISO } from 'date-fns'
import pt from 'date-fns/locale/pt-BR'
import gql from 'graphql-tag'
export default {
  apollo: {
    post: {
      query: gql`
        query($id: ID!) {
          post(id: $id) {
            id
            title
            content
            created_at
            author {
              id
              name
              avatar
            }
            topic {
              name
              slug
            }
          }
        }
      `,
      variables() {
        return {
          id: this.$route.params.id,
        }
      },
    },
  },
  filters: {
    formatTimeAgo(value) {
      let dateISO = parseISO(value)
      return formatRelative(dateISO, new Date(), { locale: pt })
    },
    formatExtend(value) {
      let dateISO = parseISO(value)
    },
  },
}
</script>

<style></style>
