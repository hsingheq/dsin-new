<script>
import { ref } from 'vue';
import axios from 'axios';
import { Form, Field } from 'vee-validate';
import * as Yup from 'yup';
import "intl-tel-input/build/css/intlTelInput.css";
import intlTelInput from "intl-tel-input";
export default {
    components: {
        Form,
        Field,
    },
    data() {
        const form = {
            registration_type: "individual",
            first_name: "",
            last_name: "",
            address: "",
            mobile: "",
            occupation: "",
            acceptance: "",            
        }
        const schema = Yup.object().shape({
            first_name: Yup.string().required('First name is required.'),
            registration_type: Yup.string().required('Please select regsitration type.'),
            nric_no: Yup.string().required('NRIC No. is required.'),
            address: Yup.string().required('Address is required.'),
            mobile: Yup.string().required('Mobile is required.'),
            occupation: Yup.string().required('Occupation is required.'),
            acceptance: Yup.string().required('Accept Ts & Cs is required')
        });
        return {
            schema,
            form
        }
    },
    mounted() {
        const input = document.querySelector("#mobile");
        intlTelInput(input, {
            // any initialisation options go here
            preferredCountries: ["my", "us", "ca"],
        });
    },
    methods: {
        handleDealerRegistration(values) {
            // display form values on success
            alert('SUCCESS!! :-)\n\n' + JSON.stringify(values, null, 4));
        }
    },
}
</script>
<style scoped>
.form-group.required .control-label:after {
    content: "*";
    color: red;
}
</style>
<template>
    <section class="box-plr-75">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb-wrapper">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><router-link :to="{ name: '/' }">Home</router-link></li>
                                <li class="breadcrumb-item active" aria-current="page">Dealer Registration</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dealer Registration Form Starts-->
    <section class="pb-50">
        <div class="container">
            <div class="row">
                <!-- Left Box Ends -->
                <div class="col-md-8 col-lg-8 col-xl-8 offset-md-2">
                    <div class="page-heading">
                        <h4>Dealer Registration Form</h4>
                    </div>
                    <!-- Change password form starts -->
                    <Form @submit.prevent="handleDealerRegistration" :validation-schema="schema" v-slot="{ errors }">
                        <!-- Email input -->
                        <!--<div class="form-outline my-4 row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" readonly v-model="form.email" id="email" name="email"
                                    class="form-control" />
                            </div>
                        </div>-->
                        <!-- Registration Type -->
                        <div class="form-outline row my-4 mb-3">
                            <div class="col-md-12 form-group required">
                                <label class="form-label row control-label" for="">Registration Type</label>
                                <div class="form-check form-check-inline">
                                    <Field class="form-check-input" :class="{ 'is-invalid': errors.registration_type }"
                                        type="radio" v-model="form.registration_type" @change="change"
                                        id="registration_type_individual" name="registration_type" value="individual"
                                        checked />
                                    <label class="form-check-label"
                                        for="registration_type_individual">Individual</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <Field class="form-check-input" type="radio" v-model="form.registration_type"
                                        @change="change" id="registration_type_company" name="registration_type"
                                        value="company" />
                                    <label class="form-check-label" for="registration_type_company">Company</label>
                                </div>
                                <div class="invalid-feedback">{{ errors.registration_type }}</div>
                            </div>
                        </div>
                        <!-- Personal Information Starts-->
                        <div id="personal-information-box" v-if="form.registration_type === 'individual'">
                            <div class="form-outline row my-4 mb-0">
                                <div class="col-md-12">
                                    <h5>Personal Information</h5>
                                    <hr>
                                </div>
                            </div>
                            <!-- Name input -->
                            <div class="form-outline mb-3 row">
                                <div class="col-md-6 form-group required">
                                    <label class="form-label control-label" for="first_name">First Name</label>
                                    <Field type="text" id="first_name" name="first_name" v-model="form.first_name"
                                        class="form-control" :class="{ 'is-invalid': errors.first_name }" />
                                    <div class="invalid-feedback">{{ errors.first_name }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" v-model="form.last_name"
                                        class="form-control" placeholder="" />
                                </div>
                            </div>
                            <!-- Gender -->
                            <!---<div class="form-outline row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label row" for="">Gender</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-male"
                                            value="male">
                                        <label class="form-check-label" for="gender-male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender-female"
                                            value="female">
                                        <label class="form-check-label" for="gender-female">Female</label>
                                    </div>
                                </div>
                            </div>-->
                            <!-- NRIC -->
                            <div class="form-outline row mb-3">
                                <div class="col-md-12 form-group required">
                                    <label class="form-label control-label" for="nric_no">NRIC No</label>
                                    <Field type="text" v-model="form.nric_no" id="nric_no" name="nric_no"
                                        class="form-control" :class="{ 'is-invalid': errors.nric_no }" />
                                    <div class="invalid-feedback">{{ errors.nric_no }}</div>
                                </div>
                            </div>
                            <!-- Profile Picture input -->
                            <!--<div class="form-outline row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label" for="profile_pic">NRIC Front Picture</label>
                                    <input type="file" id="nric_front" name="nric_front" class="form-control" />
                                </div>
                            </div>
                            <div class="form-outline row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label" for="profile_pic">NRIC Back Picture</label>
                                    <input type="file" id="nric_back" name="nric_back" class="form-control" />
                                </div>
                            </div>-->
                        </div>
                        <!-- Personal Information Ends-->
                        <!-- Company Information Starts-->
                        <div id="company-information-box" v-else>
                            <div class="form-outline row my-4 mb-0">
                                <div class="col-md-12">
                                    <h5>Company Information</h5>
                                    <hr>
                                </div>
                            </div>
                            <!-- Company Name -->
                            <div class="form-outline row mb-3">
                                <div class="col-md-12 form-group required">
                                    <label class="form-label control-label" for="company_name">Company Name</label>
                                    <input type="text" v-model="form.company_name" id="company_name" name="company_name"
                                        class="form-control" />
                                </div>
                            </div>
                            <!-- Company Registration No -->
                            <div class="form-outline row mb-3">
                                <div class="col-md-12 form-group required">
                                    <label class="form-label control-label" for="company_registration_no">Company
                                        Registration
                                        No</label>
                                    <input type="text" v-model="form.company_registration_no"
                                        id="company_registration_no" name="company_registration_no"
                                        class="form-control" />
                                </div>
                            </div>
                            <!-- Company SSM Certificate of Incorporation -->
                            <!-- 
                            <div class="form-outline row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label" for="company_ssm_certificate">Please upload company SSM
                                        Certificate of Incorporation</label>
                                    <input type="file" id="company_ssm_certificate" name="company_ssm_certificate"
                                        class="form-control" />
                                </div>
                            </div>-->
                        </div>
                        <!-- Address -->
                        <div class="form-outline row mb-3">
                            <div class="col-md-12 form-group required">
                                <label class="form-label control-label" for="address"
                                    v-if="form.registration_type === 'individual'">Mailing Address</label>
                                <label class="form-label control-label" for="address" v-else>Company Correspondence
                                    Address</label>
                                <Field as="textarea" v-model="form.address" id="address" name="address"
                                    class="form-control" :class="{ 'is-invalid': errors.address }"></Field>
                                <div class="invalid-feedback">{{ errors.address }}</div>
                            </div>
                        </div>
                        <!-- Mobile -->
                        <div class="form-outline row mb-3">
                            <div class="col-md-12 form-group required">
                                <label class="form-label control-label" for="mobile"
                                    v-if="form.registration_type === 'individual'">Mobile</label>
                                <label class="form-label control-label" for="mobile" v-else>Company Telephone</label>
                                <Field type="text" v-model="form.mobile" id="mobile" name="mobile" class="form-control"
                                    :class="{ 'is-invalid': errors.mobile }" />
                                <div class="invalid-feedback">{{ errors.mobile }}</div>
                            </div>
                        </div>
                        <!-- Occupation -->
                        <div class="form-outline row mb-3">
                            <div class="col-md-12 form-group required">
                                <label class="form-label control-label" for="occupation">Occupation</label>
                                <Field type="text" v-model="form.occupation" id="occupation" name="occupation"
                                    class="form-control" :class="{ 'is-invalid': errors.occupation }" />
                                <div class="invalid-feedback">{{ errors.occupation }}</div>
                            </div>
                        </div>
                        <!-- Company Information Ends-->
                        <!-- Appointment Starts -->
                        <!--
                        <div class="form-outline row my-4 mb-0">
                            <div class="col-md-12">
                                <h5>APPOINTMENT</h5>
                                <hr>
                                <p>Please let us know when it's the best time we can arrange our sales team to meet you
                                </p>
                            </div>
                        </div>
                        <div class="form-outline row mb-3">
                            <div class="col-md-12">
                                <label class="form-label row mb-1" for="company_ssm_certificate">First Preferred
                                    Date/Time</label>
                                <div class="form-check-inline">
                                    <input type="date" id="company_ssm_certificate" name="company_ssm_certificate"
                                        class="form-control" />
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="time" id="company_ssm_certificate" name="company_ssm_certificate"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-outline row mb-3">
                            <div class="col-md-12">
                                <label class="form-label row mb-1" for="company_ssm_certificate">Second Preferred
                                    Date/Time</label>
                                <div class="form-check-inline">
                                    <input type="date" id="company_ssm_certificate" name="company_ssm_certificate"
                                        class="form-control" />
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="time" id="company_ssm_certificate" name="company_ssm_certificate"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>-->
                        <!-- Appointment Ends -->
                        <!-- Declaration Starts -->
                        <div class="form-outline row my-4 mb-0">
                            <div class="col-md-12 form-group required">
                                <h5 class="control-label">DECLARATION & NOTES</h5>
                                <hr>
                            </div>
                        </div>
                        <div class="form-outline row mb-3">
                            <div class="col-md-12">
                                <label class="form-label row mb-1" for="company_ssm_certificate">Notes /
                                    Comments:</label>
                                <p>Please feel free to leave us a note / comment in regards to this registration
                                    application</p>
                                <textarea id="notes" name="notes" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-outline row mb-3">
                            <div class="col-md-12">
                                <label class="form-label row mb-1" for="company_ssm_certificate">
                                    We / I hereby declare that the details furnished above are true and correct to the
                                    best of my / our knowledge and belief and we/ I undertake to inform DSASB of any
                                    changes therein, immediately. In case any of the above information is found to be
                                    false or untrue or misleading or misrepresenting, we/ I am aware that we/ I may be
                                    held liable for it.
                                </label>
                                <div class="form-check form-check-inline">
                                    <Field class="form-check-input" type="checkbox" name="acceptance" id="acceptance"
                                        value="yes" :class="{ 'is-invalid': errors.occupation }" />
                                    <label class="form-check-label" for="acceptance">Yes, and proceed to submit</label>
                                    <div class="invalid-feedback">{{ errors.acceptance }}</div>
                                </div>
                            </div>
                        </div>
                        <!-- Declaration Ends -->
                        <div class="text-lg-start mt-4 pt-2 row">
                            <div class="col-md-12">
                                <button type="submit" class="site-btn">Submit</button>
                            </div>
                        </div>
                    </Form>
                    <!-- Change password form ends -->
                </div>
            </div>
        </div>
    </section>
    <!-- Dealer Registration Form Ends-->
</template>