// import { Home } from "../../../components";
import { useRoute } from "@react-navigation/native";

export default HomeScreen = () => {
  const route = useRoute();
  console.log(route.name);
  return <Text>Home Page</Text>
  // return <Home/>;
}

