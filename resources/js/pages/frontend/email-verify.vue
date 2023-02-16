<script>
import axios from 'axios';
export default {
    data() {
        return {
            token: this.$route.params.token,
            success: "",
            error: "",
        }
    },
    async created() {
        try {
            this.error = "Please wait..";
            await axios.post('/api/verifyMail', {
                token: this.$route.params.token,
            }).then(response => {
                this.error = "";
                this.success = response.data.message;
            })
        } catch (dataerror) {
            this.success = "";
            this.error = dataerror.response.data.message;
        }
    }
}
</script>
<style>
.login-box .site-btn {
    width: 100%;
}

.login-box h1 {
    font-size: 24px;
    position: relative;
    padding-bottom: 10px;
    margin-bottom: 30px;
}

.login-box h1:after {
    content: "";
    position: absolute;
    width: 50px;
    height: 5px;
    bottom: 0;
    left: 0;
    background: var(--color-primary);
}
</style>
<template>
    <div>
        <Loading v-if="isLoading" />
        <div class="login-wrapper">
            <!-- Main Content Starts -->
            <section class="box-plr-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="breadcrumb-wrapper">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><router-link to="/">Home</router-link></li>
                                        <li class="breadcrumb-item active" aria-current="page">Email Verify</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="pb-50">
                <div class="container-fluid h-custom">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-md-8 col-lg-6 col-xl-4 login-box">
                            <span class="alert-danger" v-if="error">
                                <div class="alert alert-danger" role="alert">
                                    {{ error }}
                                </div>
                            </span>
                            <span class="alert-danger" v-if="success">
                                <div class="alert alert-success" role="alert">
                                    {{ success }}
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main Content Ends -->
        </div>
    </div>
</template>