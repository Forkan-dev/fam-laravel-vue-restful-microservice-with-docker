<template>
  <v-container
    class="bg-white mb-6"
  >
    <v-card>
      <v-card-subtitle>
        <span class="text-h5">Category</span>
      </v-card-subtitle>
      <va-card-content>
        <v-sheet class="mx-auto" width="300">
          <v-form  @submit.prevent="submit">
            <v-text-field
              v-model="firstName.value.value"
              label="First name"
              :error-messages="firstName.errorMessage.value"
            ></v-text-field>

            <v-btn
              class="me-4"
              type="submit"
            >
              submit
            </v-btn>
          </v-form>
        </v-sheet>
      </va-card-content>

    </v-card>

  </v-container>

</template>

<script setup>
import { ref } from 'vue'
import { useField, useForm } from 'vee-validate'

const { handleSubmit, handleReset } = useForm({
  validationSchema: {
    firstName (value) {
      if (value?.length >= 2) return true

      return 'Name needs to be at least 2 characters.'
    },
  },
})

const firstName = useField('firstName')

const submit = handleSubmit(values => {
//   call api
  fetch('http://localhost:8000/api/users')
    .then(response => response.json())
    .then(function (data) {
      console.log(data);
    })
})

</script>
