/** @type {import('tailwindcss').Config} */
import defaultColors from "tailwindcss/colors";
import colorShade from "./resources/tailwind-plugins/color-shades";
import defaultTheme from "tailwindcss/defaultTheme";
import preset from './vendor/filament/support/tailwind.config.preset'


const siteColors = {
    ...defaultColors,
    custom: {
        DEFAULT: '#71b8c5',
        contrast: '#ffffff',
        dark: defaultColors.gray[900],
        hover: '#EE4737',
        hoverContrast: '#ffffff',
    },
    primary: {
        DEFAULT: '#71b8c5',
        contrast: '#ffffff',
        dark: defaultColors.gray[900],
        hover: '#EE4737',
        hoverContrast: '#ffffff',
    },
    secondary: {
        DEFAULT: '#9c7a97',
        contrast: '#ffffff'
    },
    info: defaultColors.yellow[500],
    success: defaultColors.green[500],
    warning: defaultColors.blue[500],
    error: defaultColors.red[600],
    danger: defaultColors.rose,
};

export default {
    darkMode: 'class',
    presets: [require('@statikbe/repair-components')],
    content: [
        './node_modules/@statikbe/repair-components/**/*.{vue,js}',
        './node_modules/@statikbe/repair-components/safelist.txt',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        `./resources/js/**/*.{ts,js}`,
        './vendor/filament/**/*.blade.php'
    ],
    theme: {
        container: {
            center: true,
            padding: defaultTheme.spacing['4'],
        },
        extend: {
            fontFamily: {
                base: ['Titillium Web', 'sans-serif'],
            },
            fontSize: {
                base: ['18px', '25px'],
                tiny: ['14px', '20px'],
                small: ['16px', '24px'],
                large: ['20px', '30px'],
                huge: ['24px', '32px'],
                intro: ['20px', '30px'],
                h1: ['40px', '50px'],
                h2: ['35px', '40px'],
                h3: ['28px', '35px'],
                h4: ['22px', '25px'],
                h5: ['20px', '25px'],
                h6: ['18px', '25px'],
                button: ['18px', 1],
            },
            colors: {
                ...siteColors,
                active: siteColors.primary.DEFAULT
            },
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        'color': theme('colors.main'),
                        'h1, h2, h3, h4, h5, h6': {
                            color: theme('colors.primary.DEFAULT'),
                            marginTop: '0.75em',
                            marginBottom: '0.5em',
                        },
                        'h1, h2, h3': {
                            fontWeight: 900,
                        },
                        'h4, h5, h6': {
                            fontWeight: 700,
                        },
                        'h1': {
                            fontSize: theme('fontSize.h1.0'),
                            lineHeight: theme('fontSize.h1.1'),
                        },
                        'h2': {
                            fontSize: theme('fontSize.h2.0'),
                            lineHeight: theme('fontSize.h2.1'),
                        },
                        'h3': {
                            fontSize: theme('fontSize.h3.0'),
                            lineHeight: theme('fontSize.h3.1'),
                        },
                        'h4': {
                            fontSize: theme('fontSize.h4.0'),
                            lineHeight: theme('fontSize.h4.1'),
                        },
                        'h5': {
                            fontSize: theme('fontSize.h5.0'),
                            lineHeight: theme('fontSize.h5.1'),
                        },
                        'h6': {
                            fontSize: theme('fontSize.h6.0'),
                            lineHeight: theme('fontSize.h6.1'),
                        },
                        'ul > li:before': {
                            backgroundColor: theme('colors.primary.DEFAULT'),
                        },
                        'ol > li:before': {
                            color: theme('colors.primary.DEFAULT'),
                        },
                    },
                },
            }),
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('./resources/tailwind-plugins/typography'),
        colorShade(siteColors),
    ],
}
