<template>
    <form :action="getAction" @submit.prevent="submit">
        <label class="text-sm sm:text-base block mb-2 text-gray-800">
            أختر طريقة الدفع
        </label>

       <slot v-bind:form="form" />

        <div class="mt-12 w-6/12 md:w-4/12 mr-auto text-center">
            <button
                type="submit"
                :disabled="disabled || form.method === ''"
                :class="[buttonClasses]"
                class="transition-all duration-150 font-bold py-2 shadow text-center text-white"
            >
                <span v-if="disabled" class="fa fa-spinner fa-spin"></span>
                <span v-else>ادفع الآن</span>
            </button>
        </div>
    </form>
</template>

<script>
import {FormMixin} from './form.mixin';
import Form from 'form-backend-validation';

export default {
    name: "paymentMethods",
    mixins: [FormMixin],
    props: {
        action: String,
    },
    data: () => ({
        disabled: false,
        form: new Form({
            method: ''
        }, {
            resetOnSuccess: false
        })
    }),
    computed: {
        getAction() {
            if (this.form.method !== '') {
                return `${this.action}/${this.form.method}`;
            }
        }
    },
    methods: {
        submit() {
            this.disabled = true;

            this.form.post(this.$el.getAttribute('action'))
                .then(({redirect_to}) => window.location.replace(redirect_to))
                .catch(() => this.error());
        }
    }
}
</script>
