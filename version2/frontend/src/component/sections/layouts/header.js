import "./style/animations.css";
import "./style/superfish.css";
// import "./style/dark_skin.css";
// import "./style/high_contrast_skin.css";
import "./style/jquery.qtip.css";
import "./style/menu_styles.css";
import "./style/odometer-theme-default.css";
import "./style/prettyPhoto.css";
import "./style/reset.css";
import "./style/style.css";
import "./style/responsive.css";
import React, { useEffect, useState } from "react";
import { useQuery } from "react-query";
import axios from "axios";
import CheckIfHaveTag from "../../hook/addtagdropdown";
import { Link } from "react-router-dom";

export default function () {
  const baseURL = "http://127.0.0.1:8000/";
  const MainTags = async () => {
    const response = await axios.get("http://127.0.0.1:8000/api/maintags");
    return response.data.maintags;
  };

  const { data: tags, isLoading, isError } = useQuery("tags", MainTags);
  return (
    <>
      <>
        <head>
          <title>دروب الأعلامية</title>

          <meta charSet="UTF-8" />
          <meta
            name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1.2"
          />
          <meta name="format-detection" content="telephone=no" />
          <meta name="keywords" content="Medic, Medical Center" />
          <meta
            name="description"
            content="Responsive Medical Health Template"
          />
          {/*style*/}
          <link
            href="//fonts.googleapis.com/css?family=Roboto:300,400,700"
            rel="stylesheet"
            type="text/css"
          />
          <link
            href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700"
            rel="stylesheet"
            type="text/css"
          />
          <link rel="stylesheet" type="text/css" href="style/reset.css" />
          <link rel="stylesheet" type="text/css" href="style/superfish.css" />
          <link rel="stylesheet" type="text/css" href="style/prettyPhoto.css" />
          <link rel="stylesheet" type="text/css" href="style/jquery.qtip.css" />
          <link rel="stylesheet" type="text/css" href="style/style.css" />
          <link rel="stylesheet" type="text/css" href="style/menu_styles.css" />
          <link rel="stylesheet" type="text/css" href="style/animations.css" />
          <link rel="stylesheet" type="text/css" href="style/responsive.css" />
          <link
            rel="stylesheet"
            type="text/css"
            href="style/odometer-theme-default.css"
          />
          {/*<link rel="stylesheet" type="text/css" href="style/dark_skin.css">*/}
          {/*<link rel="stylesheet" type="text/css" href="style/high_contrast_skin.css">*/}
          <link rel="shortcut icon" href="images/favicon.ico" />
        </head>

        <>
          <div className="header_top_bar_container clearfix">
            <div className="header_top_bar">
              <form className="search" action="search.html" method="get">
                <input
                  type="text"
                  name="s"
                  placeholder="بحث😍"
                  // defaultValue="Search..."
                  className="search_input hint"
                />
                <input
                  type="submit"
                  className="search_submit"
                  defaultValue=""
                />
              </form>
              {/*<ul class="social_icons dark clearfix">
                      <ul class="social_icons colors clearfix">*/}
              <ul className="social_icons clearfix">
                <li>
                  <Link
                    target="_blank"
                    href="https://facebook.com/QuanticaLabs"
                    className="social_icon facebook"
                    title="facebook"
                  >
                    &nbsp;
                  </Link>
                </li>
                <li>
                  <Link
                    target="_blank"
                    href="https://twitter.com/QuanticaLabs"
                    className="social_icon twitter"
                    title="twitter"
                  >
                    &nbsp;
                  </Link>
                </li>
                <li>
                  <Link
                    href="mailto:contact@pressroom.com"
                    className="social_icon mail"
                    title="mail"
                  >
                    &nbsp;
                  </Link>
                </li>
                <li>
                  <Link
                    href="https://1.envato.market/quanticalabs-portfolio"
                    className="social_icon envato"
                    title="envato"
                  >
                    &nbsp;
                  </Link>
                </li>
              </ul>
              <div className="latest_news_scrolling_list_container">
                <ul>
                  <li className="category">اخر المقالات</li>
                  <li className="left">
                    <Link href="#" />
                  </li>
                  <li className="right">
                    <Link href="#" />
                  </li>
                  <li className="posts">
                    <ul className="latest_news_scrolling_list">
                      <li>
                        <Link href="post.html" title="">
                          Climate Change Debate While Britain Floods
                        </Link>
                      </li>
                      <li>
                        <Link href="post.html" title="">
                          The Public Health Crisis Hiding in Our Food
                        </Link>
                      </li>
                      <li>
                        <Link href="post.html" title="">
                          Nuclear Fusion Closer to Becoming a Reality
                        </Link>
                      </li>
                    </ul>
                  </li>
                  {/* <li className="date">
                    <Linkbbr title="04 Apr 2014" className="timeago current">
                      04 Apr 2014
                    </abbr>
                    <Linkbbr title="04 May 2014" className="timeago">
                      04 May 2014
                    </abbr>
                    <Linkbbr title="04 June 2014" className="timeago">
                      04 June 2014
                    </abbr>
                  </li> */}
                </ul>
              </div>
            </div>
          </div>
          {/*<div class="header_container small">
              <div class="header_container style_2">
              <div class="header_container style_2 small">
              <div class="header_container style_3">
              <div class="header_container style_3 small">*/}
          <div className="header_container">
            <div className="header clearfix">
              <div className="logo">
                <h1>
                  <Link href="home.html" title="Pressroom">
                    Doroob Media
                  </Link>
                </h1>
                <h4>خيارك الأمثل </h4>
              </div>
              <div className="placeholder">728 x 90</div>
            </div>
          </div>
          {/* <div class="menu_container style_2 clearfix">
              <div class="menu_container style_3 clearfix">
              <div class="menu_container style_... clearfix">
              <div class="menu_container style_10 clearfix">
              <div class="menu_container sticky clearfix">*/}
          <div className="menu_container clearfix">
            <nav dir="">
              <ul className="sf-menu">
                <li className=" selected">
                  <Link href="#" title="Home">
                    الصفحة الرئيسية
                  </Link>
                  {/* <ul>
                    <li>
                      <Link href="home.html" title="Home Style 1">
                        Home Style 1
                      </Link>
                    </li>
                    <li className="selected">
                      <Link href="home_2.html" title="Home Style 2">
                        Home Style 2
                      </Link>
                    </li>
                    <li>
                      <Link href="home_3.html" title="Home Style 3">
                        Home Style 3
                      </Link>
                    </li>
                    <li>
                      <Link href="home_4.html" title="Home Style 3">
                        Home Style 4
                      </Link>
                    </li>
                    <li>
                      <Link href="home_5.html" title="Home Style 5">
                        Home Style 5
                      </Link>
                    </li>
                    <li>
                      <Link href="home_6.html" title="Home Style 6">
                        Home Style 6
                      </Link>
                    </li>
                    <li>
                      <Link href="home_7.html" title="Home Style 7">
                        Home Style 7
                      </Link>
                    </li>
                  </ul> */}
                </li>
                <li className="submenu">
                  <Link href="#" title="Pages">
                    Pages
                  </Link>
                  <ul>
                    <li>
                      <Link href="about.html" title="About Style 1">
                        About Style 1
                      </Link>
                    </li>
                    <li>
                      <Link href="about_2.html" title="About Style 2">
                        About Style 2
                      </Link>
                    </li>
                    <li>
                      <Link href="default.html" title="Default">
                        Default
                      </Link>
                    </li>
                    <li>
                      <Link href="404.html" title="404 Not Found">
                        404 Not Found
                      </Link>
                    </li>
                  </ul>
                </li>
                <li className="submenu mega_menu_parent">
                  <Link href="#" title="Mega Menu">
                    Mega Menu
                  </Link>
                  <ul>
                    <li className="submenu">
                      <Link href="blog.html" title="Latest Posts">
                        Latest Posts
                      </Link>
                      <ul className="mega_menu blog">
                        <li className="post">
                          <Link
                            href="post.html"
                            title="New Painkiller Rekindles Addiction Concerns"
                          >
                            <img
                              src="images/samples/330x242/image_08.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post.html"
                              title="New Painkiller Rekindles Addiction Concerns"
                            >
                              New Painkiller Rekindles Addiction Concerns
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post">
                          <Link
                            href="post.html"
                            title="High Altitudes May Aid Weight Control"
                          >
                            <img
                              src="images/samples/330x242/image_11.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post.html"
                              title="High Altitudes May Aid Weight Control"
                            >
                              High Altitudes May Aid Weight Control
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post">
                          <Link
                            href="post.html"
                            title="Build on Brotherhood, Club Lives Up to Name"
                          >
                            <img
                              src="images/samples/330x242/image_06.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post.html"
                              title="Build on Brotherhood, Club Lives Up to Name"
                            >
                              Build on Brotherhood, Club Lives Up to Name
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li className="submenu">
                      <Link href="blog.html" title="Recent Galleries">
                        Recent Galleries
                      </Link>
                      <ul className="mega_menu blog">
                        <li className="post">
                          <Link
                            href="post_gallery.html"
                            title="Build on Brotherhood, Club Lives Up to Name"
                          >
                            <span className="icon gallery" />
                            <img
                              src="images/samples/330x242/image_03.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post_gallery.html"
                              title="Build on Brotherhood, Club Lives Up to Name"
                            >
                              Build on Brotherhood, Club Lives Up to Name
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post">
                          <Link
                            href="post_gallery.html"
                            title="High Altitudes May Aid Weight Control"
                          >
                            <span className="icon gallery" />
                            <img
                              src="images/samples/330x242/image_05.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post_gallery.html"
                              title="High Altitudes May Aid Weight Control"
                            >
                              High Altitudes May Aid Weight Control
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post">
                          <Link
                            href="post_gallery.html"
                            title="New Painkiller Rekindles Addiction Concerns"
                          >
                            <span className="icon gallery" />
                            <img
                              src="images/samples/330x242/image_04.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post_gallery.html"
                              title="New Painkiller Rekindles Addiction Concerns"
                            >
                              New Painkiller Rekindles Addiction Concerns
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li className="submenu">
                      <Link href="blog.html" title="Recent Reviews">
                        Recent Reviews
                      </Link>
                      <ul className="mega_menu blog">
                        <li className="post">
                          <Link
                            href="post_review.html"
                            title="New Painkiller Rekindles Addiction Concerns"
                          >
                            <span className="icon">
                              <span>8.7</span>
                            </span>
                            <img
                              src="images/samples/330x242/image_07.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post_review.html"
                              title="New Painkiller Rekindles Addiction Concerns"
                            >
                              New Painkiller Rekindles Addiction Concerns
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post">
                          <Link
                            href="post_review_2.html"
                            title="High Altitudes May Aid Weight Control"
                          >
                            <span className="icon">
                              <span>9.5</span>
                            </span>
                            <img
                              src="images/samples/330x242/image_09.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post_review_2.html"
                              title="High Altitudes May Aid Weight Control"
                            >
                              High Altitudes May Aid Weight Control
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post">
                          <Link
                            href="post_review.html"
                            title="Build on Brotherhood, Club Lives Up to Name"
                          >
                            <span className="icon">
                              <span>7.8</span>
                            </span>
                            <img
                              src="images/samples/330x242/image_14.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post_review.html"
                              title="Build on Brotherhood, Club Lives Up to Name"
                            >
                              Build on Brotherhood, Club Lives Up to Name
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post first">
                          <Link
                            href="post_review.html"
                            title="Nuclear Fusion Closer to Becoming a Reality"
                          >
                            <span className="icon">
                              <span>8.0</span>
                            </span>
                            <img
                              src="images/samples/330x242/image_13.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post_review.html"
                              title="Nuclear Fusion Closer to Becoming a Reality"
                            >
                              Nuclear Fusion Closer to Becoming a Reality
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post first">
                          <Link
                            href="post_review_2.html"
                            title="The Public Health Crisis Hiding in Our Food"
                          >
                            <span className="icon">
                              <span>9.1</span>
                            </span>
                            <img
                              src="images/samples/330x242/image_02.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post_review_2.html"
                              title="The Public Health Crisis Hiding in Our Food"
                            >
                              The Public Health Crisis Hiding in Our Food
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                        <li className="post first">
                          <Link
                            href="post_review_2.html"
                            title="Study Linking Illnes and Salt Leaves Researchers Doubtful"
                          >
                            <span className="icon">
                              <span>6.7</span>
                            </span>
                            <img
                              src="images/samples/330x242/image_01.jpg"
                              alt="img"
                            />
                          </Link>
                          <h5>
                            <Link
                              href="post_review_2.html"
                              title="Study Linking Illnes and Salt Leaves Researchers Doubtful"
                            >
                              Study Linking Illnes and Salt Leaves Researchers
                              Doubtful
                            </Link>
                          </h5>
                          <ul className="post_details simple">
                            <li className="category">
                              <Link title="HEALTH" href="category_health.html">
                                HEALTH
                              </Link>
                            </li>
                            <li className="date">10:11 PM, Feb 02</li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li className="submenu">
                      <Link href="blog.html" title="Most Read">
                        Most Read
                      </Link>
                      <div className="mega_menu row">
                        <div className="column column_1_2">
                          <ul className="blog small">
                            <li className="post">
                              <Link
                                href="post.html"
                                title="Study Linking Illnes and Salt Leaves Researchers Doubtful"
                              >
                                <img
                                  src="images/samples/100x100/image_06.jpg"
                                  alt="img"
                                />
                              </Link>
                              <div className="post_content">
                                <h5>
                                  <Link
                                    href="post.html"
                                    title="Study Linking Illnes and Salt Leaves Researchers Doubtful"
                                  >
                                    Study Linking Illnes and Salt Leaves
                                    Researchers Doubtful
                                  </Link>
                                </h5>
                                <ul className="post_details simple">
                                  <li className="category">
                                    <Link
                                      href="category_health.html"
                                      title="HEALTH"
                                    >
                                      HEALTH
                                    </Link>
                                  </li>
                                  <li className="date">10:11 PM, Feb 02</li>
                                </ul>
                              </div>
                            </li>
                            <li className="post">
                              <Link
                                href="post.html"
                                title="Syrian Civilians Trapped For Months Continue To Be Evacuated"
                              >
                                <img
                                  src="images/samples/100x100/image_12.jpg"
                                  alt="img"
                                />
                              </Link>
                              <div className="post_content">
                                <h5>
                                  <Link
                                    href="post.html"
                                    title="Syrian Civilians Trapped For Months Continue To Be Evacuated"
                                  >
                                    Syrian Civilians Trapped For Months Continue
                                    To Be Evacuated
                                  </Link>
                                </h5>
                                <ul className="post_details simple">
                                  <li className="category">
                                    <Link
                                      href="category_world.html"
                                      title="WORLD"
                                    >
                                      WORLD
                                    </Link>
                                  </li>
                                  <li className="date">10:11 PM, Feb 02</li>
                                </ul>
                              </div>
                            </li>
                            <li className="post">
                              <Link
                                href="post.html"
                                title="Built on Brotherhood, Club Lives Up to Name"
                              >
                                <img
                                  src="images/samples/100x100/image_02.jpg"
                                  alt="img"
                                />
                              </Link>
                              <div className="post_content">
                                <h5>
                                  <Link
                                    href="post.html"
                                    title="Built on Brotherhood, Club Lives Up to Name"
                                  >
                                    Built on Brotherhood, Club Lives Up to Name
                                  </Link>
                                </h5>
                                <ul className="post_details simple">
                                  <li className="category">
                                    <Link
                                      href="category_sports.html"
                                      title="SPORTS"
                                    >
                                      SPORTS
                                    </Link>
                                  </li>
                                  <li className="date">10:11 PM, Feb 02</li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                        <div className="column column_1_2">
                          <ul className="blog small">
                            <li className="post">
                              <Link
                                href="post.html"
                                title="Study Linking Illnes and Salt Leaves Researchers Doubtful"
                              >
                                <img
                                  src="images/samples/100x100/image_04.jpg"
                                  alt="img"
                                />
                              </Link>
                              <div className="post_content">
                                <h5>
                                  <Link
                                    href="post.html"
                                    title="Study Linking Illnes and Salt Leaves Researchers Doubtful"
                                  >
                                    Study Linking Illnes and Salt Leaves
                                    Researchers Doubtful
                                  </Link>
                                </h5>
                                <ul className="post_details simple">
                                  <li className="category">
                                    <Link
                                      href="category_health.html"
                                      title="HEALTH"
                                    >
                                      HEALTH
                                    </Link>
                                  </li>
                                  <li className="date">10:11 PM, Feb 02</li>
                                </ul>
                              </div>
                            </li>
                            <li className="post">
                              <Link
                                href="post.html"
                                title="Syrian Civilians Trapped For Months Continue To Be Evacuated"
                              >
                                <img
                                  src="images/samples/100x100/image_10.jpg"
                                  alt="img"
                                />
                              </Link>
                              <div className="post_content">
                                <h5>
                                  <Link
                                    href="post.html"
                                    title="Syrian Civilians Trapped For Months Continue To Be Evacuated"
                                  >
                                    Syrian Civilians Trapped For Months Continue
                                    To Be Evacuated
                                  </Link>
                                </h5>
                                <ul className="post_details simple">
                                  <li className="category">
                                    <Link
                                      href="category_world.html"
                                      title="WORLD"
                                    >
                                      WORLD
                                    </Link>
                                  </li>
                                  <li className="date">10:11 PM, Feb 02</li>
                                </ul>
                              </div>
                            </li>
                            <li className="post">
                              <Link
                                href="post.html"
                                title="Built on Brotherhood, Club Lives Up to Name"
                              >
                                <img
                                  src="images/samples/100x100/image_07.jpg"
                                  alt="img"
                                />
                              </Link>
                              <div className="post_content">
                                <h5>
                                  <Link
                                    href="post.html"
                                    title="Built on Brotherhood, Club Lives Up to Name"
                                  >
                                    Built on Brotherhood, Club Lives Up to Name
                                  </Link>
                                </h5>
                                <ul className="post_details simple">
                                  <li className="category">
                                    <Link
                                      href="category_sports.html"
                                      title="SPORTS"
                                    >
                                      SPORTS
                                    </Link>
                                  </li>
                                  <li className="date">10:11 PM, Feb 02</li>
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li className="submenu">
                  <Link href="#" title="Post Formats">
                    Post Formats
                  </Link>
                  <ul>
                    <li>
                      <Link href="post.html" title="Post Default">
                        Post Default
                      </Link>
                    </li>
                    <li>
                      <Link href="post_gallery.html" title="Post Gallery">
                        Post Gallery
                      </Link>
                    </li>
                    <li>
                      <Link
                        href="post_small_image.html"
                        title="Post Small Image"
                      >
                        Post Small Image
                      </Link>
                    </li>
                    <li>
                      <Link href="post_video.html" title="Post Video YouTube">
                        Post Video Youtube
                      </Link>
                    </li>
                    <li>
                      <Link href="post_video_2.html" title="Post Video Vimeo">
                        Post Video Vimeo
                      </Link>
                    </li>
                    <li>
                      <Link href="post_soundcloud.html" title="Post Soundcloud">
                        Post Soundcloud
                      </Link>
                    </li>
                    <li>
                      <Link href="post_review.html" title="Post Review Style 1">
                        Post Review Style 1
                      </Link>
                    </li>
                    <li>
                      <Link
                        href="post_review_2.html"
                        title="Post Review Style 2"
                      >
                        Post Review Style 2
                      </Link>
                    </li>
                    <li>
                      <Link href="post_quote.html" title="Post Quote Style 1">
                        Post Quote Style 1
                      </Link>
                    </li>
                    <li>
                      <Link href="post_quote_2.html" title="Post Quote Style 2">
                        Post Quote Style 2
                      </Link>
                    </li>
                  </ul>
                </li>
                <li className="submenu">
                  <Link href="blog.html" title="Blog">
                    الفئات
                  </Link>
                  <ul>
                    {/* <li>
                      <Link
                        href="blog_small_slider.html"
                        title="Blog Small Slider"
                      >
                        Blog Small Slider
                      </Link>
                    </li> */}

                    <>
                      {tags &&
                        tags.map((tag) => (
                          <li
                            className={
                              tag.children && tag.children.length > 0
                                ? "submenu"
                                : ""
                            }
                            key={tag.id}
                          >
                            {console.log(tag.children)}

                            <Link to={`/group/${tag.TITLE}`} title={tag.TITLE}>
                              {tag.TITLE}
                            </Link>

                            {tag.children && (
                              <ul>
                                {tag.children.map((child) => (
                                  <li
                                    key={child.id}
                                    className={
                                      child.children &&
                                      child.children.length > 0
                                        ? "submenu"
                                        : ""
                                    }
                                  >
                                    <Link
                                      to={`/subtag/${child.TITLE}`}
                                      title={child.TITLE}
                                    >
                                      {child.TITLE}
                                    </Link>
                                    <CheckIfHaveTag child={child} />
                                  </li>
                                ))}
                              </ul>
                            )}
                          </li>
                        ))}
                    </>

                    <li className="submenu">
                      <Link href="#" title="Blog 2 columns">
                        Blog 2 Columns
                      </Link>
                      <ul>
                        <li>
                          <Link
                            href="blog_2_columns.html"
                            title="Right Sidebar"
                          >
                            Right Sidebar
                          </Link>
                        </li>
                        <li>
                          <Link
                            href="blog_2_columns_left_sidebar.html"
                            title="Left Sidebar"
                          >
                            Left Sidebar
                          </Link>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <Link href="blog_3_columns.html" title="Blog 3 Columns">
                        Blog 3 Columns
                      </Link>
                    </li>
                    <li>
                      <Link
                        href="search.html?s=Maecenas+Mauris"
                        title="Search Page Template"
                      >
                        Search Page Template
                      </Link>
                    </li>
                  </ul>
                </li>
                <li className="submenu">
                  <Link href="authors.html" title="Authors">
                    Authors
                  </Link>
                  <ul>
                    <li>
                      <Link href="authors.html" title="Authors List">
                        Authors List
                      </Link>
                    </li>
                    <li>
                      <Link href="author.html" title="Author Single">
                        Author Single
                      </Link>
                    </li>
                  </ul>
                </li>
                <li className="submenu">
                  <Link href="#" title="Categories">
                    Categories
                  </Link>
                  <ul>
                    <li>
                      <Link href="category_health.html" title="Health">
                        Health
                      </Link>
                    </li>
                    <li>
                      <Link href="category_science.html" title="Science">
                        Science
                      </Link>
                    </li>
                    <li>
                      <Link href="category_sports.html" title="Sports">
                        Sports
                      </Link>
                    </li>
                    <li>
                      <Link href="category_world.html" title="World">
                        World
                      </Link>
                    </li>
                    <li>
                      <Link href="category_lifestyle.html" title="Lifestyle">
                        Lifestyle
                      </Link>
                    </li>
                  </ul>
                </li>
                <li className="submenu">
                  <Link href="contact.html" title="Contact">
                    الصفحة الرئيسية
                  </Link>
                  <ul className="expand_left_contact">
                    <li>
                      <Link href="contact.html" title="Contact Style 1">
                        Contact Style 1
                      </Link>
                    </li>
                    <li>
                      <Link href="contact_2.html" title="Contact Style 2">
                        Contact Style 2
                      </Link>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
            <div className="mobile_menu_container">
              <Link href="#" className="mobile-menu-switch">
                <span className="line" />
                <span className="line" />
                <span className="line" />
              </Link>
              <div className="mobile-menu-divider" />
              <nav>
                <ul className="mobile-menu">
                  <li className="submenu selected">
                    <Link href="home.html" title="Home">
                      الصفحة الرئيسية
                    </Link>
                    <ul>
                      <li className="selected">
                        <Link href="home.html" title="Home Style 1">
                          Home Style 1
                        </Link>
                      </li>
                      <li>
                        <Link href="home_2.html" title="Home Style 2">
                          Home Style 2
                        </Link>
                      </li>
                      <li>
                        <Link href="home_3.html" title="Home Style 3">
                          Home Style 3
                        </Link>
                      </li>
                      <li>
                        <Link href="home_4.html" title="Home Style 3">
                          Home Style 4
                        </Link>
                      </li>
                      <li>
                        <Link href="home_5.html" title="Home Style 5">
                          Home Style 5
                        </Link>
                      </li>
                      <li>
                        <Link href="home_6.html" title="Home Style 6">
                          Home Style 6
                        </Link>
                      </li>
                      <li>
                        <Link href="home_7.html" title="Home Style 7">
                          Home Style 7
                        </Link>
                      </li>
                    </ul>
                  </li>
                  <li className="submenu">
                    <Link href="about.html" title="Pages">
                      Pages
                    </Link>
                    <ul>
                      <li>
                        <Link href="about.html" title="About Style 1">
                          About Style 1
                        </Link>
                      </li>
                      <li>
                        <Link href="about_2.html" title="About Style 2">
                          About Style 2
                        </Link>
                      </li>
                      <li>
                        <Link href="default.html" title="Default">
                          Default
                        </Link>
                      </li>
                      <li>
                        <Link href="404.html" title="404 Not Found">
                          404 Not Found
                        </Link>
                      </li>
                    </ul>
                  </li>
                  <li className="submenu">
                    <Link href="post.html" title="Post Formats">
                      Post Formats
                    </Link>
                    <ul>
                      <li>
                        <Link href="post.html" title="Post Default">
                          Post Default
                        </Link>
                      </li>
                      <li>
                        <Link href="post_gallery.html" title="Post Gallery">
                          Post Gallery
                        </Link>
                      </li>
                      <li>
                        <Link
                          href="post_small_image.html"
                          title="Post Small Image"
                        >
                          Post Small Image
                        </Link>
                      </li>
                      <li>
                        <Link href="post_video.html" title="Post Video YouTube">
                          Post Video Youtube
                        </Link>
                      </li>
                      <li>
                        <Link href="post_video_2.html" title="Post Video Vimeo">
                          Post Video Vimeo
                        </Link>
                      </li>
                      <li>
                        <Link
                          href="post_soundcloud.html"
                          title="Post Soundcloud"
                        >
                          Post Soundcloud
                        </Link>
                      </li>
                      <li>
                        <Link
                          href="post_review.html"
                          title="Post Review Style 1"
                        >
                          Post Review Style 1
                        </Link>
                      </li>
                      <li>
                        <Link
                          href="post_review_2.html"
                          title="Post Review Style 2"
                        >
                          Post Review Style 2
                        </Link>
                      </li>
                      <li>
                        <Link href="post_quote.html" title="Post Quote Style 1">
                          Post Quote Style 1
                        </Link>
                      </li>
                      <li>
                        <Link
                          href="post_quote_2.html"
                          title="Post Quote Style 2"
                        >
                          Post Quote Style 2
                        </Link>
                      </li>
                    </ul>
                  </li>
                  <li className="submenu">
                    <Link href="blog.html" title="Blog">
                      Blog
                    </Link>
                    <ul>
                      <li>
                        <Link
                          href="blog_small_slider.html"
                          title="Blog Small Slider"
                        >
                          Blog Small Slider
                        </Link>
                      </li>
                      <li className="submenu">
                        <Link href="blog.html" title="Blog 1 column">
                          Blog 1 Column
                        </Link>
                        <ul>
                          <li>
                            <Link
                              href="blog.html"
                              title="Blog With Right Sidebar"
                            >
                              Blog With Right Sidebar
                            </Link>
                          </li>
                          <li>
                            <Link
                              href="blog_left_sidebar.html"
                              title="Blog With Left Sidebar"
                            >
                              Blog With Left Sidebar
                            </Link>
                          </li>
                        </ul>
                      </li>
                      <li className="submenu">
                        <Link href="blog_2_columns.html" title="Blog 2 columns">
                          Blog 2 Columns
                        </Link>
                        <ul>
                          <li>
                            <Link
                              href="blog_2_columns.html"
                              title="Right Sidebar"
                            >
                              Right Sidebar
                            </Link>
                          </li>
                          <li>
                            <Link
                              href="blog_2_columns_left_sidebar.html"
                              title="Left Sidebar"
                            >
                              Left Sidebar
                            </Link>
                          </li>
                        </ul>
                      </li>
                      <li>
                        <Link href="blog_3_columns.html" title="Blog 3 Columns">
                          Blog 3 Columns
                        </Link>
                      </li>
                      <li>
                        <Link
                          href="search.html?s=Maecenas+Mauris"
                          title="Search Page Template"
                        >
                          Search Page Template
                        </Link>
                      </li>
                    </ul>
                  </li>
                  <li className="submenu">
                    <Link href="authors.html" title="Authors">
                      Authors
                    </Link>
                    <ul>
                      <li>
                        <Link href="authors.html" title="Authors List">
                          Authors List
                        </Link>
                      </li>
                      <li>
                        <Link href="author.html" title="Author Single">
                          Author Single
                        </Link>
                      </li>
                    </ul>
                  </li>
                  <li className="submenu">
                    <Link href="category_health.html" title="Categories">
                      Categories
                    </Link>
                    <ul>
                      <li>
                        <Link href="category_health.html" title="Health">
                          Health
                        </Link>
                      </li>
                      <li>
                        <Link href="category_science.html" title="Science">
                          Science
                        </Link>
                      </li>
                      <li>
                        <Link href="category_sports.html" title="Sports">
                          Sports
                        </Link>
                      </li>
                      <li>
                        <Link href="category_world.html" title="World">
                          World
                        </Link>
                      </li>
                      <li>
                        <Link href="category_lifestyle.html" title="Lifestyle">
                          Lifestyle
                        </Link>
                      </li>
                    </ul>
                  </li>
                  <li className="submenu">
                    <Link href="contact.html" title="Contact">
                      Contact
                    </Link>
                    <ul className="expand_left_contact">
                      <li>
                        <Link href="contact.html" title="Contact Style 1">
                          Contact Style 1
                        </Link>
                      </li>
                      <li>
                        <Link href="contact_2.html" title="Contact Style 2">
                          Contact Style 2
                        </Link>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </>
      </>
    </>
  );
}
