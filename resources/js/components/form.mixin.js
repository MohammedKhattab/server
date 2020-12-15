import Swal from "sweetalert2";

export const FormMixin = {
    computed: {
        buttonClasses() {
            if (this.disabled) {
                return 'bg-indigo-300 px-6 rounded-full';
            }

            return 'bg-indigo-500 block focus:outline-none focus:shadow-outline hover:bg-indigo-400 rounded w-full';
        },
        showOtherInput() {
            return this.form.product_type === 'other';
        }
    },
    methods: {
        error() {
            return Swal.fire({
                icon: 'error',
                title: 'حدث خطأ ما',
                text: 'نأسف لذلك لقد واجهنا خطأ اثناء ارسال الصفحة، برجاء المعاودة قريباً',
                confirmButtonText: 'إعادة تحميل الصفحة'
            }).then(() => window.location.reload());
        },
        success(response) {
            return window.location.replace(response.redirect_url);
        },
        submit() {
            this.disabled = true;

            this.form.post(this.url)
                .then((response) => {
                    if (response.message === 'done') {
                        return this.success(response);
                    }

                    return this.error();
                })
                .catch(({response}) => {
                    this.disabled = false;

                    if (response.status === 422) {
                        return Swal.fire({
                            toast: true,
                            position: 'bottom-start',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'error',
                            title: 'هناك خطأ أو أكثر في المدخلات'
                        })
                    }

                    return this.error();
                });
        }
    }
};
