<template>
  <div class="container mx-auto px-4 w-full md:w-3/4 lg:w-3/5 xl:w-1/2 mt-20">
    <div v-if="$apollo.loading">Loading...</div>
    <div v-else>
      <h1 class="text-5xl mt-10 font-bold mb-5">{{post.title}}</h1>
      <div class="text-sm text-gray-600">
        By {{post.author.name}} 😎 em {{post.topic.name}} - 3 horas atrás
      </div>
      <p class="text-gray-700 pb-3 mb-12 whitespace-pre-line">
        {{post.content}}
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
            <span class="text-gray-700 font-semibold">{{post.author.name}}</span>
          </div>
          <div class="text-gray-600">Publicado em 24 de novembro de 2020</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import gql from "graphql-tag";
export default {
  apollo: {
    post: {
      query: gql`
        query($id: ID!) {
          post(id: $id) {
            id
            title
            content
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
        };
      },
    },
  },
};
</script>

<style>
</style>
