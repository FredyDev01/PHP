/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./vista/**/*.{html,js,php}"],
  theme: {
    extend: {
      width: {
        form: "520px",
      },
      backgroundImage: {
        bgVistaNuevo: "linear-gradient(to left, transparent, transparent), url(../assets/bgNuevo.jpg)",
      }
    },
  },
  plugins: [],
}

