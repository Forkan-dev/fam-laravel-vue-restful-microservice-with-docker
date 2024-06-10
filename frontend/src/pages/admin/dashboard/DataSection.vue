<template>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
    <DataSectionItem
      v-for="(metric,index) in dashboardMetrics"
      :key="metric.id"
      :title="metric.title"
      :value="metric.value"
      :change-text="metric.changeText"
      :up="metric.changeDirection === 'up'"
      :icon-background="iconMapping[index].iconBackground"
      :icon-color="iconMapping[index].iconColor"
    >
      <template #icon>
        <VaIcon :name="metric.icon" size="large" />
      </template>
    </DataSectionItem>
  </div>
</template>

<script lang="ts" setup>
import {computed, onMounted, ref} from 'vue'
import { useColors } from 'vuestic-ui'
import DataSectionItem from './DataSectionItem.vue'
import axios from 'axios'

interface DashboardMetric {
  id: string
  title: string
  value: string
  icon: string
  changeText: string
  changeDirection: 'up' | 'down'
  iconBackground: string
  iconColor: string
}

const { getColor } = useColors()

const iconMapping = {
  openInvoices: {
    icon: '💰',
    iconColor: 'green',
    iconBackground: 'lightgreen',
  },
  ongoingProjects: {
    icon: '📂',
    iconColor: 'blue',
    iconBackground: 'lightblue',
  },
  employees: {
    icon: '👥',
    iconColor: 'red',
    iconBackground: 'lightcoral',
  },
  newProfit: {
    icon: '📈',
    iconColor: 'orange',
    iconBackground: 'lightyellow',
  },
}

const formattedData = ref();

let dashboardMetrics = ref(null);
fetch('http://localhost:8000/api/users')
  .then(response => response.json())
  .then(function (data) {
    dashboardMetrics.value = data
    console.log(dashboardMetrics.value)
  })
</script>
