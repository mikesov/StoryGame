import { Stack } from "expo-router";
import { useFonts } from "expo-font";

// export const unstable_settings = {
//   initialRouteName: "home",
// };

// const Layout = () => {
//   const [fontsLoaded] = useFonts({
//     PTSansRegular: require("../assets/fonts/PTSans-Regular.ttf"),
//   });

//   if (!fontsLoaded) {
//     return null;
//   }

//   return (
//     <Stack initialRouteName="home">
//       <Stack.Screen name="home" />
//     </Stack>
//   )
// };
const Layout = () => {
  return <Stack/>
}

export default Layout;