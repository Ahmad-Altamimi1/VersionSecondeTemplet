import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import App from "./App";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import HOME from "./component/pages/home";
import SinglePost from "./component/pages/SinglePost";
import reportWebVitals from "./reportWebVitals";
import { QueryClient, QueryClientProvider } from "react-query";
const root = ReactDOM.createRoot(document.getElementById("root"));
const queryClient = new QueryClient();
root.render(
  <QueryClientProvider client={queryClient}>
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<HOME />} />
        <Route path="/post/:name" element={<SinglePost />} />
      </Routes>
    </BrowserRouter>
  </QueryClientProvider>
);

reportWebVitals();
