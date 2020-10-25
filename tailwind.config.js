const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'odd', 'even', 'hover', 'group-hover','focus', 'disabled'],
        backgroundColor: ['responsive', 'odd', 'even', 'group-hover', 'hover'],
    },

    plugins: [require('@tailwindcss/ui')],
};
