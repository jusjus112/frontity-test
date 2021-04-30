import React from "react"
import { connect, Global, css, styled } from "frontity"
import Link from "@frontity/components/link"
import Switch from "@frontity/components/switch"
import List from "./list";
import Post from "./post";
import Page from "./page";

export default connect(({ state }) => {

  const data = state.source.get(state.router.link)

  return (
      <>
        <Global
        styles={css`
          * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }
          html {
            font-family: system-ui, sans-serif;
          }
        `}
        />
        <Header isPostType={data.isPostType} isPage={data.isPage}>
          <HeaderContent>
            <h1>Hello Frontity</h1>
            <p>Current URL: { state.router.link }</p>
            <nav>
              <Link link="/">Home</Link>
              <br/>
              <Link link="/contact">Contact</Link>
              <br/>
              <Link link="/fotobewerking">Fotografie</Link>
            </nav>
          </HeaderContent>
        </Header>
        <hr/>
        <Main>
          <Switch>
            <List when={data.isArchive} />
            <Post when={data.isPost}>is Post</Post>
            <Page when={data.isPage}>is Page</Page>
          </Switch>
        </Main>
      </>
  )
})

const Header = styled.header`
  background-color: #e5edee;
  border-width: 0 0 8px 0;
  border-style: solid;
  border-color: ${ props => props.isPostType ? ( props.isPage ? 'lightsteelblue' : 'lightseagreen' ) : 'maroon'};

  h1 {
    color: #4a4a4a;
  }
`
const HeaderContent = styled.div`
  max-width: 800px;
  padding: 2em 1em;
  margin: auto;
`
const Main = styled.main`
  max-width: 800px;
  padding: 1em;
  margin: auto;

  img {
    max-width: 100%;
  }
  h2 {
    margin: 0.5em 0;
  }
  p {
    line-height: 1.25em;
    margin-bottom: 0.75em;
  }
  figcaption {
    color: #828282;
    font-size: 0.8em;
    margin-bottom: 1em;
  }
`