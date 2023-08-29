import { useState, useEffect } from "react";
import axios from "axios";
import request from "./request";

const fetchPage = (endpoint, id) => {
  const [page, setPage] = useState({});
  const [isLoading, setIsLoading] = useState(false);
  const [error, setError] = useState(null);

  const options = request(endpoint);

  const fetchData = async () => {
      setIsLoading(true);
      
      try {
          const response = await axios.request(options);
          
          // console.log(response.data);
          setPage(response.data);
          setIsLoading(false);
      }
      catch (error) {
          setError(error);
          console.log(error);
      } finally {
          setIsLoading(false);
      }
  }

  useEffect(() => {
      fetchData();
  }, []);

  const refetch = () => {
      setIsLoading(true);
      fetchData();
  };

  return { page, isLoading, error, refetch };
};

export {fetchPage};