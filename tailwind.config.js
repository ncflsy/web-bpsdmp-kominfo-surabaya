/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.{html,js,php}'],
  theme: {
    extend: {},
    colors: {
      transparent: 'transparent',
      blue: '#0182F9',
      black: '#151718',
      white: '#F6FBFE',
      whiteOri: '#ffffff',
      lightGrey: '#9da5a9',
      darkGrey: '#363844',
      bgGrey: '#f6f9fb',
      red: '#CD1E16'
    },
    fontFamily: {
      outfit: ["Outfit", "sans-serif"],
     },
  },
  plugins: [],
}

