<template>
  <div class="container mx-auto px-4 w-full md:w-3/4 lg:3/5 xl:1/2 my-20">
    <h2 class="text-4xl">Todos os posts</h2>
    <div v-if="$apollo.loading">Loading...</div>
    <div v-else>
      <PostListItem
        v-for="post in posts"
        :key="post.id"
        :post="post"
        class="mt-10 bg-gray-50 rounded p-4 shadow"
      />
    </div>
  </div>
</template>
<script>
import gql from "graphql-tag";
import PostListItem from "./PostListItem.vue";
export default {
  components: {
    PostListItem,
  },
  apollo: {
    posts: gql`
      {
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
    `,
  },
};
</script>
