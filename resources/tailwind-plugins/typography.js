const plugin = require('tailwindcss/plugin');

// We can't use @apply in index.css since we would have to prepend the prefix (which could be anything)
//

module.exports = plugin(function ({ addComponents, theme }) {
    //  Extend 'text-h#' classes with shared heading styles

    const sharedHeadingStyles = {
        // 'all': 'initial', // Make sure inherited styles from parent application get reset
        'display': 'block',
        'fontFamily': theme('fontFamily.base'),
        // 'color': theme('colors.primary.DEFAULT'),
        'marginTop': '0.75em',
        'marginBottom': '0.5em',
        '&:first-child': {
            marginTop: 0,
        },
        '&:last-child': {
            marginBottom: 0,
        },
    };

    const largeHeadingStyles = {
        ...sharedHeadingStyles,
        fontWeight: 900,
    };

    const smallHeadingStyles = {
        ...sharedHeadingStyles,
        fontWeight: 700,
    };

    addComponents({
        '.text-h1': largeHeadingStyles,
        '.text-h2': largeHeadingStyles,
        '.text-h3': largeHeadingStyles,
        '.text-h4': largeHeadingStyles,
        '.text-h5': smallHeadingStyles,
        '.text-h6': smallHeadingStyles,
    });
});
