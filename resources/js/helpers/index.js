import axios from "axios"
export const priceFormat = (price) => {
    return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'RM' })
        .format(price / 100)
}
