<template>
    <div class="info-boxes row mt-40">
        <div class="col-lg-12">
            <div class="row align-items-center m-0">
                <div class="col-4 align-middle text-right">
                    <img src="@/asset/images/info-boxes/shipping.png" class="img-fluid">
                </div>
                <div class="col-8">
                    <h6 class="title medium font-16">Free Delivery</h6>
                    <h6 class="des regular font-14">For all order above RM 99</h6>
                </div>
            </div>
            <div class="row align-items-center m-0">
                <div class="col-4 align-middle text-right">
                    <img src="@/asset/images/info-boxes/currency_exchange.png" class="img-fluid">
                </div>
                <div class="col-8">
                    <h6 class="title medium font-16">30 Days Return</h6>
                    <h6 class="des regular font-14">If goods have Problems</h6>
                </div>
            </div>
            <div class="row align-items-center m-0">
                <div class="col-4 align-middle text-right">
                    <img src="@/asset/images/info-boxes/credit_card.png" class="img-fluid">
                </div>
                <div class="col-8">
                    <h6 class="title medium font-16">Secure Payment</h6>
                    <h6 class="des regular font-14">100% secure payment</h6>
                </div>
            </div>
            <div class="row align-items-center m-0">
                <div class="col-4 align-middle text-right">
                    <img src="@/asset/images/info-boxes/support.png" class="img-fluid">
                </div>
                <div class="col-8">
                    <h6 class="title font-16">24/7 Support</h6>
                    <h6 class="des font-14">Dedicated support</h6>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'infoBoxes',
    mounted() {
    }
}
</script>
<style scoped>
.info-boxes .row.align-items-center {
    border-bottom: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-left: 1px solid #ddd;
    padding-top: 20px;
    padding-bottom: 20px;
}

.info-boxes .row.align-items-center:first-child {
    border-top: 1px solid #ddd;
}
</style>