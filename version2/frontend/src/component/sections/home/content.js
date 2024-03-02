import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import { Link } from "react-router-dom";
import SecondSection from "./secondsection";
import axios from "axios";
import DefultPosts from "./DefultPosts";
import LastSection from "./LastSection";

export default function () {
  const baseURL = "http://127.0.0.1:8000/";
  const RecentPosts = async () => {
    const response = await axios.get(`${baseURL}api/LastPosts`);
    return response.data.posts;
  };

  const { data: posts, isLoading, isError } = useQuery("posts", RecentPosts);
  return (
    <>
      <div className="page">
        <div className="page_layout page_margin_top clearfix">
          <div className="row">
            <div className="column column_1_1">
              <div className="blog_grid">
                <div className="grid_view">
                  <div className="row">
                    {posts &&
                      posts.map((post) => (
                        <div className=" post">
                          <Link to={`/post/${post.TITLE}`} title={post.TITLE}>
                            <img
                              src={baseURL + post.Main_IMG}
                              alt={post.TITLE}
                            />
                          </Link>
                          <div className="slider_content_box">
                            <ul
                              className="post_details simple "
                              style={{ Float: "Right" }}
                            >
                              <li className="category">
                                <Link
                                  to={`/tag/${post.tag.TITLE}`}
                                  title={post.tag.TITLE}
                                >
                                  {post.tag.TITLE}
                                </Link>
                              </li>
                            </ul>
                            <h2>
                              <Link
                                to={`/post/${post.TITLE}`}
                                title={post.TITLE}
                              >
                                {post.TITLE}
                              </Link>
                            </h2>
                          </div>
                        </div>
                      ))}
                  </div>
                </div>
                <div className="slider_view">
                  <div className="caroufredsel_wrapper caroufredsel_wrapper_small_slider">
                    <ul className="small_slider id-small_slider">
                      <li className="slide">
                        <Link
                          to="post_gallery.html"
                          title="Nuclear Fusion Closer to Becoming a Reality"
                        >
                          <span className="icon gallery" />
                          <img
                            src="images/samples/690x450/image_10.jpg"
                            alt="img"
                          />
                        </Link>
                        <div className="slider_content_box">
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_world.html" title="WORLD">
                                WORLD
                              </Link>
                            </li>
                          </ul>
                          <h2>
                            <Link
                              to="post_gallery.html"
                              title="Nuclear Fusion Closer to Becoming a Reality"
                            >
                              Nuclear Fusion Closer to Becoming a Reality
                            </Link>
                          </h2>
                        </div>
                      </li>
                      <li className="slide">
                        <Link
                          to="post_quote_2.html"
                          title="Bayern Says Ties With Rivals Dortmund Have Frozen"
                        >
                          <img
                            src="images/samples/690x450/image_08.jpg"
                            alt="img"
                          />
                        </Link>
                        <div className="slider_content_box">
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_sports.html" title="SPORTS">
                                SPORTS
                              </Link>
                            </li>
                          </ul>
                          <h2>
                            <Link
                              to="post_quote_2.html"
                              title="Bayern Says Ties With Rivals Dortmund Have Frozen"
                            >
                              Bayern Says Ties With Rivals Dortmund Have Frozen
                            </Link>
                          </h2>
                        </div>
                      </li>
                      <li className="slide">
                        <Link
                          to="post_small_image.html"
                          title="Escape From Planet Earth: The Movie"
                        >
                          <img
                            src="images/samples/690x450/image_05.jpg"
                            alt="img"
                          />
                        </Link>
                        <div className="slider_content_box">
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_world.html" title="WORLD">
                                WORLD
                              </Link>
                            </li>
                          </ul>
                          <h2>
                            <Link
                              to="post_small_image.html"
                              title="Escape From Planet Earth: The Movie"
                            >
                              Escape From Planet Earth: The Movie
                            </Link>
                          </h2>
                        </div>
                      </li>
                      <li className="slide">
                        <Link
                          to="post.html"
                          title="Built on Brotherhood, Club Lives Up to Name"
                        >
                          <img
                            src="images/samples/690x450/image_01.jpg"
                            alt="img"
                          />
                        </Link>
                        <div className="slider_content_box">
                          <ul className="post_details simple">
                            <li className="category">
                              <Link
                                to="category_lifestyle.html"
                                title="LIFESTYLE"
                              >
                                LIFESTYLE
                              </Link>
                            </li>
                          </ul>
                          <h2>
                            <Link
                              to="post.html"
                              title="Built on Brotherhood, Club Lives Up to Name"
                            >
                              Built on Brotherhood, Club Lives Up to Name
                            </Link>
                          </h2>
                        </div>
                      </li>
                      <li className="slide">
                        <Link
                          to="post.html"
                          title="New Painkiller Rekindles Addiction Concerns"
                        >
                          <img
                            src="images/samples/690x450/image_12.jpg"
                            alt="img"
                          />
                        </Link>
                        <div className="slider_content_box">
                          <ul className="post_details simple">
                            <li className="category">
                              <Link to="category_health.html" title="HEALTH">
                                HEALTH
                              </Link>
                            </li>
                          </ul>
                          <h2>
                            <Link
                              to="post.html"
                              title="New Painkiller Rekindles Addiction Concerns"
                            >
                              New Painkiller Rekindles Addiction Concerns
                            </Link>
                          </h2>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div
                    id="small_slider"
                    className="slider_posts_list_container small"
                  ></div>
                </div>
              </div>
            </div>
          </div>
          <SecondSection />
          <DefultPosts />
          <LastSection />
        </div>
      </div>
    </>
  );
}
