import { Stack } from "expo-router";
import { useCallback } from 'react';
import { useFonts } from "expo-font";
import * as SplashScreen from 'expo-splash-screen';

// export const unstable_settings = {
//   initialRouteName: "home",
// };

// SplashScreen.preventAutoHideAsync();
// const Layout = () => {
//   const [fontsLoaded] = useFonts({
//     PTSansRegular: require("../assets/fonts/PTSans-Regular.ttf"),
//     PTSansBold: require("../assets/fonts/PTSans-Bold.ttf"),
//     PTSansItalic: require("../assets/fonts/PTSans-Italic.ttf"),
//   });

//   const onLayoutRootView = useCallback(async () => {
//     if (fontsLoaded) {
//       await SplashScreen.hideAsync();
//     }
//   }, [fontsLoaded]);

//   if (!fontsLoaded) {
//     return null;
//   }

//   return <Stack onLayout={onLayoutRootView}/>
// };
