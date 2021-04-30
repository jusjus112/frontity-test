const settings = {
  name: "wermedia",
  state: {
    "frontity": {
      "url": "https://www.fotopottjewijd.com",
      "title": "Test Frontity Blog",
      "description": "WordPress installation for Frontity development"
    }
  },
  packages: [
    {
      name: "wermedia-theme"
    },
    {
      name: "@frontity/wp-source",
      state: {
        source: {
          url: "https://www.fotopottjewijd.com"
        }
      }
    },
    "@frontity/tiny-router",
    "@frontity/html2react"
  ]
};

export default settings;