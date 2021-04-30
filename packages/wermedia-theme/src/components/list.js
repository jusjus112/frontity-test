import React from "react"
import { connect } from "frontity"
import Link from "@frontity/components/link"

const List = ({ state }) => {

  const data = state.source.get(state.router.link)

  return(
      <div>
        { data.items.map(value => {
          const post = state.source[value.type][value.id]
          return (
            <Link key={value.id} link={post.link}>
              {post.title.rendered}
              <br/>
            </Link>
          )
        }) }
      </div>
  )
}

export default connect(List)