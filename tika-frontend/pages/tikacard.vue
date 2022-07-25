<template>

  <div class="py-20">
    <div class="container small-container mx-auto">
      <div class="bg-white px-20 py-10 border border-gray-100">
    <div >
      <h3 class="font-bold text-4xl mb-4 text-center">Identity Verification</h3>


      <div class="flex -mx-4 my-16">
        <div class="w-2/3 px-4">
          <p>
            <label for="id_no" class="tika-label"> National Identity No</label>
            <input  v-model="verifyData.id_no" id="id_no" type="number" class="tika-input" placeholder="Type your National Id no">
          </p>
        </div>
        <div class="w-1/3 px-4">
          <p>
            <label for="dob" class="tika-label"> Date of Birth</label>
            <input  v-model="verifyData.dob" id="dob"  type="date" class="tika-input" placeholder="Type your National Id no">
          </p>
        </div>
      </div>

      <p><button @click.prevent="checkMyInfo" class="primary-btn">Generate My Card</button></p>
    </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "tikacard",
  data(){
    return{
      peopleData: [],
      verifyData: {
       id_no:'',
       dob: '',
     },
    }
  },
  methods:{
    checkMyInfo(){
      this.$axios.post('http://localhost:8000/api/verifyData',this.verifyData).then(res =>{
        console.log(res.data);
      })
    },
  }
}
</script>

<style scoped>

</style>
