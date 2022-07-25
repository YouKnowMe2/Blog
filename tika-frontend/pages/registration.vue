<template>
  <div>
    <div class="primary-bg  text-white pb-10 text-lg">
      <div class="container mx-auto">
        <div class="text-6xl font-bold mb-6 text-center">Vaccine Registration</div>
        <p>Complete the registration by verifying your national identity card and mobile number in the form below. The place and date of delivery of the vaccine will be informed in due course through SMS message on the mobile phone.</p>

      </div>
    </div>
    <div class="py-20">
<div class="container small-container mx-auto">
  <VaccineSteps :theme="step"/>
  <div class="bg-white px-20 py-10 border border-gray-100">

    <!--Step 01 -->
    <div v-if="step == 'step_1'">
      <h3 class="font-bold text-4xl mb-4 text-center">Identity Verification</h3>

    <div v-if="peopleData.hasOwnProperty('success') && !peopleData.success" class="bg-red-400 text-black p-4 mb-6 text-center">
      {{peopleData.message }}
    </div >
    <p>
      <label class="tika-label" for="category_id">Select Category</label>
      <select v-model="verifyData.category_id" class="tika-input" id="category_id">
        <option selected='selected' value="">Select a Category</option>
        <option v-for="item in categories" :key="item.id" :value="item.id">{{item.name}}</option>
      </select>
    </p>
    <div v-if="verifyData.category_id" class="flex -mx-4 my-16">
      <div class="w-2/3 px-4">
        <p>
          <label for="id_no" class="tika-label"> National Identity No</label>
          <input id="id_no" v-model="verifyData.id_no" type="number" class="tika-input" placeholder="Type your National Id no">
        </p>
      </div>
      <div class="w-1/3 px-4">
        <p>
          <label for="dob" class="tika-label"> Date of Birth</label>
          <input id="dob" v-model="verifyData.dob" type="date" class="tika-input" placeholder="Type your National Id no">
        </p>
      </div>
    </div>

    <p><button @click.prevent="checkMyInfo" class="primary-btn">Check My information</button></p>

      </div>

    <!--End of Step 01 -->


    <!--Step 02 -->
    <div v-if="step == 'step_2'">
      <h3 class="font-bold text-4xl mb-4 text-center">User Information</h3>
      <p class="mb-6">
        <label class="tika-label" for="division_id">Select Division</label>
        <select @change.prevent="getAvaliableDistricts"v-model="division_id" class="tika-input" id="division_id">
          <option selected='selected' value="">Select a Division</option>
          <option v-for="item in divisions" :key="item.id" :value="item.id">{{item.name}}</option>
        </select>
      </p>

      <p v-if="districts.length" class="mb-6">
        <label  class="tika-label" for="district_id">Select District</label>
        <select @change.prevent ="getAvaliableUpzillas" v-model="district_id" class="tika-input" id="district_id">
          <option selected='selected' value="">Select a District</option>
          <option v-for="item in districts" :key="item.id" :value="item.id">{{item.name}}</option>
        </select>
      </p>

      <p v-if="upzillas.length" class="mb-6">
        <label  class="tika-label" for="district_id">Select Upzilla</label>
        <select @change.prevent="getAvaliableCenters" v-model="upzilla_id" class="tika-input" id="upzilla_id">
          <option selected='selected' value="">Select a Upzilla</option>
          <option v-for="item in upzillas" :key="item.id" :value="item.id">{{item.name}}</option>
        </select>
      </p>

      <p v-if="centers.length" class="mb-6">
        <label  class="tika-label" for="center_id">Select Vaccination Center</label>
        <select v-model="center_id" class="tika-input" id="center_id">
          <option selected='selected' value="">Select a Vaccination Cetner</option>
          <option v-for="item in centers" :key="item.id" :value="item.id">{{item.name}}</option>
        </select>
      </p>
      <p v-if="!centers.length && upzilla_id" >
        No avaliable Center
      </p>

      <div v-if="center_id">
        <p>
          <label for="name" class="tika-label">Name</label>
          <input id="name" v-model="name" type="text" class="tika-input" placeholder="Type your Name">
        </p>

        <p>
          <label for="diabates" class="tika-label">Diabates</label>
          <select v-model="diabates" class="tika-input" id="diabates">
            <option selected='selected' value="">Select a Value</option>
            <option value="0">Yes</option>
            <option value="1">No</option>
          </select>
        </p>
      </div>

      <p><button v-if="diabates == 1 && name" @click.prevent="goToStepThree" class="primary-btn">Proceed to Phone Verification</button></p>

    </div>

  <!--End of Step 02 -->


    <!--Start of Step 03 -->
    <div v-if="step== 'step_3'">
      <h3 class="font-bold text-4xl mb-4 text-center">Phone Verification</h3>
      <div  v-if="!smsSent">
        <p>
          <label for="phone_no" class="tika-label">Phone Number</label>
          <input id="phone_no" v-model="phone_no" type="text" class="tika-input" placeholder="Type your Phone No">
        </p>
        <p><button  @click.prevent="sendSms" class="primary-btn">Send Verification Code</button></p>
      </div>

      <div v-if="smsSent">
        <p >
          <label for="verify_code" class="tika-label">Verification Code</label>
          <input id="verify_code" v-model="verify_code" type="text" class="tika-input" placeholder="Enter your Verification Code">
        </p>


        <p><button  @click.prevent="verifyCode" class="primary-btn">Confirm Verification</button></p>
      </div>


    </div>
    <!--End of Step 03 -->


    <div v-if="step=='step_4'">
      <div class="flex">
        <h3 class="font-bold text-4xl  text-center flex-1">Your Regisration is Completed Successfully</h3>
      <nuxt-link to="/">
        <button class="primary-btn items-center mb-2 " >Go to home page</button>
      </nuxt-link>

    </div>


    </div>

  </div>
