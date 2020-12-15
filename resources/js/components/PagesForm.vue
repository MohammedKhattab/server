<template>
    <form @submit.prevent="submit">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 text-right">
            <template v-for="(field, name) in fields">
                <field
                    v-if="! field.hasOwnProperty('related_to')"
                    :key="name"
                    :field="field"
                    :name="name"
                    :has-error="form.hasError(name)"
                    :error="form.getError(name)"
                    v-model="form[name]"
                    @relatedChanged="e => form[field.related_by] = e"
                />
            </template>
        </div>

        <div class="mt-12 w-6/12 md:w-4/12 mr-auto text-center">
            <button
                type="submit"
                :disabled="disabled"
                :class="[buttonClasses]"
                class="transition-all duration-150 font-bold py-2 shadow text-center text-white"
            >
                <span v-if="disabled" class="fa fa-spinner fa-spin"></span>
                <span v-else>ارسال</span>
            </button>
        </div>
    </form>
</template>

<script>
import {FormMixin} from "./form.mixin";
import Form from "form-backend-validation";
import Swal from "sweetalert2";

export default {
    name: "PagesForm",
    mixins: [FormMixin],
    props: {
        url: String,
        fields: Object
    },
    data: () => ({
        disabled: false,
        form: new Form()
    }),
    computed: {
        formFields() {
            const form = {};

            for (const field in this.fields) {
                if (this.fields.hasOwnProperty(field)) {
                    form[field] = this.fields[field].value || '';
                }
            }

            return form;
        }
    },
    mounted() {
        this.form = new Form(
            this.formFields
        )
    },
    methods: {
        success() {
            Swal.fire('شكراً لك', 'لقد حصلنا على النموذج، وسوف نرد في أقرب وقت إن لزم الأمر', 'success');
        }
    }
}
</script>
