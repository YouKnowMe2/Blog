<template>
<div>
  <div class="primary-bg">
    <div class="container mx-auto pt-20 pb-10 ">
      <div class="bg-white ">
        <div class="flex items-center justify-center">
          <div class="min-w max">
            <!-- logo -->
            <h2 class="text-2xl font-bold text-black uppercase px-6">Tika  </h2>
          </div>
          <!-- Menu -->
          <div class="w-full">
            <ul class="flex justify-center">
              <li><nuxt-link class="menu-item" to="/">Home</nuxt-link></li>
              <li><nuxt-link class="menu-item" to="/verify">Verify</nuxt-link></li>
              <li><nuxt-link class="menu-item" to="/tikacard">Tika Card</nuxt-link></li>
              <li><nuxt-link class="menu-item" to="/registration">Registration</nuxt-link></li>
              <li><nuxt-link class="menu-item" to="/faqs">FAQs</nuxt-link></li>
              <li><nuxt-link class="menu-item" to="/help">Help</nuxt-link></li>
            </ul>
          </div>

          <!-- Registration -->
          <div class="min-w-max">
              <div class="px-6">
                <nuxt-link to="/registration" class="primary-btn">Register Now</nuxt-link>
              </div>
          </div>

        </div>
      </div>

      <!-- Heading Text -->


    </div>
  </div>
</div>
</template>

<script>
export default {
  name: "Header"
}
</script>

<style scoped>

</style>
