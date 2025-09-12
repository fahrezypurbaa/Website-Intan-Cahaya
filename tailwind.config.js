/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Metropolis', 'sans-serif'], 
      },
      colors: {
        brandGreen: '#73BA7D',
        brandBlue: '#144F5F',
      },
    },
  },
  plugins: [],
}