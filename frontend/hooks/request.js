import { API_URL } from '@env';

const url = API_URL;
const request = (endpoint, id = null) => {
  const options = id == null ? {
    method: "GET",
    url: `http://192.168.1.6:8000/api/${endpoint}`,
  } : {
    method: "GET",
    url: `http://192.168.1.6:8000/api/${endpoint}/${id}`,
  }
  return options;
}

export default request;
