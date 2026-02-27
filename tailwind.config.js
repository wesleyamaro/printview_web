import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {


    darkMode: 'class',

    presets: [
        
        require("./vendor/wireui/wireui/tailwind.config.js")
    ],

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/resources/**/*.blade.php",

        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        
        extend: {
           
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
           
            maxHeight: {
                '30v': '30vh',

                '50v': '50vh',
                '55v': '55vh',
                '60v': '60vh',
                '65v': '65vh',
                '63v': '63vh',
                '68v': '68vh',
                '70v': '70vh',
                '75v': '75vh',
                '77v': '77vh',
                '80v': '80vh',
                '85v': '85vh',
                '1/4': '25%',
                '1/2': '50%',
                '3/4': '75%',
  
              },
              minHeight: {
                '30v': '30vh',

                '50v': '50vh',
                '55v': '55vh',
                '60v': '60vh',
                '63v': '63vh',
                '65v': '65vh',
                '68v': '68vh',
                '70v': '70vh',
                '75v': '75vh',
                '77v': '77vh',
                '80v': '80vh',
                '85v': '85vh',
                '1/4': '25%',
                '1/2': '50%',
                '3/4': '75%',
  
              },
              width:{
                '38': '9.9rem', 
                '18': '4.5rem',
   
              },

        
             /*  colors: {
                
                primary: colors.orange,
                secondary: colors.gray,
                positive: colors.emerald,
                negative: colors.red,
                warning: colors.amber,
                info: colors.blue
            }, */
        },
    },

    /* plugins: [
        forms, typography,
        require('flowbite/plugin')
    ], */
 
        plugins: [
          require('@tailwindcss/forms'),
          require('@tailwindcss/typography'),
          require('flowbite/plugin')
        ]

      
};
