<template>
    <loading v-model:active="isLoading" :can-cancel="false" :on-cancel="onCancel" :is-full-page="fullPage" />
    <!-- Top Wallet Starts-->
    <div class="d-flex text-center mb-2">
        <div class="card">
            <div class="card-body">
                <div class="row d-block d-flex">
                    <div class="d-flex align-items-center">
                        <div class="rounded me-4">
                            <i class="bi bi-wallet" style="font-size: 24px;"></i>
                        </div>
                        <div class="">
                            <h4>Wallet Balance</h4>
                            <h3 class="fw-extrabold mb-1 text-success">RM {{ balance }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Wallet Ends-->
    <!-- Add Money Form Starts -->
    <div class="card mt-4">
        <div class="card-header">
            Add Money
        </div>
        <div class="card-body">
            <form @submit.prevent="makeTransaction">
                <input type="hidden" v-model="type" name="type" id="type">
                <div class="form-outline my-2 mb-4">
                    <label class="form-label" for="password">Enter Amount to be Added in wallet (RM)<span
                            class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="amount" v-model="v$.amount.$model"
                        :class="{ valid: !v$.amount.$error && v$.amount.$dirty, 'is-invalid': v$.amount.$error }" />
                    <div class="invalid-feedback" v-for="(error, index) in v$.amount.$errors" :key="index">
                        {{ error.$message }}
                    </div>
                </div>
                <div class="text-lg-start mt-4 pt-2">
                    <button type="submit" class="site-btn" :disabled="v$.$invalid">Add Money</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Add Money Form Ends -->
    <!-- Wallet history table starts -->
    <div class="card mt-4 table-card">
        <div class="card-header">
            Wallet Transactions
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <!--<th>Action</th>-->
                    </tr>
                </thead>
                <tbody v-if="history">
                    <tr v-for="transaction in history" :key="transaction.id">
                        <td>{{ transaction.id }}</td>
                        <td>RM {{ transaction.amount }}</td>
                        <td>{{ format_date(transaction.created_at) }}</td>
                        <td>
                            <span class="badge bg-success" v-if="transaction.confirmed">Confirmed</span>
                            <span class="badge bg-warning" v-else>Pending</span>
                        </td>
                        <!--<td>
                            <a href="" class="badge bg-primary">View</a>
                        </td>-->
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td colspan="5">No transaction history found.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Wallet history table Ends -->
    <!--<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <button class="btn btn-sm btn-primary" @click="newModal">Make Transaction</button>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>Balance: RM {{ this.balance }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewLabel">Add Balance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="makeTransaction()">
                        <input type="hidden" v-model="type" name="type" id="type">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Amount</label>
                                <input v-model="amount" type="number" name="amount" placeholder="Enter Amount"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>-->
</template>

<script>
import axios from 'axios';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import moment from 'moment'
import useVuelidate from "@vuelidate/core";
import { required, minValue, helpers, numeric } from "@vuelidate/validators";
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/css/index.css';
export default {
    name: 'userWallet',
    data() {
        return {
            balance: '',
            type: '1',
            amount: '10',
            errors: '',
            history: '',
            isLoading: false,
            fullPage: true
        }
    },
    components: {
        Loading,
    },
    validations() {
        const localRules = {
            amount: {
                required: helpers.withMessage("Amount is required.", required),
                numeric: helpers.withMessage("Amount should be numeric only.", numeric),
                minValue: helpers.withMessage("Minimum RM 10 is allowed.", minValue(10)),
            },
        }
        return localRules
    },
    setup: () => ({ v$: useVuelidate() }),
    methods: {
        async makeTransaction() {
            this.v$.$touch()
            if (this.v$.$invalid) {
                //this.submitStatus = 'Error'
                //this.message = "Please check above errors."
                //this.isLoading = false
            } else {
                this.loading = true
                await axios.post('api/transact', {
                    type: this.type,
                    amount: this.amount
                }, {
                    headers: {
                        Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                    },
                }).then(() => {
                    this.getBalance();
                    this.amount = 10
                    this.loading = false
                    //$('#addnew').modal('hide');
                    //Fire.$emit('entry');
                    toast("The money has been added to your wallet.", {
                        type: "success",
                        autoClose: 1500,
                    });
                }).catch(error => {
                    this.loading = false
                    alert(error.response.data.message)
                })
            }
        },
        newModal() {
            //this.form.reset();
            //$('#addnew').modal('show');
        },
        async getBalance() {
            await axios.get("/api/transact", {
                headers: {
                    Authorization: 'Bearer ' + sessionStorage.getItem('token'),
                }
            }).then(({ data }) => ([
                this.balance = data.balance,
                this.history = data.transactions
            ]
            ));
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format('MMM D, YYYY HH:mm:ss')
            }
        },
    },
    created() {
        this.getBalance();
    }
}
</script>