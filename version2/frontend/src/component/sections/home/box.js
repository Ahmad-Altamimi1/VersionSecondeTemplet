import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import { Link } from "react-router-dom";
import axios from "axios";
import formatDate from "../../hook/FormatDate";
import TruncateText from "../../hook/TruncateText";
export default function () {
  const baseURL = "http://127.0.0.1:8000/";
  const Tabstags = async () => {
    const response = await axios.get(`${baseURL}api/Tabstags`);
    return response.data.tags;
  };
  const { data: tags, isLoadingtag, isErrortag } = useQuery("tags", Tabstags);
  return (
    <>
      <div className="row page_margin_top_section">
        {tags &&
          tags.slice(0, 2).map((tag) => (
            <div className="column column_1_2">
              <h4 className="box_header">{tag.TITLE}</h4>
              <ul className="blog">
                <li className="post">
                  <Link
                    to={`/post/${tag.posts[0].TITLE}`}
                    title={tag.posts[0].TITLE}
                  >
                    <img
                      src={baseURL + tag.posts[0].Main_IMG}
                      alt={tag.posts[0].TITLE}
                    />
                  </Link>
                  <h2 className="with_number">
                    <Link
                      to={`/post/${tag.posts[0].TITLE}`}
                      title={tag.posts[0].TITLE}
                    >
                      {tag.posts[0].TITLE}
                    </Link>
                    {/* <Link
                      className="comments_number"
                      to="post.html#comments_list"
                      title="2 comments"
                    >
                      2<span className="arrow_comments" />
                    </Link> */}
                  </h2>
                  <ul className="post_details">
                    <li className="category">
                      <Link to={`/tag/${tag.TITLE}`} title={tag.TITLE}>
                        {tag.TITLE}
                      </Link>
                    </li>
                    <li className="date">10:11 PM, Feb 02</li>
                  </ul>
                  <p>{TruncateText(tag.posts[0].DESCRIPTION, 100)}</p>
                  <Link
                    className="read_more"
                    to={`/tag/${tag.TITLE}`}
                    title="قراءة المزيد"
                  >
                    <span className="arrow" />
                    <span>قراءة المزيد</span>
                  </Link>
                </li>
              </ul>
              <ul className="blog small clearfix">
                {tag &&
                  tag.posts.slice(1, 2).map((post) => (
                    <li className="post">
                      <Link to={`/post/${post.TITLE}`} title={post.TITLE}>
                        <img
                          src={baseURL + post.Main_IMG}
                          alt={post.TITLE}
                          width={"100"}
                          height={"100"}
                        />
                      </Link>
                      <div className="post_content">
                        <h5>
                          <Link to={`/post/${post.TITLE}`} title={post.TITLE}>
                            {post.TITLE}
                          </Link>
                        </h5>
                        <ul className="post_details simple">
                          <li className="category">
                            <Link
                              to={`/tag/${post.tag.TITLE}`}
                              title={post.tag.TITLE}
                            >
                              {post.tag.TITLE}
                            </Link>
                          </li>
                          <li className="date">{formatDate(post.DATE)}</li>
                        </ul>
                      </div>
                    </li>
                  ))}
              </ul>
              <Link
                className="more page_margin_top"
                to={`/tag/${tag.TITLE}`}
                title={tag.TITLE}
              >
                قراءة المزيد
              </Link>
            </div>
          ))}
      </div>
    </>
  );
}
