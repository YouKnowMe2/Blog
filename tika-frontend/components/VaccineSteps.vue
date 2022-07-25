<template>
  <div class=" mx-auto text-center">

    <h2 class="text-4xl font-bold">Register For Vaccine</h2>
    <p class="text-lg my-10">You will just need your NID card. Phone Number and fill up some info</p>

    <!--Box 01 -->
    <div class="flex -mx-6  my-14">
      <!--Item 01 -->
      <div class="flex-1 px-6">
        <div class="h-32 flex justify-center items-center">
          <img class="mx-auto" src="~/static/img/promo-1.svg" alt="">
        </div>

        <div class="border-2 w-5 h-5 rounded-full border-green-600 mx-auto mb-4 mt-16 tika-step relative"></div>
        <p class="font-bold text-lg">NID</p>
      </div>
      <!--Item 02 -->
      <div class="flex-1 px-6">
        <div class="h-32 flex justify-center items-center">
          <img class="mx-auto" v-if="theme=='homepage' || theme=='step_2' || theme=='step_4' " src="~/static/img/promo-2.svg" alt="">
          <img class="mx-auto" v-if="theme=='step_1' || theme== 'step_3'  " src="~/static/img/promo-2-disabled.svg" alt="">
        </div>

        <div v-bind:class="theme=='homepage' || theme=='step_2' || theme=='step_4'? 'border-orange-600 ' : 'border-gray-600' " class="border-2 w-5 h-5 rounded-full mx-auto mb-4 mt-16 tika-step relative"></div>
        <p class="font-bold text-lg">Phone</p>
      </div>

      <!--Item 03 -->
      <div class="flex-1 px-6">
        <div class="h-32 flex justify-center items-center">
          <img  v-if="theme=='homepage' || theme=='step_3' || theme=='step_4' " class="mx-auto" src="~/static/img/promo-3.svg" alt="">
          <img  v-if="theme=='step_2' || theme=='step_1' " class="mx-auto" src="~/static/img/promo-3-disabled.svg" alt="">
        </div>

        <div v-bind:class="theme=='homepage' || theme=='step_3' || theme=='step_4' ? 'border-blue-600 ' : 'border-gray-600' " class="border-2 w-5 h-5 rounded-full mx-auto mb-4 mt-16 tika-step relative"></div>
        <p class="font-bold text-lg">Information</p>
      </div>

    </div>

  </div>
</template>

<script>
export default {
  name: "VaccineSteps",
  props: ["theme"]
}
</script>

<style scoped>

</style>
