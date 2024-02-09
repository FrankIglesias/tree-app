<template>
  <div>
    <h2 class="title">Registrations per hour</h2>
    <div class="chart-card">
      <ag-charts-vue :options="options"></ag-charts-vue>
    </div>
    <h2 class="title">Last registered user</h2>
    <LastUser :lastUser="lastUser"></LastUser>
  </div>
</template>
<script setup lang="ts">
import { AgChartsVue } from "ag-charts-vue3";
import { onMounted, ref } from "vue";
import LastUser from "./components/LastUser.vue";

const lastUser = ref<{
  name: string;
  profile_picture: string;
  registered_at: string;
} | null>(null);

const props = defineProps({
  data: {
    type: Object,
    required: true,
  },
});

const options = ref<
{
  data: { hour: number; registrations: number }[];
  series: { type: string; xKey: string; yKey: string }[];
  background: { fill: string };
  theme: string;
}>({
  data: [],
  series: [{ type: "line", xKey: "hour", yKey: "registrations" }],
  background: { fill: "transparent" },
  theme: 'ag-default-dark',
});

  onMounted(() => {
    lastUser.value = props.data.last_registered_user;
    options.value = {
      ...options.value,
      data: props.data.registrations_per_hour.map((hour: {
        [key: string]: number;
      }) => ({
        hour: parseInt(Object.keys(hour)[0]),
        registrations: Object.values(hour)[0],
      })),
    };
  });

</script>
<style lang="scss" scoped>
.title { 
  font-size: 3rem;
  text-transform: uppercase;
  letter-spacing: 3px;
  margin-bottom: 1rem;

  &:nth-of-type(2) {
    margin-top: 3rem;
  }
}

.chart-card {
  padding: 1rem;
  background-color: darken(#242424, 5%);
  border-radius: 5px;
  margin-top: 1rem;
}
</style>
