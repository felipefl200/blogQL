<template>
  <div class="container mx-auto px-4 w-full md:w-3/4 lg:3/5 xl:1/2 my-20">
    <div v-if="$apollo.loading">Carregando...</div>
    <div v-else>
      <h2 class="text-4xl">
        <router-link
          :to="{ name: 'index' }"
          class="text-gray-600 hover:text-gray-900"
          >Todos os Posts
        </router-link>
        <span class="text-gray-600">/</span> {{ user.name }}
      </h2>
      <div v-if="$apollo.loading">Loading...</div>
      <div v-else>
        <PostListItem
          v-for="post in user.posts"
          :key="post.id"
          :post="post"
          class="mt-10 bg-gray-50 rounded p-4 shadow"
        />
      </div>
    </div>
  </div>
</template>
<script>
import gql from 'graphql-tag'
import PostListItem from './PostListItem.vue'
export default {
  components: {
    PostListItem,
  },
  apollo: {
    user: {
      query: gql`
        query($id: ID!) {
          user(id: $id) {
            id
            name
            posts {
              id
              title
              lead
              created_at
              author {
                id
                name
              }
              topic {
                name
                slug
              }
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
}
</script>
