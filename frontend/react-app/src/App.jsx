import { useEffect } from "react";
import { useState } from "react";
import "./App.css";
import axiosClient from "./axios";

function App() {
  const [count, setCount] = useState(0);
  const [loading, setLoading] = useState(false);
  useEffect(() => {
    fetchCount();
  }, []);
  async function fetchCount() {
    try {
      setLoading(true);
      const response = await axiosClient.get("/click-counts");
      if (response.status === 200) {
        setCount(response.data);
      }
      setLoading(false);
    } catch (error) {
      console.error(error);
      setLoading(false);
    }
  }
  async function handleClick() {
    try {
      const response = await axiosClient.post("/increment");
      setCount(response.data.count);
    } catch (error) {
      console.error(error);
    }
  }
  return (
    <div className="container">
      {loading && <h1 className="title">Loading...</h1>}
      {!loading && (
        <>
          <h1 className="title">Click Me App</h1>
          <button className="button" onClick={handleClick}>
            Click Me
          </button>
          <p className="count">{count}</p>
        </>
      )}
    </div>
  );
}

export default App;