</div>
    </div>
  </div>
</template>

<script>
import VaccineSteps from "@/components/VaccineSteps";
export default {
  name: "registration",
  components: {VaccineSteps},
  data(){
    return{
      categories : [],
      divisions : [],
      districts : [],
      upzillas : [],
      centers : [],
      step: 'step_1',
      peopleData: [],
      verifyData: {
        category_id: '',
        id_no: '',
        dob: ''
      },
      district_id: '',
      division_id: '',
      upzilla_id: '',
      center_id: '',
      name: '',
      diabates: '',
      verify_code: '',
      phone_no: '',
      smsSent: false,
    }

  },
  mounted() {
  this.getAvaliableCategory();
  this.getAvaliableDivisions();
  },
  methods: {
    getAvaliableCategory(){
      this.$axios.get('http://localhost:8000/api/categories').then(res =>{
        this.categories = res.data;
      })
    },
    getAvaliableDistricts(){
      this.$axios.get('http://localhost:8000/api/districts?division_id='+this.division_id).then(res =>{
        this.districts = res.data;
      })
    },
    getAvaliableDivisions(){
      this.$axios.get('http://localhost:8000/api/divisions').then(res =>{
        this.divisions = res.data;
      })
    },
    getAvaliableUpzillas(){
      this.$axios.get('http://localhost:8000/api/upzillas?district_id='+this.district_id).then(res =>{
        this.upzillas = res.data;
      })
    },
    getAvaliableCenters(){
      this.$axios.get('http://localhost:8000/api/centers?upazila_id='+this.upzilla_id).then(res =>{
        this.centers = res.data;
      })
    },
    checkMyInfo(){
      this.$axios.post('http://localhost:8000/api/verify',this.verifyData).then(res =>{
        this.peopleData = res.data;
        if(res.data.success){
          this.step = 'step_2'
        }
      })
    },
    goToStepThree(){
        this.step = 'step_3'
    },
    sendSms(){

      this.$axios.post('http://127.0.0.1:8000/api/phone-verify',{
        phone: this.phone_no
      }).then(res =>{
       if(res.data == 'pending'){
         this.smsSent = true;
       }
      })
    },
    verifyCode(){
      this.$axios.post('http://127.0.0.1:8000/api/phone-verify-code',{
        phone: this.phone_no,
        verify_code: this.verify_code
      }).then(res =>{
        if(res.data == 'approved'){
          this.$axios.post('http://127.0.0.1:8000/api/registration',{
            name: this.name,
            dob: this.verifyData['dob'],
            phone_no: this.phone_no,
            center_id: this.center_id,
            id_no: this.verifyData['id_no'],

          }).then(res =>{
            this.step='step_4'
          })
        }
      })
    },

  }
}
</script>

<style scoped>

</style>
