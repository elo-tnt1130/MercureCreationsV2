/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./assets/**/*.js", "./templates/**/*.html.twig"],
  theme: {
    colors: {
      //* COLORS for titles
      orange: "#ff8e00",
      "light-orange": "#ffd073",
      "night-blue": "#06266f",
      "medium-blue": "#0a3aa8",
      bluejean: "#4671d5",
      //* OTHER colors
      "dark-grey": "#2e2e2e",
      "light-grey": "#848484",
      blue: "#0a3aa8",
      color1: "#ff8e00",
      color2: "#ffd073",
      color3: "#fa0",
      color4: "#f8f9f3",
      color5: "#f8f9fa",
      color6: "#ededf9",
    },
    extend: {},
    screens: {
      xs: "575.98px",
      sm: "768px",
      md: "991.98px",
      lg: "1199.98px",
      xl: "1280px",
      "2xl": "1600px",
    },

  },
  plugins: [require("@tailwindcss/forms")],
};
