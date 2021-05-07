const settings = {
  name: "wermedia",
  state: {
    "frontity": {
      "url": "http://local-react.com",
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
          url: "http://local-react.com",
          postTypes: [
            {
              type: "products",
              endpoint: "products",
              archive: "/products"
            }
          ]
        }
      }
    },
    "@frontity/tiny-router",
    "@frontity/html2react"
  ]
};

export default settings;