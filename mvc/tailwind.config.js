/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./vista/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        transIndigo: 'rgb(129, 140, 248, .5)',
      },
      boxShadow: {
        input: '0 0 0 .2rem',
      },      
    },
  },
  plugins: [],
}

