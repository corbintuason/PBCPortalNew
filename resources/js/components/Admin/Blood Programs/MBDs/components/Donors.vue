<template>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group float-right" role="group">
        </div>
      </div>
    </div>
    <div class="row">
      
      <div class="col-md-12">
      <donors-table :seeDonorProgress="seeDonorProgress" :shouldSelect='false' :mbd="mbd" :donors="donors"> </donors-table>
        <button @click="showAddDonor" class="float-right btn btn-success">Add Donation</button>
      </div>
    </div>
    <!-- <donor-modal 
      :donor="modal_donor"
    ></donor-modal> -->
    <add-donation :mbd="mbd"> </add-donation>
  </div>
</template>

<script>
import donorModal from "C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/DonorModal.vue";
import addDonation from "C:/xampp/htdocs/PBCPortal/resources/js/components/Reusables/AddDonation.vue";
import donorsTable from 'C:/xampp/htdocs/PBCPortal/resources/js/components/reusables/Donors/DonorsTable.vue';

export default {
  data() {
    return {
        modal_donor :{

        },
        donors:[],
       
        // modal_donations:[]
    };
  },
  components: {
    "donor-modal": donorModal,
    "add-donation": addDonation,
    "donors-table": donorsTable
  },
  props: {
    all_dates: Array,
    mbd: Object,
    seeDonorProgress: Boolean
  },
  methods: {
      showAddDonor(){
      this.$bvModal.show('add-donation');
    },
      showDonorModal(donor){
      this.modal_donor = donor;
      this.$bvModal.show('donor-modal');
    },
    loadDonors(){
      this.mbd.donation_list.forEach((val, index)=>{
        this.donors.push(val.donation.donor);
      })
    }
  },
  created() {
    this.loadDonors();
  }
};
</script>