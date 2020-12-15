module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
        './resources/js/components/**/*.vue',
        './resources/js/components/**/*.js',
    ],
    theme: {
        fontFamily: {
            'sans': ['Tajawal', 'sans-serif']
        },
        extend: {
            container: {
                center: true,
                padding: '2rem'
            },
            customForms: theme => ({
                default: {
                    select: {
                        icon: '<svg fill="#4a5568" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>',
                        paddingRight: `${theme('spacing.3')}`,
                        paddingLeft: `${theme('spacing.10')}`,
                        backgroundPosition: `left ${theme('spacing.2')} center`
                    },
                    radio: {
                        icon: '<svg fill="#fff" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><circle cx="8" cy="8" r="3"/></svg>'
                    },
                },
            }),
            colors: {
                'facebook': '#3b5998',
                'twitter': '#00aced',
                'instagram': '#517fa4',
                'whatsapp': '#075e54',
            },
            zIndex: {
                '-1': '-1'
            }
        },
    },
    variants: {},
    plugins: [
        require('@tailwindcss/custom-forms'),
        require('@tailwindcss/typography'),
    ],
}
