const settings = {
  name: "wermedia",
  state: {
    "frontity": {
      "url": "http://klant.wermedia.nl:8888/brasserie-gelpenberg/",
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
          url: "http://klant.wermedia.nl:8888/brasserie-gelpenberg/",
          params: {
            type: ["page"]
          }
        }
      }
    },
    "@frontity/tiny-router",
    "@frontity/html2react"
  ]
};

export default settings;