/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        'zakat' : '#FFF9B6',
        'zakat1' : '#C4DFAA',
      },
      fontFamily: {
        'worksans' : ['Work Sans', 'sans-serif'],
      },
      keyframes: {
        wiggle: {
          '0%, 100%': {
              transform: 'rotate(-5deg)'
          },
          '50%': {
              transform: 'rotate(5deg)'
          },
        },
        flo: {
          '50%': {
            transform: 'translateY(10px)'
          }
        }
      },
      animation: {
        wiggle: 'wiggle 5s ease-in-out infinite',
        float: 'flo 5s ease-in-out infinite',
      },
    },
  },
  plugins: [],
}

