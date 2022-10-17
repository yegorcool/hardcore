const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                themeRed: '#da1d25',
                themeOrange: '#f69323',
                themeWhite: '#ffffff',
            },
        },
        screens: {
            'sm': '576px', // => @media (min-width: 640px) { ... }
            'md': '768px', // => @media (min-width: 768px) { ... }
            'lg': '992px', // => @media (min-width: 1024px) { ... }
            'xl': '1200px', // => @media (min-width: 1280px) { ... }
            '2xl': '1200px', // '2xl': '1536px', // => @media (min-width: 1536px) { ... }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
