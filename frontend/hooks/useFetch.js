import { useState, useEffect } from "react";
import axios from "axios";
import request from "./request";

const useFetch = (endpoint, id = null) => {
    const [data, setData] = id == null ? useState([]) : useState({});
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState(null);

    const options = id == null ? request(endpoint) : request(endpoint, id);

    const fetchData = async () => {
        setIsLoading(true);
        
        try {
            const response = await axios.request(options);

            setData(response.data);
            // console.log(response.data);
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

    return { data, isLoading, error, refetch };
};

export {useFetch};