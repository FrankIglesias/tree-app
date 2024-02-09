<template>
  <div class="card" v-if="props.lastUser">
    <img :src="props.lastUser.profile_picture" alt="profile picture" class="user-picture" />
    <div>
      <p class="user-name">{{ props.lastUser.name }}</p>
      <p class="user-registered-at">Registered at: {{ props.lastUser.registered_at }}</p>
    </div>
  </div>
</template>
<script setup lang="ts">
import { defineProps } from "vue";

const props = defineProps<{
  lastUser: {
    name: string;
    profile_picture: string;
    registered_at: string;
  } | null;
}>();
</script>
<style lang="scss" scoped>
.card {
  display: flex;
  align-items: center;
  padding: 2rem;
  background-color: darken(#242424, 5%);
  border-radius: 5px;
  text-align: left;
  margin-top: 1rem;

  .user-picture {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-right: 1rem;
  }

  .user-name {
    font-size: 2rem;
    font-weight: bold;
    margin: 0 0;
  }

  .user-registered-at {
    font-size: 0.8rem;
    margin-top: 0;
  }
}
</style>
