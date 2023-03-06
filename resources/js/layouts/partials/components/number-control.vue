<template>
    <div class="control number">
        <button class="decrement-button" :disabled="decrementDisabled" @click="decrement">−</button>
        <input type="number" :disabled="inputDisabled" :min="min" :max="max" :product="product" :step="1"
            v-model.number="currentValue" @blur="currentValue = value" @keydown.esc="currentValue = value"
            @keydown.enter="currentValue = value" @keydown.up.prevent="increment" @keydown.down.prevent="decrement" />
        <button class="increment-button" :disabled="incrementDisabled" @click="increment">+</button>
    </div>
</template>
<script>
import { useShoppingStore } from '@/store/cart';
export default ({
    name: "numbercontrol",
    props: {
        disabled: Boolean,
        max: {
            type: Number,
            default: Infinity
        },
        min: {
            type: Number,
            default: -Infinity
        },
        value: {
            required: true
        },
        step: {
            type: Number,
            default: 1
        },
        product: {
            required: true
        },
    },

    data() {
        return {
            currentValue: this.value,
            decrementDisabled: false,
            incrementDisabled: false,
            inputDisabled: false,
        }
    },

    watch: {
        value(val) {
            this.currentValue = val
        }
    },

    methods: {
        increment() {
            if (this.disabled || this.incrementDisabled) {
                return
            }

            let newVal = this.currentValue + 1 * this.step
            this.decrementDisabled = false
            this.cartStore.incrementQ(this.product)
            this._updateValue(newVal)
        },
        decrement() {
            if (this.disabled || this.decrementDisabled) {
                return
            }

            let newVal = this.currentValue + -1 * this.step
            this.incrementDisabled = false
            this.cartStore.decrementQ(this.product)
            this._updateValue(newVal)
        },
        _updateValue(newVal) {
            const oldVal = this.currentValue

            if (oldVal === newVal || typeof this.value !== 'number') {
                return
            }
            if (newVal <= this.min) {
                newVal = this.min
                this.decrementDisabled = true
            }
            if (newVal >= this.max) {
                newVal = this.max
                this.incrementDisabled = true
            }
            this.currentValue = newVal
            this.$emit('input', this.currentValue)
        }
    },
    setup (){
		const cartStore = useShoppingStore();
		return {
			cartStore
		}
    },
    mounted() {
        if (this.value == this.min) {
            this.decrementDisabled = true
        }
    }
})
</script>
<style>
.control.number {
    display: inline-flex;
    position: relative;
    width: 100%;
    max-width: calc(180 / 16 * 1rem);
}

.control.number input {
    border: 1px solid #e9ecef;
    border-radius: 3px;
    font-size: 0.875rem;
    flex: 1 0;
    line-height: 1.65;
    height: 40px;
    margin: 0 auto;
    padding-left: 40px;
    padding-right: 40px;
    text-align: center;
    width: 100%;
    max-width: 100%;
    vertical-align: top;
    -moz-appearance: textfield;
}

.control.number input::-webkit-inner-spin-button,
.control.number input::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

.control.number input:focus {
    outline: 0;
    box-shadow: none;
}

.control.number button {
    background-color: #fff;
    border: 1px solid #e9ecef;
    border-radius: 0;
    color: #343d46;
    cursor: pointer;
    flex: 0 1;
    font-family: sans-serif;
    font-size: 0.875rem;
    font-weight: bold;
    line-height: 1.7;
    position: absolute;
    top: 0;
    text-align: center;
    width: 40px;
    height: 40px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    z-index: 5;
}

.control.number button:hover,
.control.number button:active,
.control.number button:focus {
    border-color: #0288d1;
    color: #0288d1;
    outline: none;
}

.control.number button:hover~.input {
    border: 1px solid #0288d1;
}

.control.number button:active~.input,
.control.number button:focus~.input {
    border: 0;
    box-shadow: none;
}

.control.number button:disabled,
.control.number button.is-disabled {
    color: #adb5bd;
    opacity: 1;
}

.control.number .increment-button {
    right: 0;
}

.control.number .decrement-button {
    left: 0;
}</style>