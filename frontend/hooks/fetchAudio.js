import { useState, useEffect } from "react";
import axios from "axios";
import request from "./request";

const fetchAudio = (endpoint) => {
    const [audio, setAudio] = useState({});
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState(null);

    const options = request(endpoint);

    const fetchData = async () => {
        setIsLoading(true);
        
        try {
            const response = await axios.request(options);

            setAudio(response.data);
            // console.log(audio);
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

    return { audio, isLoading, error, refetch };
};

export default fetchAudio;